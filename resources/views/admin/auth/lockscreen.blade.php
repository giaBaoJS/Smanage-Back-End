@extends('admin.auth.layout-auth')
@section('content-auth')
<div class="row justify-content-center">
    <div class="col-xl-5 col-sm-8">
        <div class="card">
            <div class="card-body p-4">
                <div class="p-2">
                    <h5 class="mb-5 text-center">Khóa màn hình tạm thời</h5>
                    <form class="form-horizontal">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="user-thumb text-center">
                                    <img
                                        src="{{asset('BackEnd/assets/images/users')}}/avatar-1.jpg"
                                        class="rounded-circle avatar-lg img-thumbnail mx-auto d-block"
                                        alt="thumbnail"
                                    />
                                </div>
                                <input
                                        type="hidden"
                                        class="form-control"
                                        id="email"
                                        value="{{Cookie::get('emailLock')}}"
                                        required
                                    />
                                    <p style="text-align: center;margin-top:10px">{{Cookie::get('nameLock')}}</p>
                                <div class="form-group form-group-custom mt-5">

                                    <input
                                    type="password"
                                    class="form-control"
                                    id="password"
                                    required
                                    />
                                <label for="password">Mật khẩu</label>
                                </div>
                                <div class="mt-4">
                                    <button
                                        id="buttonLoginLock"
                                        class="btn btn-block waves-effect waves-light bg-main-cl white-cl"
                                        type="button"
                                    >
                                        Đăng nhập lại
                                    </button>
                                </div>
                                <div class="mt-4 text-center">
                                    <p class="mb-0">
                                        Không phải bạn ? Trở về
                                        <a
                                            href="/admin"
                                            class="font-weight-bold main-cl"
                                        >
                                            Đăng nhập
                                        </a>
                                    </p>
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
