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
    $('form.email-form').submit(function () {

        var form = $(this); // запишем форму, чтобы потом не было проблем с this
        var error = false; // предварительно ошибок нет, эта переменная нужна на тот случай, если будем делать валидацию на стороне JS

        if (!error) { // если ошибки нет
            var data = form.serialize(); // подготавливаем данные

            $.ajax({ // инициализируем ajax запрос
                type: 'POST', // отправляем в POST формате, можно GET
                url: '/send-mail', // путь до обработчика, у нас он лежит в той же папке
                dataType: 'json', // ответ ждем в json формате
                data: data, // данные для отправки
                beforeSend: function(data) { // событие до отправки
                },
                success: function(data){ // событие после удачного обращения к серверу и получения ответа
                    if (data.response === "OK"){
                        Fancybox.show([{ src: "#sucess", type: "inline" }]);

                        setTimeout(function(){
                            $('button.is-close').trigger('click');
                        }, 5000);
                    } else {
                        Fancybox.show([{ src: "#error", type: "inline" }]);

                        setTimeout(function(){
                            $('button.is-close').trigger('click');
                        }, 5000);
                    }
                },
                error: function (xhr, ajaxOptions, thrownError) { // в случае неудачного завершения запроса к серверу
                    alert(xhr.status); // покажем ответ сервера
                    alert(thrownError); // и текст ошибки
                },
                complete: function(data) { // событие после любого исхода

                }
            });
        }

        return false;
    });


})
