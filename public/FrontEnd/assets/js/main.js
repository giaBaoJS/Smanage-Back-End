jQuery(document).ready(function ($) {
    $(document).ready(function () {
        $.ajax({
            url: "http://127.0.0.1:8000/api/admin/setpremium",
            type: "get",
        }).done(function (ketqua) {
        });
        kiemtraDoiTac();
    });
    $(".tour-dt__program .item, .tour-dt__faq .item").each(function () {
        $(this)
            .find(".item-header")
            .on("click", function (e) {
                if (
                    $(this).parent().hasClass("--active") &&
                    !$(this).closest(".tour-dt__faq").length
                ) {
                    return;
                }

                $(this).parent().toggleClass("--active");
                $(this).parent().siblings().removeClass("--active");
            });
    });
    //KIỂM TRA ĐỐI TÁC
function kiemtraDoiTac() {
    doitac = $("#chucnang").val();
    if (doitac == 1) {
        $("#doitac").css('display','block');
    } else {
        $("#doitac").css('display','none');
    }
}

//KIỂM TRA ĐỐI TÁC
    /** SHOW PASSWORD */
    // $(document).on("click", ".eyes-psw", function () {
    //     $(this).find("i").toggleClass("fa-eye fa-eye-slash");

    //     const input = $(this).prev();
    //     input.attr("type") === "password"
    //         ? input.attr("type", "text")
    //         : input.attr("type", "password");
    // });
    /** SHOW PASSWORD - END */
    /** SHOW MODAL WITH AJAX */
    $(".bill-detail").on("click", function () {
        $("#modal-bill").modal("show");
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

    if (!$(".header").length) {
        /** MENU FIXED WHEN SCROLL */
        const header = $(".header");
        const headerHeight = header.height();
        const headerOffsetTop = header.offset().top;
        if (scrollY >= headerOffsetTop + headerHeight) {
            header.addClass("--fixed");
            header.next().css("margin-top", headerHeight);
        } else {
            header.removeClass("--fixed");
            header.next().css("margin-top", 0);
        }
        $(window).on("scroll", function () {
            if (scrollY >= headerOffsetTop + headerHeight) {
                header.delay(100).addClass("--fixed");

                header.next().css("margin-top", headerHeight);
            } else {
                header.delay(500).removeClass("--fixed");
                header.next().css("margin-top", 0);
            }
        });
        /** MENU FIXED WHEN SCROLL - END */
    }
    /** SWIPER - END*/
    if ($("#is-slider-detail") && $("#is-slider-detail-thumbs")) {
        const sliderThumbs = new Swiper(
            "#is-slider-detail-thumbs .swiper-container-tour-dt-thumbs",
            {
                slidesPerView: "auto",
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
        const nextBtn = $("#is-slider-detail").find(".swiper-button-next");
        const prevBtn = $("#is-slider-detail").find(".swiper-button-prev");
        const pagination = $("#is-slider-detail").find(".swiper-pagination");
        new Swiper("#is-slider-detail .swiper-container-tour-dt", {
            slidesPerView: "auto",
            autoplay: {
                delay: 5000,
            },
            speed: 1000,
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
                init: function () {},
            },
        });
    }
    /** SWIPER - END*/
    /** MAGNIFIC */
    if ($(".open-popup-btn").length) {
        $(".close-icon").on("click", function () {
            $.magnificPopup.close();
        });
        $(".open-popup-btn").magnificPopup({
            type: "inline",
            preloader: false,
            modal: true,
            removalDelay: 500,
            callbacks: {
                beforeOpen: function () {
                    this.st.mainClass = "mfp-zoom-in";
                    $("body").css("overflow", "hidden");
                },
                close: function () {
                    $("body").css("overflow", "");
                },
            },
        });
    }
    /** MAGNIFIC - END*/

    /** LIGHTGALLERY */
    if ($(".is-lightgallery").length) {
        $(".is-lightgallery").lightGallery({
            thumbnail: true,
        });
    }
    /** LIGHTGALLERY - END*/
    /** QTT PICKER */
    const priceElement = $(".qtt-picker");
    if (priceElement.length) {
        //lấy dữ liệu từ ô input - min max step
        function qttPicker(btn) {
            const input = $(btn).closest(".qtt-picker").find(".qtt-input");
            const inputMax = $(input).attr("max");
            const inputMin = $(input).attr("min");
            const inputStep = $(input).attr("step")
                ? parseFloat($(input).attr("step"))
                : 1;
            if ($(btn).hasClass("next")) {
                const value = inputMax
                    ? Math.min(
                          parseFloat(input.val()) + inputStep,
                          parseFloat(inputMax)
                      )
                    : parseFloat(input.val()) + inputStep;
                input.val(
                    Number.isInteger(value)
                        ? parseInt(value)
                        : parseFloat(value).toFixed(1)
                );
                return input.val();
            }

            if ($(btn).hasClass("prev")) {
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
        $(window).on("click", (e) => {
            if ($(e.target).hasClass("next") || $(e.target).hasClass("prev")) {
                const valueItem = qttPicker(e.target);
            }
        });
        //event cho 2 nút tăng giảm
    }
    /** QTT PICKER - END*/

    /** FLATPICKER */
    if ($(".flatpickr-input").length) {
        const toDate = flatpickr("#to-date", {
            disableMobile: "true",
            dateFormat: "d/m/Y ",
            // enableTime: true,
            time_24hr: true,
            locale: "vn",
        });
        const fromDate = flatpickr("#from-date", {
            disableMobile: "true",
            dateFormat: "d/m/Y ",
            // enableTime: true,
            time_24hr: true,
            locale: "vn",
            onReady: function () {
                this.set("minDate", new Date());
            },
            onChange: function (selectedDates, dateStr, instance) {
                toDate.set("minDate", dateStr);
            },
        });
    }
    /** FLATPICKER - END */

    new WOW().init();

    $(".btn-video").magnificPopup({
        type: "iframe",
    });

    $(window).scroll(function () {
        if ($(this).scrollTop() >= 500) {
            $("#return-to-top").fadeIn(300);
        } else {
            $("#return-to-top").fadeOut(300);
        }
    });
    $("#return-to-top").click(function () {
        $("body,html").animate(
            {
                scrollTop: 0,
            },
            500
        );
    });
    $(".main-menu-btn").on("click", function () {
        $(this).addClass("active");
        $(".main-menu").addClass("active");
        $("body").css("overflow", "hidden");
    });

    $(".main-menu-overlay").on("click", function () {
        $(".main-menu-btn").removeClass("active");
        $(".main-menu").removeClass("active");
        $("body").css("overflow", "");
    });

    //Slider Banner Home
    var mySwiper = new Swiper(".swiper-container", {
        direction: "horizontal",
        loop: true,
        effect: "fade",
        allowTouchMove: false,
        speed: 1000,
        autoplay: {
            delay: 4000,
            disableOnInteraction: false,
        },
        slidesPerView: 1,
        navigation: {
            nextEl: ".slide-button-next",
            prevEl: ".slide-button-prev",
        },
        pagination: {
            el: ".slide-pagination-banner",
            clickable: true,
        },
    });

    //Slider Tour Home
    var mySwiper2 = new Swiper(".swiper-container2", {
        direction: "horizontal",
        loop: false,
        slidesPerView: 1,
        spaceBetween: 20,
        speed:1000,
        autoplay: {
            delay: 2000,
            disableOnInteraction: false,
        },
        pagination: {
            el: ".swiper-pagination",
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
    var mySwiper3 = new Swiper(".swiper-container3", {
        direction: "horizontal",
        loop: false,
        speed:1000,
        slidesPerView: 1,
        pagination: {
            el: ".swiper-pagination3",
            clickable: true,
        },
    });

    //Slider About us
    var mySwiper4 = new Swiper(".swiper-container4", {
        direction: "horizontal",
        loop: true,
        speed:1000,
        slidesPerView: 1,
        centeredSlides: true,
        spaceBetween: 5,
        pagination: {
            el: ".swiper-pagination4",
            clickable: true,
        },
        breakpoints: {
            768: {
                slidesPerView: 1.4,
            },
        },
    });

    //Slider Partner Page
    var mySwiper5 = new Swiper(".swiper-container5", {
        direction: "horizontal",
        loop: true,
        speed:1000,
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
    var mySwiper6 = new Swiper(".swiper-container6", {
        direction: "horizontal",
        loop: true,
        speed:1500,
        slidesPerView: 1,
        spaceBetween: 50,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
    });
});

//Checkbox click
$(".two-ele .fcheckbox").click(function () {
    $(this).toggleClass("checkmark");
});
$("#diemden").focus(function () {
    $(".dropdown-place").addClass("active");
});

$(".dropdown-place li").click(function () {
    var data = $(this).attr("data-value");
    var texts = $(this).text();
    $("#diemden").val(texts);
});
$(document).on("click", function (e) {
    if ($(e.target).is("#diemden") === false) {
        $(".dropdown-place").removeClass("active");
    }
});

//Change Layout Tab in Page Tour
$(".tablist .layout-item").click(function (e) {
    $(".tablist .layout-item").removeClass("active");
    $(this).addClass("active");
    let id = $(this).attr("data-tab");
    $(".tabs").removeClass("active");
    $("." + id).addClass("active");
});
// Change tab in phương thức tt
$(".phuongthuctt .phuongthuctt__items").click(function (e) {
    $(".phuongthuctt .phuongthuctt__items").removeClass("active");
    $(this).addClass("active");
    let id = $(this).attr("data-tab");
    $(".tabs").removeClass("active");
    $("." + id).addClass("active");
});

// Change tab in ngân hàng
$(".list__nganhang .item").click(function (e) {
    $(".list__nganhang .item").removeClass("active");
    $(this).addClass("active");
});

//Gallery thư viện ảnh
if ($(".lightgallery").length) {
    $(".lightgallery").lightGallery({
        thumbnail: true,
    });
}

//Change tab gallery
$(".list-cato .tab").click(function (e) {
    $(".list-cato .tab").removeClass("active");
    $(this).addClass("active");
    let id = $(this).attr("data-tab");
    $(".tablist").removeClass("active");
    $("." + id).addClass("active");
});

//Add arrow for submenu
$(".main-menu-nav  .dropdown").each(function () {
    const dropdown = $(this);
    const arrows = $("<i> </i>");
    arrows.addClass("fa fa-angle-down");
    dropdown.find("a").eq(0).append(arrows);
    const subMenu = dropdown.children(".submenu");
    arrows.on("click", function (e) {
        e.preventDefault();
        dropdown.toggleClass("--show");
        $(this).parent().next("ul").stop().slideToggle();
        $(this).toggleClass("--active");
    });
});


//select in page tours
$(".custom-selects").each(function() {
    var classes = $(this).attr("class"),
        id      = $(this).attr("id"),
        name    = $(this).attr("name");
    var template =  '<div class="' + classes + '">';
        template += '<span class="custom-select-trigger">' + $(this).attr("placeholder") + '</span>';
        template += '<div class="custom-options">';
        $(this).find("option").each(function() {
          template += '<span class="custom-option ' + $(this).attr("class") + '" data-value="' + $(this).attr("value") + '">' + $(this).html() + '</span>';
        });
    template += '</div></div>';

    $(this).wrap('<div class="custom-select-wrapper"></div>');
    $(this).hide();
    $(this).after(template);
  });
  $(".custom-option:first-of-type").hover(function() {
    $(this).parents(".custom-options").addClass("option-hover");
  }, function() {
    $(this).parents(".custom-options").removeClass("option-hover");
  });
  $(".custom-select-trigger").on("click", function() {
    $('html').one('click',function() {
      $(".custom-selects").removeClass("opened");
    });
    $(this).parents(".custom-selects").toggleClass("opened");
    event.stopPropagation();
  });
  $(".custom-option").on("click", function() {
    $(this).parents(".custom-select-wrapper").find("select").val($(this).data("value"));
    $(this).parents(".custom-options").find(".custom-option").removeClass("selection");
    $(this).addClass("selection");
    $(this).parents(".custom-selects").removeClass("opened");
    $(this).parents(".custom-selects").find(".custom-select-trigger").text($(this).text());
  });

  $('#checkvalidate').click(function () {
    var adult_number=$('#adult_number').val();
    var child_number=$('#child_number').val();
    if (child_number!=0 && adult_number==0) {
        $('#showError').html('<p style="color: red;text-align:center;font-size:14px;padding:5px">Vui lòng chọn số lượng người lớn</p>');
        return false;
    } else {
        $('#showError').html('');
    }
   if (adult_number==0) {
       $('#showError').html('<p style="color: red;text-align:center;font-size:14px;padding:5px">Chọn số lượng người đi</p>');
        return false;
   }else{
    $('#showError').html('');
   }
})
$('.checkaccount').click(function () {
    Swal.fire({
        title: '<strong>Vui lòng đăng nhập để đặt tour</strong>',
        icon: 'info',
        html:
          'Nhấp vào đây để vào trang đăng nhập ' +
          '<a href="/dang-nhap"> ĐĂNG NHẬP</a>',
        showCloseButton: false,
        showCancelButton: false,
        focusConfirm: false,
      })
    return false;
})
$('#checkcoupon').click(function () {
    var name_code=$('#code_coupon').val();

    if (name_code=="") {
        $('#show_erro_cp').html('<span style="color: red;">Mã coupon trống</span>');
    } else {
        $.ajax({
            url: "http://127.0.0.1:8000/api/admin/checkcp",
            data:{name_code:name_code},
            success: function (params) {
                if (params==1) {
                    $('#show_erro_cp').html('<span style="color: red;">Mã coupon đã hết hạn hoặc số lượng sử dụng đạt tối đa</span>');
                }else if(params==0){
                    $('#show_erro_cp').html('<span style="color: red;">Mã coupon không đúng</span>');
                    $('#show_coupon').html('');
                }
                else{
                    $('#show_erro_cp').html('<span style="color: green;">Mã coupon hợp lệ <i class="fas fa-check-circle"></i></span>');
                    $('#show_coupon').html('<input type="hidden" name="id_coupon" value="'+params.id_coupon+'">');
                }
            },
        });
    }
    return false;
})
$('#checkPass').click(function () {
    var mang=[];
        var quantity=$('#quantity').val();
        for (let index = 0; index < quantity; index++) {
            var name_passenger=$('#name_passenger'+index).val();
            var address_passenger=$('#address_passenger'+index).val();
            var phone_passenger=$('#phone_passenger'+index).val();
            var gender_passenger=$('#gender_passenger'+index).val();
            var country_passenger=$('#country_passenger'+index).val();
            var passport_passenger=$('#passport_passenger'+index).val();
            if (name_passenger=="") {
                $('#errorValidate'+index).html('<span>Thông tin không được để trống</span>');
                return false;
            } else {
                $('#errorValidate'+index).html('');
            }
            if (address_passenger=="") {
                $('#errorValidate'+index).html('<span>Thông tin không được để trống</span>');
                return false;
            } else {
                $('#errorValidate'+index).html('');
            }
            if (phone_passenger=="") {
                $('#errorValidate'+index).html('<span>Thông tin không được để trống</span>');
                return false;
            } else {
                $('#errorValidate'+index).html('');
            }
            if (gender_passenger=="") {
                $('#errorValidate'+index).html('<span>Thông tin không được để trống</span>');
                return false;
            } else {
                $('#errorValidate'+index).html('');
            }
            if (country_passenger=="") {
                $('#errorValidate'+index).html('<span>Thông tin không được để trống</span>');
                return false;
            } else {
                $('#errorValidate'+index).html('');
            }
            if (passport_passenger=="") {
                $('#errorValidate'+index).html('<span>Thông tin không được để trống</span>');
                return false;
            } else {
                $('#errorValidate'+index).html('');
            }
            var mangNew={
                'name_passenger': name_passenger,
                'address_passenger': address_passenger,
                'phone_passenger': phone_passenger,
                'gender_passenger': gender_passenger,
                'country_passenger': country_passenger,
                'passport_passenger': passport_passenger,
            }
            mang.push(mangNew);
        }
        $.ajax({
            url: "http://127.0.0.1:8000/api/admin/addpassenger",
            type:'get',
            data:{mang},
            success: function (params) {
                if (params==1) {
                    window.location.href = "/thanh-toan-3";
                }else{
                    Swal.fire({
                        title: 'Thông bào?',
                        text: "Bạn chưa hoàn tất thủ tục đặt tour!",
                        icon: 'warning',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        cancelButtonText: 'Tiếp tục',
                        confirmButtonText: 'Trở về trang tour'
                      }).then((result) => {
                        window.location.href = "/thanh-toan-3";
                      })

                }
            },
        });
})

    $('.phuongthuctt__items').each(function() {
        var pttt = $(this).children("input").val();
        $(this).click(function () {
        $('#showPayment').html('<input type="hidden" name="id_payment" id="id_payment" value="'+pttt+'">');
        return false;
        })
    })
    $('#addPayment').click(function () {
        var id_payment = $('#id_payment').val();
        var id_bill = $('#id_bill').val();
        if (id_payment==undefined) {
            Swal.fire({
                title: "Vui lòng chọn phương thức thanh toán",
                icon: "warning",
                timer: 2000,
                showConfirmButton: false,
                allowOutsideClick: false,
            });
            return false;
        }
        $('#showLoader').html('<span class="loader"></span><a class="goback --next" href="#" style="background:gray;color:white" disabled>Xác nhận</a>');
        $.ajax({
            url: "http://127.0.0.1:8000/api/admin/addpayment",
            type:'get',
            data:{id_payment:id_payment,id_bill:id_bill},
            success: function (params) {
                window.location.href = "/thanh-toan-4";
            },
        });
        return false;
    })
    //BILL DETAILS
    function showBill(id) {
        $.ajax({
            url: "http://127.0.0.1:8000/api/admin/billdetail/"+id,
            type:'get',
            success: function (b) {
                div='<div><p>Tên tour: <span>'+b.name_tour+'</span></p><p>Thời gian: <span>'+b.date_start+'</span></p><p>Số lượng: <span>'+b.quantity_adults+'</span> người lớn / <span>'+b.quantity_children+'</span> trẻ em</p></div><table id="table-bill" class="table table-bordered"></table>';
                $('.modal-body').html(div);
                $.ajax({
                    url: "http://127.0.0.1:8000/api/admin/passdetail/"+b.id_bill,
                    type:'get',
                    success: function (s) {
                        div2='<thead><tr><td>Tên thành viên</td><td>Giới tính</td><td>Số điện thoại</td><td>Địa chỉ</td><td>Thành phố</td><td>Passport</td></tr></thead><tbody>';
                        s.forEach(p => {
                            if (p.gender_passenger==1) {
                                gender="Nam";
                            } else {
                                gender="Nữ";
                            }
                        div2+='<tr><td>'+p.name_passenger+'</td><td>'+gender+'</td><td>'+p.phone_passenger+'</td><td>'+p.address_passenger+'</td><td>'+p.country_passenger+'</td><td>'+p.passport_passenger+'</td></tr>';
                        });
                        div2+='</tbody><tfoot><tr><td colspan="4" style="text-align: right">Tổng Giá vé</td><td colspan="2"><span>'+formatNumber(b.total_price,'.',',')+' VNĐ</span></td></tr></tfoot>';
                        $('#table-bill').html(div2);
                    },
                });
            },
        });
    }

    function formatNumber(nStr, decSeperate, groupSeperate) {
        nStr += '';
        x = nStr.split(decSeperate);
        x1 = x[0];
        x2 = x.length > 1 ? '.' + x[1] : '';
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(x1)) {
            x1 = x1.replace(rgx, '$1' + groupSeperate + '$2');
        }
        return x1 + x2;
    }



//filter data list diem den
    $("#diemden").on('keyup', function(){
        var value = $(this).val().toLowerCase();
        $(".dropdown-place li").each(function () {
            if ($(this).text().toLowerCase().search(value) > -1) {
                $(this).show();
            }
            else {
             $(this).hide();
            }
        });
    })