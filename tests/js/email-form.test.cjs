const assert = require('assert');
const fs = require('fs');
const vm = require('vm');

// Run the production script with browser integrations replaced by controlled doubles.
function setup({ missingApi = false, missingKey = false } = {}) {
    let submit;
    const requests = [];
    const results = [];
    const challenges = [];
    const noop = new Proxy({}, {
        get: (_, method) => method === 'width' ? () => 1280 : () => noop,
    });
    const document = {};
    function jquery(target) {
        if (target === document) return { ready: callback => callback() };
        if (target === 'form.email-form') return { submit: callback => { submit = callback; } };
        if (target === '#recaptcha-api') return { attr: () => missingKey ? '' : 'site-key' };
        if (typeof target === 'object' && target.isForm) return target;
        return noop;
    }
    jquery.noConflict = () => jquery;
    jquery.ajax = options => requests.push(options);
    const context = {
        document, window: {}, $: jquery, jQuery: jquery,
        Fancybox: { show: items => results.push(items[0].src) },
        setTimeout: () => {},
    };
    if (!missingApi) {
        context.grecaptcha = {
            ready: callback => callback(),
            execute: (key, options) => {
                assert.strictEqual(key, 'site-key');
                assert.strictEqual(options.action, 'homepage');
                return new Promise((resolve, reject) => challenges.push({ resolve, reject }));
            },
        };
    }
    vm.runInNewContext(fs.readFileSync('public/js/script.js', 'utf8'), context);
    function form() {
        const state = { isForm: true, token: '', disabled: false, pending: false };
        state.data = (_, value) => value === undefined ? state.pending : (state.pending = value);
        state.removeData = () => { state.pending = false; };
        state.attr = () => '/send-mail';
        state.serialize = () => 'token-recaptcha=' + state.token;
        state.find = selector => selector === '[name="token-recaptcha"]'
            ? { val: value => { state.token = value; } }
            : { prop: (_, value) => { state.disabled = value; } };
        return state;
    }
    function send(form) {
        let prevented = false;
        assert.strictEqual(submit.call(form, { preventDefault: () => { prevented = true; } }), false);
        assert.strictEqual(prevented, true);
    }
    return { form, send, requests, results, challenges };
}

const flush = () => new Promise(resolve => setImmediate(resolve));

async function main() {
    {
        const app = setup();
        const form = app.form();
        form.token = 'expired-token';
        app.send(form);
        app.send(form);
        assert.strictEqual(app.challenges.length, 1, 'Double submit must not create another challenge');
        assert.strictEqual(app.requests.length, 0, 'No request before a fresh token');
        assert.strictEqual(form.token, '');
        assert.strictEqual(form.disabled, true);
        app.challenges[0].resolve('fresh-token');
        await flush();
        assert.strictEqual(app.requests[0].data, 'token-recaptcha=fresh-token');
        assert.strictEqual(app.requests[0].type, 'POST');
        assert.strictEqual(app.requests[0].url, '/send-mail');
        app.requests[0].success({ response: 'OK' });
        app.requests[0].complete();
        assert.strictEqual(app.results[0], '#sucess');
        assert.strictEqual(form.token, '');
        assert.strictEqual(form.pending, false);
        assert.strictEqual(form.disabled, false);
        app.send(form);
        app.challenges[1].resolve('next-token');
        await flush();
        assert.strictEqual(app.requests[1].data, 'token-recaptcha=next-token', 'Retry needs its own token');
        app.requests[1].error();
        app.requests[1].complete();
        assert.strictEqual(app.results[1], '#error');
        assert.strictEqual(form.disabled, false);
    }
    {
        const app = setup();
        const first = app.form();
        const second = app.form();
        app.send(first);
        app.send(second);
        app.challenges[1].resolve('second-token');
        app.challenges[0].resolve('first-token');
        await flush();
        assert.deepStrictEqual(app.requests.map(r => r.data), [
            'token-recaptcha=second-token', 'token-recaptcha=first-token',
        ], 'Forms must not share tokens');
    }
    {
        const app = setup();
        const form = app.form();
        app.send(form);
        app.challenges[0].reject(new Error('reCAPTCHA unavailable'));
        await flush();
        assert.strictEqual(app.requests.length, 0);
        assert.strictEqual(form.disabled, false);
        assert.strictEqual(form.pending, false);
        assert.strictEqual(app.results[0], '#error');
        app.send(form);
        assert.strictEqual(app.challenges.length, 2, 'Challenge failure must allow retry');
    }
    for (const options of [{ missingApi: true }, { missingKey: true }]) {
        const app = setup(options);
        const form = app.form();
        app.send(form);
        assert.strictEqual(app.requests.length, 0);
        assert.strictEqual(form.disabled, false);
        assert.strictEqual(form.pending, false);
        assert.strictEqual(app.results[0], '#error');
    }
    {
        const app = setup();
        const form = app.form();
        app.send(form);
        app.challenges[0].resolve('');
        await flush();
        assert.strictEqual(app.requests.length, 0, 'Empty token must not be sent');
        assert.strictEqual(form.disabled, false);
    }
    console.log('Form checks passed: fresh tokens, retries, double submit, independent forms and failures.');
}

main().catch(error => { console.error(error); process.exitCode = 1; });
