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
            console.log(data);
            $(":submit", form).attr("disabled", true);
            $(".loading").addClass("--active");
            $.ajax({
                url: action,
                type: method,
                dataType: "json",
                data: { ...formatDataForm(data) },
                success: function (res) {
                    $(".loading").removeClass("--active");
                    console.log(res);
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
        $.ajax({
            url: "../view/account/handleUser.php",
            type: "post",
            dataType: "json",
            data: { type: "logout" },
            success: function (res) {
                setTimeout(function () {
                    window.location.href = res["direct"];
                }, 200);
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
