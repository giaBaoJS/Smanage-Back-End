@extends('admin.auth.layout-auth')
@section('content-auth')
<div class="row justify-content-center">
    <div class="col-xl-5 col-sm-8">
        <div class="card">
            <div class="card-body p-4">
                <div class="p-2">
                    <h5 class="mb-5 text-center">
                        Đăng nhập vào Golden Tours CMS
                    </h5>
                    <form class="form-horizontal">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group form-group-custom mb-4">
                                    @if (Cookie::get('email'))
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="email"
                                value="{{Cookie::get('email')}}"
                                        required
                                    />
                                    @else
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="email"
                                        required
                                    />
                                    <label for="email">Email</label>
                                    @endif

                                </div>
                                <div class="form-group form-group-custom mb-4">
                                    @if (Cookie::get('password'))
                                    <input
                                        type="password"
                                        class="form-control"
                                        id="password"
                                        value="{{Cookie::get('password')}}"
                                        required
                                    />
                                    @else
                                    <input
                                        type="password"
                                        class="form-control"
                                        id="password"
                                        required
                                    />
                                    <label for="password">Mật khẩu</label>
                                    @endif
                                </div>
                                <label id="errorLogin" style="color: red;margin-bottom:24px"></label>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="custom-control custom-checkbox">
                                            @if (Cookie::get('email'))
                                            <input
                                            type="checkbox"
                                            class="custom-control-input"
                                            id="customControlInline"
                                            checked
                                        />
                                            @else
                                            <input
                                            type="checkbox"
                                            class="custom-control-input"
                                            id="customControlInline"
                                        />
                                            @endif

                                            <label
                                                class="custom-control-label"
                                                for="customControlInline"
                                                >Ghi nhớ đăng nhập</label
                                            >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="text-md-right mt-3 mt-md-0">
                                            <a href="admin/recoverpw" class="text-muted"
                                                ><i class="mdi mdi-lock"></i> Quên mật khẩu?</a
                                            >
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <button
                                        id="buttonLogin"
                                        class="btn btn-block waves-effect waves-light bg-main-cl white-cl"
                                        type="button"
                                    >
                                        Đăng nhập
                                    </button>
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
