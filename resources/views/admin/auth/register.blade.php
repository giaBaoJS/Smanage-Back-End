@extends('admin.auth.layout-auth')
@section('content-auth')
    <div class="row justify-content-center">
        <div class="col-xl-5 col-sm-8">
            <div class="card">
                <div class="card-body p-4">
                    <div class="p-2">
                        <h5 class="mb-4 text-center">Đăng ký tài khoản</h5>
                        <form class="form-horizontal">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-group-custom">
                                        <input type="text" class="form-control" id="name" required />
                                        <label for="name">Họ và tên</label>
                                    </div>
                                    <div class="form-group form-group-custom">
                                        <input type="text" class="form-control" id="email" required />
                                        <label for="email">Email</label>
                                    </div>
                                    <div class="form-group form-group-custom">
                                        <input type="password" class="form-control" id="password" required />
                                        <label for="password">Mật khẩu</label>
                                    </div>
                                    <div class="form-group form-group-custom">
                                        <input type="password" class="form-control" id="repassword" required />
                                        <label for="repassword">Nhập lại mật khẩu</label>
                                    </div>
                                    <div class="form-group form-group-custom">
                                        <input type="text" class="form-control" id="phone" required />
                                        <label for="phone">Số điện thoại</label>
                                    </div>
                                    <div class="form-group form-group-custom">
                                        <input type="text" class="form-control" id="address" required />
                                        <label for="address">Địa chỉ</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="term-conditionCheck" />
                                        <label class="custom-control-label font-weight-normal" for="term-conditionCheck">Tôi
                                            đồng ý
                                            <a href="#" class="main-cl">các điều kiện</a></label>
                                    </div>
                                    <div class="mt-4">
                                        <button id="button_register" class="btn btn-block waves-effect waves-light bg-main-cl white-cl"
                                            type="button">
                                            Đăng ký
                                        </button>
                                    </div>
                                    <div class="mt-4 text-center">
                                        <a href="/admin" class="text-muted"><i
                                                class="mdi mdi-account-circle mr-1"></i> Bạn đã
                                            có tài khoản?</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
