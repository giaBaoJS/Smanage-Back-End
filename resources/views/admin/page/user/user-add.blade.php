@extends('admin/layouts/layout')
@section('Page-Title')
<div class="col-md-12">
    <h4 class="page-title mb-1">Thêm người dùng</h4>
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item">
            <a href="/admin/dashboard">Trang chủ</a>
        </li>
        <li class="breadcrumb-item active">Thêm người dùng</li>
    </ol>
</div>
@endsection
@section('content')
<div class="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Thêm người dùng</h4>
                        <p class="card-title-desc">
                            Tạo tài khoản cho người dùng và đối tác
                        </p>

                        <form class="row custom-validation" action="#" id="formLogin">
                            <div class="form-group col-xl-6">
                                <label>Họ tên</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    placeholder="Họ tên"
                                    id="name"
                                    name="name"
                                    required
                                />
                            </div>
                            <div class="form-group col-xl-6">
                                <label>Email</label>
                                <input
                                    type="email"
                                    class="form-control"
                                    placeholder="Email"
                                    id="email"
                                    name="email"
                                    required
                                />
                            </div>
                            <div class="form-group col-xl-6">
                                <label>Mật khẩu</label>
                                <input
                                    type="password"
                                    class="form-control"
                                    placeholder="Mật khẩu"
                                    name="password"
                                    id="password"
                                    required
                                />
                            </div>
                            <div class="form-group col-xl-6">
                                <label>Nhập lại mật khẩu</label>
                                <input
                                    type="password"
                                    class="form-control"
                                    placeholder="Nhập lại mật khẩu"
                                    id="rePassword"
                                    required
                                />
                            </div>
                            <div class="form-group col-xl-6">
                                <label>Số điện thoại</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    placeholder="Số điện thoại"
                                    id="phone"
                                    name="phone"
                                    required
                                />
                            </div>
                            <div class="form-group col-xl-6">
                                <label>Địa chỉ</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    placeholder="Địa chỉ"
                                    id="address"
                                    name="address"
                                    required
                                />
                            </div>
                            <div class="form-group col-xl-6">
                                <label>Chức năng</label>
                                    <select class="form-control" name="role" onchange="kiemtraDoiTac()" id="chucnang" value=''>
                                        <option>Chọn chức năng</option>
                                        <option value="2">Admin</option>
                                        <option value="1">Đối tác</option>
                                        <option value="0">Người dùng</option>
                                    </select>
                            </div>
                            <div class="form-group col-xl-6" id="doitac">

                            </div>
                            <div class="form-group col-xl-6">
                                <label>Giới tính</label>
                                    <select class="form-control" id="gender" name="gender" value=''>
                                        <option>Chọn giới tính</option>
                                        <option value="Nam">Nam</option>
                                        <option value="Nữ">Nữ</option>
                                        <option value="Khác">Khác</option>
                                    </select>
                            </div>
                            <div class="form-group col-xl-6">
                                <label>Kích hoạt tài khoản</label>
                                    <select class="form-control" name="active" id="active" value=''>
                                        <option>Chọn</option>
                                        <option value="1">Kích hoạt</option>
                                        <option value="0">Không kích hoạt</option>
                                    </select>
                            </div>
                            <div class="form-group col-xl-12">
                                <label>Ảnh đại diện</label>

                                <div class="custom-file">
                                    <input
                                        type="file"
                                        class="custom-file-input"
                                        required
                                    />
                                    <label class="custom-file-label"
                                        >Chọn ảnh đại diện...</label
                                    >
                                </div>
                            </div>
                            <div class="form-group col-xl-12 mb-0">
                                <div>
                                    <button onclick="addUser()" type="button" class="btn waves-effect waves-light mr-1 white-cl bg-main-cl">
                                        Thêm
                                    </button>
                                    <button type="reset" class="btn btn-secondary waves-effect">
                                        Hủy
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div>
    <!-- end container-fluid -->
</div>
@endsection
