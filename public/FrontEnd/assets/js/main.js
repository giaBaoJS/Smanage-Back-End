jQuery(document).ready(function ($) {
	$('.tour-dt__program .item, .tour-dt__faq .item').each(function () {
		$(this)
			.find('.item-header')
			.on('click', function (e) {
				if (
					$(this).parent().hasClass('--active') &&
					!$(this).closest('.tour-dt__faq').length
				) {
					return;
				}

				$(this).parent().toggleClass('--active');
				$(this).parent().siblings().removeClass('--active');
			});
	});
	/** SHOW PASSWORD */
	$(document).on('click', '.eyes-psw', function () {
		$(this).find('i').toggleClass('fa-eye fa-eye-slash');

		const input = $(this).prev();
		input.attr('type') === 'password'
			? input.attr('type', 'text')
			: input.attr('type', 'password');
	});
	/** SHOW PASSWORD - END */
	/** SHOW MODAL WITH AJAX */
	$('.bill-detail').on('click', function () {
		$('#modal-bill').modal('show');
		// var mahd = $(this).parents('tr').children(':first').html();
		// $.ajax({
		// 	url: '../view/account/handleUser.php',
		// 	type: 'post',
		// 	dataType: 'json',
		// 	data: {mahd: mahd, type: 'bill-detail'},
		// 	success: function (res) {
		// 		$('#table-bill tbody').html(res);
		// 		$('#modal-bill').modal('show');
		// 	},
		// 	error: function (request, status, error) {
		// 		console.log(request.responseText);
		// 		console.log(error);
		// 		console.log(status);
		// 	},
		// });
	});
	/** SHOW MODAL WITH AJAX - END */

	if ($('.header').length) {
		/** MENU FIXED WHEN SCROLL */
		const header = $('.header');
		const headerHeight = header.height();
		const headerOffsetTop = header.offset().top;
		if (scrollY >= headerOffsetTop + headerHeight) {
			header.addClass('--fixed');
			header.next().css('margin-top', headerHeight);
		} else {
			header.removeClass('--fixed');
			header.next().css('margin-top', 0);
		}
		$(window).on('scroll', function () {
			if (scrollY >= headerOffsetTop + headerHeight) {
				header.delay(100).addClass('--fixed');

				header.next().css('margin-top', headerHeight);
			} else {
				header.delay(500).removeClass('--fixed');
				header.next().css('margin-top', 0);
			}
		});
		/** MENU FIXED WHEN SCROLL - END */
	}
	/** SWIPER - END*/
	if ($('#is-slider-detail') && $('#is-slider-detail-thumbs')) {
		const sliderThumbs = new Swiper(
			'#is-slider-detail-thumbs .swiper-container-tour-dt-thumbs',
			{
				slidesPerView: 'auto',
				autoplay: {
					delay: 5000,
				},
				speed: 1000,
				slideToClickedSlide: true,
				watchSlidesVisibility: true,
				watchSlidesProgress: true,
				loop: false,
			}
		);
		const nextBtn = $('#is-slider-detail').find('.swiper-button-next');
		const prevBtn = $('#is-slider-detail').find('.swiper-button-prev');
		const pagination = $('#is-slider-detail').find('.swiper-pagination');
		new Swiper('#is-slider-detail .swiper-container-tour-dt', {
			slidesPerView: 'auto',
			autoplay: {
				delay: 5000,
			},
			speed: 500,
			thumbs: {
				swiper: sliderThumbs,
			},
			loop: true,
			navigation: {
				nextEl: nextBtn,
				prevEl: prevBtn,
			},
			pagination: {
				el: pagination,
				clickable: true,
			},
			on: {
				init: function () {
					console.log(this);
				},
			},
		});
	}
	/** SWIPER - END*/
	/** MAGNIFIC */
	if ($('.open-popup-btn').length) {
		$('.close-icon').on('click', function () {
			$.magnificPopup.close();
		});
		$('.open-popup-btn').magnificPopup({
			type: 'inline',
			preloader: false,
			modal: true,
			removalDelay: 500,
			callbacks: {
				beforeOpen: function () {
					this.st.mainClass = 'mfp-zoom-in';
					$('body').css('overflow', 'hidden');
				},
				close: function () {
					$('body').css('overflow', '');
				},
			},
		});
	}
	/** MAGNIFIC - END*/

	/** LIGHTGALLERY */
	if ($('.is-lightgallery').length) {
		$('.is-lightgallery').lightGallery({
			thumbnail: true,
		});
	}
	/** LIGHTGALLERY - END*/
	/** QTT PICKER */
	const priceElement = $('.qtt-picker');
	if (priceElement.length) {
		//lấy dữ liệu từ ô input - min max step
		function qttPicker(btn) {
			const input = $(btn).closest('.qtt-picker').find('.qtt-input');
			const inputMax = $(input).attr('max');
			const inputMin = $(input).attr('min');
			const inputStep = $(input).attr('step')
				? parseFloat($(input).attr('step'))
				: 1;
			if ($(btn).hasClass('next')) {
				const value = inputMax
					? Math.min(parseFloat(input.val()) + inputStep, parseFloat(inputMax))
					: parseFloat(input.val()) + inputStep;
				input.val(
					Number.isInteger(value)
						? parseInt(value)
						: parseFloat(value).toFixed(1)
				);
				return input.val();
			}

			if ($(btn).hasClass('prev')) {
				const value = Math.max(
					parseFloat(input.val()) - inputStep,
					inputMin ? parseFloat(inputMin) : 0
				);
				input.val(
					Number.isInteger(value)
						? parseInt(value)
						: parseFloat(value).toFixed(1)
				);
				return input.val();
			}

			return input.val();
		}
		$(window).on('click', (e) => {
			if ($(e.target).hasClass('next') || $(e.target).hasClass('prev')) {
				const valueItem = qttPicker(e.target);
			}
		});
		//event cho 2 nút tăng giảm
	}
	/** QTT PICKER - END*/

	/** FLATPICKER */
	if ($('.flatpickr-input').length) {
		const toDate = flatpickr('#to-date', {
			disableMobile: 'true',
			dateFormat: 'd/m/Y ',
			// enableTime: true,
			time_24hr: true,
			locale: 'vn',
		});
		const fromDate = flatpickr('#from-date', {
			disableMobile: 'true',
			dateFormat: 'd/m/Y ',
			// enableTime: true,
			time_24hr: true,
			locale: 'vn',
			onReady: function () {
				this.set('minDate', new Date());
			},
			onChange: function (selectedDates, dateStr, instance) {
				toDate.set('minDate', dateStr);
			},
		});
	}
	/** FLATPICKER - END */

	$(window).scroll(function () {
		if ($(this).scrollTop() >= 500) {
			$('#return-to-top').fadeIn(300);
		} else {
			$('#return-to-top').fadeOut(300);
		}
	});
	$('#return-to-top').click(function () {
		$('body,html').animate(
			{
				scrollTop: 0,
			},
			500
		);
	});
	$('.hamburger-btn').click(function (e) {
		e.stopPropagation();
		$(this).addClass('active');
		$('.main-menu').addClass('active');
	});
	$('html').click(function () {
		$('.hamburger-btn').removeClass('active');
		$('.main-menu').removeClass('active');
	});

	//Slider Banner Home
	var mySwiper = new Swiper('.swiper-container', {
		direction: 'horizontal',
		loop: true,
		effect: 'fade',
		allowTouchMove: false,
		speed: 1000,
		autoplay: {
			delay: 4000,
			disableOnInteraction: false,
		},
		slidesPerView: 1,
		navigation: {
			nextEl: '.slide-button-next',
			prevEl: '.slide-button-prev',
		},
		pagination: {
			el: '.slide-pagination-banner',
			clickable: true,
		},
	});

	//Slider Tour Home
	var mySwiper2 = new Swiper('.swiper-container2', {
		direction: 'horizontal',
		loop: false,
		slidesPerView: 1,
		spaceBetween: 20,
		autoplay: {
			delay: 3000,
			disableOnInteraction: false,
		},
		pagination: {
			el: '.swiper-pagination',
			clickable: true,
		},
		breakpoints: {
			768: {
				slidesPerView: 3,
				spaceBetweenSlides: 15,
			},
			1200: {
				slidesPerView: 5,
				spaceBetweenSlides: 20,
			},
		},
	});

	//Slider News Home
	var mySwiper3 = new Swiper('.swiper-container3', {
		direction: 'horizontal',
		loop: false,
		slidesPerView: 1,
		pagination: {
			el: '.swiper-pagination3',
			clickable: true,
		},
	});

	//Slider About us
	var mySwiper4 = new Swiper('.swiper-container4', {
		direction: 'horizontal',
		loop: true,
		slidesPerView: 1,
		centeredSlides: true,
		spaceBetween: 5,
		pagination: {
			el: '.swiper-pagination4',
			clickable: true,
		},
		breakpoints: {
			768: {
				slidesPerView: 1.4,
			},
		},
	});

	//Slider Partner Page
	var mySwiper5 = new Swiper('.swiper-container5', {
		direction: 'horizontal',
		loop: true,
		slidesPerView: 2,
		spaceBetween: 10,
		allowTouchMove: false,
		autoplay: {
			delay: 2000,
			disableOnInteraction: false,
		},
		breakpoints: {
			768: {
				slidesPerView: 4,
				centeredSlides: true,
			},
		},
	});
});

//Checkbox click
$('.two-ele .fcheckbox').click(function () {
	$(this).toggleClass('checkmark');
});
$('#diemden').focus(function () {
	$('.dropdown-place').addClass('active');
});

$('.dropdown-place li').click(function () {
	var data = $(this).attr('data-value');
	var texts = $(this).text();
	$('#diemden').attr('placeholder', texts);
});
$(document).on('click', function (e) {
	if ($(e.target).is('#diemden') === false) {
		$('.dropdown-place').removeClass('active');
	}
});

//Change Layout Tab in Page Tour
$('.tablist .layout-item').click(function (e) {
	$('.tablist .layout-item').removeClass('active');
	$(this).addClass('active');
	let id = $(this).attr('data-tab');
	$('.tabs').removeClass('active');
	$('.' + id).addClass('active');
});
// Change tab in phương thức tt
$('.phuongthuctt .phuongthuctt__items').click(function (e) {
	$('.phuongthuctt .phuongthuctt__items').removeClass('active');
	$(this).addClass('active');
	let id = $(this).attr('data-tab');
	$('.tabs').removeClass('active');
	$('.' + id).addClass('active');
});

// Change tab in ngân hàng
$('.list__nganhang .item').click(function (e) {
	$('.list__nganhang .item').removeClass('active');
	$(this).addClass('active');
});

//Gallery thư viện ảnh
if ($('.lightgallery').length) {
	$('.lightgallery').lightGallery({
		thumbnail: true,
	});
}

//Change tab gallery
$('.list-cato .tab').click(function (e) {
	$('.list-cato .tab').removeClass('active');
	$(this).addClass('active');
	let id = $(this).attr('data-tab');
	$('.tablist').removeClass('active');
	$('.' + id).addClass('active');
});
