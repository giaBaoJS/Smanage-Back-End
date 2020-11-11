
$(document).ready(function () {
    $.ajax({
        url: 'http://127.0.0.1:8000/api/admin/setpremium',
        type: 'get',
    }).done(function(ketqua) {
        console.log(ketqua,'ưewe');
    });
})
$("#buttonLogin").click(function () {
    email = $("#email").val();
    password = $("#password").val();
    checkbox = $("#customControlInline").prop("checked");
    $.ajax({
        url: "admin/loginCms",
        type: "get",
        data: { email: email, password: password, checkbox: checkbox },
        success: function (data) {
            if (data == 0) {
                alertify.error('Email hoặc mật khẩu không đúng. Vui lòng nhập lại');
            } else {
                alertify.success('Đăng nhập thành công');
                function loadpage(){
                    window.location.href = "/admin/dashboard";
                  };
                  setTimeout (loadpage, 1000);
            }
        },
    });
});
$("#buttonLoginLock").click(function () {
    email = $("#email").val();
    password = $("#password").val();
    $.ajax({
        url: "http://127.0.0.1:8000/api/admin/loginlock",
        type: "get",
        data: { email: email, password: password},
        success: function (data) {
            if (data == 0) {
                alertify.error('Mật khẩu không đúng. Vui lòng nhập lại');
            } else {
                alertify.success('Đăng nhập thành công');
                function loadpage(){
                    window.location.href = "/admin";
                  };
                  setTimeout (loadpage, 1000);
            }
            console.log(data);
        },
    });
});
$("#button_register").click(function () {
    name = $("#name").val();
    email = $("#email").val();
    password = $("#password").val();
    repassword = $("#repassword").val();
    phone = $("#phone").val();
    address = $("#address").val();
    checkbox = $("#term-conditionCheck").prop("checked");
    if (name == "") {
        alertify.error('Họ tên không được để trống');
        return false;
    }
    if (email == "") {
        alertify.error('Email không được để trống');
        return false;
    }
    if (password == "") {
        alertify.error('Mật khẩu không được để trống');
        return false;
    } else {
        $("#errorName").html("");
    }
    if (repassword != password) {
        alertify.error('Mật khẩu nhập lại không đúng');
        return false;
    }
    if (phone == "") {
        alertify.error('Số điện thoại không được để trống');
        return false;
    }
    if (address == "") {
        alertify.error('Địa chỉ không được để trống');
        return false;
    }
    if (checkbox == false) {
        alertify.warning('Vui lòng chấp nhận các điều khoản của chúng tôi');
        return false;
    } else {
        $("#errorCheckbox").html("");
        $.ajax({
            url: 'http://127.0.0.1:8000/api/admin/add-account',
            type: 'get',
            data: {
                name:name,
                email:email,
                password:password,
                phone:phone,
                address:address
            }
        }).done(function(ketqua) {
           if (ketqua==1) {
            alertify.error('Email đã đăng ký');
           }else{
            alertify.success('Đăng ký thành công');
            function loadpage(){
                window.location.href = "/admin/dashboard";
              };
              setTimeout (loadpage, 1000);
           }
        });
    }
});


// delete Contact

function deleteContact(id){
    Swal.fire({
        title: 'Bạn có chắc chắn muốn xóa nó?',
        text: "Nhấp OK để xóa!",
        icon: 'warning',
        showCancelButton: !0,
        confirmButtonColor: '#3ddc97',
        cancelButtonColor: '#f46a6a',
        confirmButtonText: 'OK !',
    }).then(function (t) {
        t.value &&
           $.ajax({
                url: 'http://127.0.0.1:8000/api/admin/delcontact/'+id,
                success:function (params) {
                    if (params==1) {
                        alertify.success('Xóa liên hệ thành công !');
                        window.location.href = "/admin/contact";
                    }
                }
           })
    });
}

// delete Contact
function oneCoupon(id) {
    $.ajax({
        url: 'http://127.0.0.1:8000/api/admin/onecounpon/'+id,
        success:function (params) {
            if (params.status==1) {
                button=' <div class="badge badge-soft-success">Đang hoạt động</div>';
            }else{
                button=' <div class="badge badge-soft-danger"> Chưa kích hoạt</div>';

            }
            $('.modal-body').html(
                '<div><p><span>ID: </span># '+params.id_coupon+'</p></div><div><p><span>Nhà cung cấp: </span> '+params.name+'</p></div><div><p><span>Mã Coupon: </span> '+params.code_coupon+'</p></div><div><p><span>Ngày bắt đầu - Kết thúc: </span> '+params.date_start+'</p></div><div><p><span>Giá trị: </span> '+params.price+'%</p></div><div><p><span>Số lượng: </span> '+params.quantity+'</p></div><div><p><span>Trạng thái: </span>'+button+'</p></div>'
                )
        }
   })
}

// delete Coupon-------------------
    function deleteCoupon(id,role) {
        if (role!=2) {
            alertify.error('Bạn không có quyền sử dụng chức năng này');
        }else{

        }
    }
// delete Coupon-------------------


//Delete user--------------------------->

function deleteUser(id,id_kt,role) {
    if (id===id_kt) {
        alertify.error('Bạn không thể xóa chính mình');
    }else if (role===2) {
        alertify.error('Bạn không đủ thẩm quyền để xóa tài khoản này');
    }else{
        Swal.fire({
            title: 'Bạn có chắc chắn muốn xóa tài khoản này không?',
            text: "Nhấp OK để xóa!",
            icon: 'warning',
            showCancelButton: !0,
            confirmButtonColor: '#3ddc97',
            cancelButtonColor: '#f46a6a',
            confirmButtonText: 'OK !',
        }).then(function (t) {
            t.value &&
               $.ajax({
                    url: 'http://127.0.0.1:8000/api/admin/delcontact/',
                    success:function (params) {
                        if (params==1) {
                            alertify.success('Xóa liên hệ thành công !');
                            window.location.href = "/admin/contact";
                        }
                    }
               })
        });
    }
}

//Delete user--------------------------->
function kiemtraDoiTac(){
       doitac=$('#chucnang').val();
       if (doitac==1) {
        $.ajax({
            url: 'http://127.0.0.1:8000/api/admin/doitac',
            success:function (params) {
                http='';
                params.forEach(s => {
                    http+='<option value="'+s.id_doitac+'">'+s.name+'</option>';
               });
            document.getElementById('doitac').innerHTML='<label>Đối tác</label><select class="form-control" id="doitacR" name="id_doitac" value=""><option>Chọn đối tác</option>'+http+'</select>';
            }
       })
       }else{
           $('#doitac').html('');
       }
}
function addUser() {
    name=$('#name').val();
    email=$('#email').val();
    password=$('#password').val();
    rePassword=$('#rePassword').val();
    phone=$('#phone').val();
    address=$('#address').val();
    gender=$('#gender').val();
    active=$('#active').val();
    role=$('#chucnang').val();
    id_doitac=$('#doitacR').val();
    if (name == "") {
        alertify.error('Vui lòng nhập họ tên');
        return false;
    }
    if (email == "") {
        alertify.error('Vui lòng nhập Email');
        return false;
    }
    if (password == "") {
        alertify.error('Mật khẩu không được để trống');
        return false;
    } else {
        $("#errorName").html("");
    }
    if (rePassword != password) {
        alertify.error('Mật khẩu nhập lại không đúng');
        return false;
    }
    if (phone == "") {
        alertify.error('Vui lòng nhập số điện thoại');
        return false;
    }
    if (address == "") {
        alertify.error('Vui lòng nhập địa chỉ');
        return false;
    }
    if (role == "Chọn chức năng") {
        alertify.error('Vui lòng chọn chức năng');
        return false;
    }
    if (id_doitac == "Chọn đối tác") {
        alertify.error('Vui lòng chọn đối tác!');
        return false;
    }
    if (gender == "Chọn giới tính") {
        alertify.error('Vui lòng chọn giới tính!');
        return false;
    }
    if (active == "Chọn") {
        alertify.error('Vui lòng chọn kích hoạt!');
        return false;
    }
    form=$('#formLogin').serialize();
    $.ajax({
        url: 'http://127.0.0.1:8000/api/admin/adduser',
        type: 'get',
        data: form,
    }).done(function(ketqua) {
        if (ketqua == 1) {
            alertify.error('Email đã đăng ký. Vui lòng chọn lại Email');
        } else {
            alertify.success('Tạo tài khoản thành công ');
            function loadpage(){
                window.location.href = "/admin/user";
              };
              setTimeout (loadpage, 800);
        }
    });
}

function backHome() {
    $.ajax({
        url: 'http://127.0.0.1:8000/api/admin/rtlogin',
        type: 'get',
    }).done(function(ketqua) {
        window.location.href = "/admin";
    });
}
// delete coupon--------------------------

function deleteCoupon(id){
    Swal.fire({
        title: 'Bạn có chắc chắn muốn xóa Coupon này không?',
        text: "Nhấp OK để xóa!",
        icon: 'warning',
        showCancelButton: !0,
        confirmButtonColor: '#3ddc97',
        cancelButtonColor: '#f46a6a',
        confirmButtonText: 'OK !',
    }).then(function (t) {
        t.value &&
           $.ajax({
                url: 'http://127.0.0.1:8000/api/admin/delcoupon/'+id,
                success:function (params) {
                    if (params==1) {
                        alertify.success('Xóa coupon thành công !');
                        window.location.href = "/admin/coupon";
                    }
                }
           })
    });
}

// delete coupon--------------------------
