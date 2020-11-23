@extends('admin/layouts/layout')
@section('Page-Title')
<div class="col-md-12">
    <h4 class="page-title mb-1">Cập nhật người dùng</h4>
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item">
            <a href="/admin/dashboard">Trang chủ</a>
        </li>
        <li class="breadcrumb-item active">Cập nhật người dùng</li>
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
                        <h4 class="header-title">Cập nhật người dùng</h4>
                        <p class="card-title-desc">
                            Cập nhật tài khoản cho người dùng và đối tác
                        </p>

                        <form class="row custom-validation" action="#" id="formUpdateUser">
                            <div class="form-group col-xl-6">
                                <label>Họ tên</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    placeholder="Họ tên"
                                    id="name"
                                    name="name"
                                    value="{{$showOneUser->name}}"
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
                                    value="{{$showOneUser->email}}"
                                    required
                                />
                            </div>
                            <div class="form-group col-xl-6">
                                <label>Mật khẩu</label>
                                <input
                                    type="password"
                                    class="form-control"
                                    placeholder="*************"
                                    name="password"
                                    id="password"
                                    value=""
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
                                    value="{{$showOneUser->phone}}"
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
                                    value="{{$showOneUser->address}}"
                                    required
                                />
                            </div>
                            <div class="form-group col-xl-6">
                                <label>Chức năng</label>
                            <select class="form-control" name="role" onchange="kiemtraDoiTac()" id="chucnang" value=''>
                                        <option>Chọn chức năng</option>
                                        @foreach ($showVaitro as $v)
                                        <?php
                                        if ($showOneUser->role==$v['id']) {
                                            $selectU="selected";
                                        }else {
                                            $selectU="";
                                        }
                                        ?>
                                            <option value="{{$v['id']}}" {{$selectU}}>{{$v['name']}}</option>
                                        @endforeach
                                    </select>
                            </div>
                            <div class="form-group col-xl-6" id="doitac" style="">
                                <label>Đối tác</label>
                                <select class="form-control" id="doitacR" name="id_doitac" value="">
                                    <option>Chọn đối tác</option>
                                    @foreach ($showDoitac as $d)
                                    <?php
                                        if ($showOneUser->id_doitac==$d->id_doitac) {
                                            $selectD="selected";
                                        }else {
                                            $selectD="";
                                        }
                                        ?>
                                <option value="{{$d->id_doitac}}" {{$selectD}}>{{$d->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-xl-6">
                                <label>Giới tính</label>
                                    <select class="form-control" id="gender" name="gender" value="">
                                        <option>Chọn giới tính</option>
                                        @foreach ($showGender as $g)
                                    <?php
                                    if ($showOneUser->gender==$g['name']) {
                                        $select="selected";
                                    }else {
                                        $select="";
                                    }
                                    ?>
                                    <option value="{{$g['name']}}" {{$select}}>{{$g['name']}}</option>
                                        @endforeach
                                    </select>
                            </div>
                            <div class="form-group col-xl-6">
                                <label>Kích hoạt tài khoản</label>
                                    <select class="form-control" name="active" id="active" value=''>
                                        <option>Chọn</option>
                                        @foreach ($showActive as $a)
                                        <?php
                                        if ($showOneUser->active==$a['id']) {
                                            $selecta="selected";
                                        }else {
                                            $selecta="";
                                        }
                                        ?>
                                        <option value="{{$a['id']}}" {{$selecta}}>{{$a['name']}}</option>
                                        @endforeach
                                    </select>
                            </div>
                            <div class="form-group col-xl-12" style="text-align: center;padding:10px">
                               <img width="80px" src="{{asset('BackEnd/assets/images')}}/{{$showOneUser->url_avatar}}" alt="">
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
                            <input type="hidden" name="id_user" value="{{$showOneUser->id_user}}">
                            </div>
                            <div class="form-group col-xl-12 mb-0">
                                <div>
                                    <button onclick="updateUser()" type="button" class="btn waves-effect waves-light mr-1 white-cl bg-main-cl">
                                        Cập nhật
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
