$(document).ready(function() {

    var $= jQuery.noConflict();

    /** мобильное меню **/
	$(".mobile-menu__content i").click(function(){
		$(this).next().toggle("slow");
	});

	$(".lines").click(function(){
		$(".mobile-menu__content").toggle("fast");
	});


	/** маска инпута **/
	$("input[name='phone']").mask("+7(999) 999-9999");


	/** стрелка вверх **/
	$('.arrow-up').click(function() {
		$('html, body').animate({scrollTop: 0},500);
		return false;
	});

	$(window).scroll(function() {
		var scrollTop = $(window).scrollTop();
		var wh = $(window).height()/4;

		if (scrollTop >= wh) {
			$(".arrow-up").css("display", "flex");
		}
		if (scrollTop < wh) {
			$(".arrow-up").css("display", "none");
		}
	});

	/** клик по ссылкам с услугами **/
	$(".service-item a").click(function(){
		$("#order_service h2").text('Заказать услугу "' + $(this).attr("data-service") + '"');
		$("#order_service input[name='service']").val($(this).attr("data-service"));
	});


	/** Поиск города **/
	$(".search-block input").on("input",function(){
		var val = $(this).val().toLowerCase();
		if(val.length > 1){
			var finded = false;
			$(".towns-list .town").each(function(){
				var this_town = $(this).children("a").text().toLowerCase();
				if(this_town.indexOf(val) >= 0){
					$(this).show();
					finded = true;
				} else {
					$(this).hide();
				}
			});
			if(finded === false){
				$(".towns-list .town").hide();
			}
		} else {
			$(".towns-list .town").show();
		}
	});

	/** Наши мастера(прокрутка) **/
	var owl = $('.owl-carousel');
	owl.owlCarousel({
		loop:true,
		items: 3,
		dots: true,
		responsive: {
			0: {
				items: 1
			},
			992: {
				items: 2
			},
			1280: {
				items: 3
			},
		}
	});

	$('.master-list-wrapper .next a').click(function() {
		owl.trigger('next.owl.carousel');
		return false;
	});

	$('.master-list-wrapper .prev a').click(function() {
		owl.trigger('prev.owl.carousel');
		return false;
	});

	/** Скролл у больших таблиц **/
	var ww = $(window).width();
	var axis = 'y';
	if (ww <= 360) {
		axis = 'yx';
	}

	$('.mycustom-scroll').mCustomScrollbar({
    	theme: 'dark',
    	setHeight: 500,
    	axis: axis
	});

	/** Кнопка "Все услуги" на странице города **/
	$('.big-catalog-list a.more').click(function() {
		$(this).prev().find('li.tohide').toggleClass('d-none');
		$(this).find('i.fa-angle-down').toggle();
		$(this).find('i.fa-angle-up').toggle();
		return false;
	});

	/** Кнопка раскрытия в боковом меню списка услуг по направлениям **/
	$('.service-menu-list a.arrow').click(function() {
		$(this).next().toggle('fast');
		$(this).find('i').toggleClass('fa-chevron-down', 'fa-chevron-up');
		$(this).find('i').toggleClass('fa-chevron-up', 'fa-chevron-down');
		return false;
	});

	/** FAQ **/
	$('.faq .question a').click(function() {
		$(this).closest('.question').next().toggle('fast');
		$(this).find('i').toggleClass('fa-chevron-down', 'fa-chevron-up');
		$(this).find('i').toggleClass('fa-chevron-up', 'fa-chevron-down');
		return false;
	});

    /** Отправка форм **/
    $('form.email-form').submit(function (event) {
        event.preventDefault();

        var form = $(this);
        if (form.data('submitting')) {
            return false;
        }

        var tokenInput = form.find('[name="token-recaptcha"]');
        var submitButtons = form.find(':submit:enabled');
        var siteKey = $('#recaptcha-api').attr('data-site-key');

        form.data('submitting', true);
        tokenInput.val('');
        submitButtons.prop('disabled', true);

        function finishSubmission() {
            tokenInput.val('');
            submitButtons.prop('disabled', false);
            form.removeData('submitting');
        }

        function showResult(success) {
            Fancybox.show([{ src: success ? "#sucess" : "#error", type: "inline" }]);
            setTimeout(function () {
                $('button.is-close').trigger('click');
            }, 5000);
        }

        function failSubmission() {
            finishSubmission();
            showResult(false);
        }

        if (!siteKey || typeof grecaptcha === 'undefined') {
            failSubmission();
            return false;
        }

        try {
            grecaptcha.ready(function () {
                try {
                    grecaptcha.execute(siteKey, {action: 'homepage'}).then(function (token) {
                        if (!token) {
                            failSubmission();
                            return;
                        }

                        tokenInput.val(token);
                        $.ajax({
                            type: 'POST',
                            url: form.attr('action'),
                            dataType: 'json',
                            data: form.serialize(),
                            success: function (data) {
                                showResult(data.response === "OK");
                            },
                            error: function () {
                                showResult(false);
                            },
                            complete: finishSubmission
                        });
                    }).catch(failSubmission);
                } catch (error) {
                    failSubmission();
                }
            });
        } catch (error) {
            failSubmission();
        }

        return false;
    });


})
