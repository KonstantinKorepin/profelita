<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    const IS_ADMIN = 1;
    public function loginForm()
    {
        return view('user.login');
    }

    /**
     * Handle an authentication attempt.
     */
    public function loginStore(Request $request): RedirectResponse
    {
        $auth = Auth::attempt([
            'name' => $request->input('name'),
            'password' => $request->input('password'),
            'is_admin' => self::IS_ADMIN,
        ]);
        if ($auth) {
            return redirect()
                ->route('admin.index')
                ->with('success', 'Вы авторизованы под администратором!');
        }

        return back()->withErrors([
            'Логин или пароль указаны не верно!',
        ]);
    }

    /**
     * Log the user out of the application.
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('main');
    }
}
