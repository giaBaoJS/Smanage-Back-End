jQuery(function () {
    /** SHOW PASSWORD */
    $(".eyes-psw").on("click", function () {
        $(this).toggleClass("fa-eye fa-eye-slash");
        const input = $(this).prev();
        input.attr("type") === "password"
            ? input.attr("type", "text")
            : input.attr("type", "password");
    });
    /** SHOW PASSWORD - END */
    function formatDataForm(arr) {
        const newObj = {};
        for (const obj of arr) {
            newObj[obj["name"]] = obj["value"];
        }
        return newObj;
    }
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    //login, register, update with ajax
    $(".user-ajax").on("submit", function (e) {
        e.preventDefault();
        var form = $(this);
        var action = form.attr("action");
        var method = form.attr("method");
        var type = form.data("type");
        var data = form.serializeArray();
        var inputArr = form.find(".validate-form-control");
        var checkValid = true;

        for (let i = 0; i < inputArr.length; i++) {
            if (validate(inputArr[i]) == false) {
                showValidate(inputArr[i]);
                checkValid = false;
            }
        }
        if (checkValid) {
            $(":submit", form).attr("disabled", true);
            $(".loading").addClass("--active");
            $.ajax({
                url: action,
                type: method,
                dataType: "json",
                data: { ...formatDataForm(data) },
                success: function (res) {
                    console.log(res);
                    $(".loading").removeClass("--active");
                    if (res.success) {
                        Swal.fire({
                            title: "Xin chúc mừng",
                            text: res.message,
                            icon: "success",
                            timer: 2500,
                            showConfirmButton: false,
                            allowOutsideClick: false,
                        });
                        if (res.redirect) {
                            setTimeout(function () {
                                window.location.replace(res.location);
                            }, 3000);
                        }
                    } else {
                        Swal.fire({
                            title: "Đã có lỗi",
                            text: res.message,
                            icon: "warning",
                            timer: 1500,
                        });
                        if (res.redirect) {
                            setTimeout(function () {
                                window.location.replace(res.location);
                            }, 1500);
                        }
                    }
                    $(":submit", form).removeAttr("disabled");
                },
                error: function (request, status, error) {
                    console.log(request.responseText);
                    console.log(status);
                    console.log(error);
                    if (request.status === 422) {
                        $(".loading").removeClass("--active");
                        const res = request.responseJSON.errors;
                        console.log(res);
                        for (let key in res) {
                            //thông báo lỗi chung chung
                            if (key === "error_field_lg") {
                                $(".error_field_lg").html(res[key]);
                            }
                            if (key === "error_field") {
                                $(".error_field").html(res[key]);
                            }
                            $(`input[name="${key}"]`)
                                .parent()
                                .attr("data-validate", res[key]); //gắn thông báo validate lên parent's input
                            $(`input[name="${key}"]`)
                                .parent()
                                .addClass("alert-validate"); //add class to parent's input to show validate

                            setTimeout(function () {
                                $(
                                    'input[name="' +
                                        key.slice(key.indexOf("_") + 1) +
                                        '"]'
                                ).val("");
                            }, 100); //xóa value của input nếu sai validate
                        }
                        $(":submit", form).removeAttr("disabled");
                    }
                },
            });
        }
        return false;
    });

    $(".find-bill").on("submit", function (e) {
        e.preventDefault();
        var form = $(this);
        var inputArr = form
            .children()
            .children(".validate-input .validate-form-control");
        var sdt = form.serializeArray()[0]["value"];
        var checkValid = true;

        for (let i = 0; i < inputArr.length; i++) {
            if (validate(inputArr[i]) == false) {
                showValidate(inputArr[i]);
                checkValid = false;
            }
        }

        if (checkValid) {
            $(":submit", form).attr("disabled", true);
            $.ajax({
                url: "../view/account/handleUser.php",
                type: "post",
                dataType: false,
                data: { sdt: sdt, type: "check-bill-no-lg" },
                success: function (res) {
                    console.log(res);
                    //res is object
                    if (res["error_phone"]) {
                        $('input[name="phone"]')
                            .parent()
                            .attr("data-validate", res["error_phone"]); //gắn thông báo validate lên parent's input
                        $('input[name="phone"]')
                            .parent()
                            .addClass("alert-validate"); //add class to parent's input to show validate
                    }

                    if (!res["error_phone"]) {
                        window.location.href = ".?act=acc-bill&phone=" + sdt;
                    }

                    $(":submit", form).removeAttr("disabled");
                },
                error: function (request, status, error) {
                    console.log(request.responseText);
                    console.log(error);
                    console.log(status);
                },
            });
        }
        return false;
    });

    //submit logout with ajax
    $(".logout").one("click", function (e) {
        $(".loading").addClass("--active");
        $.ajax({
            url: "/dang-xuat",
            type: "post",
            dataType: "json",
            success: function (res) {
                $(".loading").removeClass("--active");
                if (res.success) {
                    Swal.fire({
                        title: "Xin chúc mừng",
                        text: res.message,
                        icon: "success",
                        timer: 1500,
                        showConfirmButton: false,
                        allowOutsideClick: false,
                    });
                    if (res.redirect) {
                        setTimeout(function () {
                            window.location.replace(res.location);
                        }, 1500);
                    }
                }
            },
        });
    });

    //show modal bill detail
    $(".bill-detail").on("click", function () {
        var mahd = $(this).parents("tr").children(":first").html();

        $.ajax({
            url: "../view/account/handleUser.php",
            type: "post",
            dataType: "json",
            data: { mahd: mahd, type: "bill-detail" },
            success: function (res) {
                $("#table-bill tbody").html(res);
                $("#modal-bill").modal("show");
            },
            error: function (request, status, error) {
                console.log(request.responseText);
                console.log(error);
                console.log(status);
            },
        });
    });
});
function formatDate(timeStr) {
    const time = new Date(timeStr);
    return `${time.getDate()}/${
        time.getMonth() + 1
    }/${time.getFullYear()} ${time.getHours()}:${time.getMinutes()}:${time.getSeconds()}`;
}
// PAGINATION COMMENT OF NEWS
function addComment() {
    var forms = $("#formComment").serialize();
    var textArea = $('textarea[name="comment"]');
    var checkValid = true;
    if (validate(textArea) == false) {
        showValidate(textArea);
        $(textArea).val("");
        $(textArea).on("focus", function () {
            var parent = $(this).closest(".validate-input");
            $(parent).removeClass("alert-validate");
            $(this).css("border", "1px solid #ced4da");
        });
        checkValid = false;
    }
    if (checkValid) {
        $.ajax({
            url: "http://127.0.0.1:8000/api/addcomment",
            type: "post",
            data: forms,
            success: function (res) {
                $(textArea).val("");
                let div = ``;
                res.slice(0, 4).forEach((s) => {
                    div += `<div class="items">
                              <div class="info-users">
                                <img src="/BackEnd/assets/images/${
                                    s.url_avatar
                                }" alt="avatar"/>
                                <div>
                                  <h4>${s.name}</h4>
                                  <span>${formatDate(s.created_at)}</span>
                                </div>
                              </div>
                              <div class="comment">
                                <p>${s.content}</p>
                              </div>
                            </div>
                           `;
                    // '</p><a href="#">TRẢ LỜI</a></div></div>;
                });
                $("#showComment").html(div);
                $(".cmt-count").html(res.length);
            },
            error: function (request, status, error) {
                console.log(request.responseText);
                console.log(status);
                console.log(error);
            },
        });
    }
}
let pageCmts = 2;
$("body").on("click", ".pagination-cmts", function () {
    const id = $(this).data("id");
    const type = $(this).data("type");
    console.log(id);
    $.ajax({
        url: "http://127.0.0.1:8000/api/pagination-cmts",
        type: "get",
        data: { pageCmts, id: id, type: type },
        success: function (res) {
            let div = "";
            const totalPages = Math.ceil(res.length / 4);
            pageCmts++;
            if (pageCmts >= totalPages) {
                $(".pagination-cmts").css("display", "none");
            }
            res.forEach((s) => {
                div += `<div class="items">
                        <div class="info-users">
                          <img src="/BackEnd/assets/images/${
                              s.url_avatar
                          }" alt="avatar"/>
                          <div>
                            <h4>${s.name}</h4>
                            <span>${formatDate(s.created_at)}</span>
                          </div>
                        </div>
                        <div class="comment">
                          <p>${s.content}</p>
                        </div>
                      </div>
                    `;
                // '</p><a href="#">TRẢ LỜI</a></div></div>';
            });
            $("#showComment").append(div);
        },
    });
    return false;
});
// PAGINATION COMMENT OF NEWS - END
// PAGINATION FOR NEWS
let pageNews = 2;
$("body").on("click", ".pagination-news", function () {
    $.ajax({
        url: "http://127.0.0.1:8000/api/pagination-news",
        type: "get",
        data: { pageNews },
        success: function (res) {
            let div = "";
            pageNews++;
            res.forEach((s) => {
                div += `<div class="items">
                    <a href="/tin-tuc/dt/${s.id_news}">
                      <img
                    src="http://127.0.0.1:8000/BackEnd/assets/images/news/${
                        s.url_img_news
                    }"
                        alt="news"
                    /></a>
                    <a class="title" href="/tin-tuc/dt/${s.id_news}">${
                    s.title
                }</a>
                    <div class="list-info">
                      <img src="http://127.0.0.1:8000/BackEnd/assets/images/${
                          s.url_avatar
                      }" alt="icon" />
                      <h4>${s.name}</h4>
                      <span>${formatDate(s.created_at)}</span>
                      <a href="#">4 Nhận xét</a>
                    </div>
                    <p>
                      ${s.short_content} […]
                    </p>
                    <a class="readmore" href="/tin-tuc/dt/${
                        s.id_news
                    }">Xem thêm</a>
                  </div>`;
            });
            $(".news-list").append(div);
            if (res.length < 6) {
                $(".pagination-news").css("display", "none");
            }
        },
    });
    return false;
});
// PAGINATION FOR NEWS - END

//CHECK ĐỐI TÁC
$("body").on("click", "#checkpartners", function () {
    Swal.fire({
        title: "Bạn đã trở thành đối tác",
        icon: "warning",
        timer: 2000,
        showConfirmButton: false,
        allowOutsideClick: false,
    });
    return false;
});
