@extends('admin.auth.layout-auth')
@section('content-auth')
<div class="row justify-content-center">
    <div class="col-xl-5 col-sm-8">
        <div class="card">
            <div class="card-body p-4">
                <div class="p-2">
                    <h5 class="mb-5 text-center">Tìm lại mật khẩu</h5>
                    <form class="form-horizontal" action="index.html">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-warning alert-dismissible">
                                    <button
                                        type="button"
                                        class="close"
                                        data-dismiss="alert"
                                        aria-hidden="true"
                                    >
                                        ×
                                    </button>
                                    Nhập địa chỉ <b>Email</b> của bạn và chúng tôi sẽ gửi
                                    <b>Email</b> xác thực đến bạn
                                </div>

                                <div class="form-group form-group-custom mt-5">
                                    <input
                                        type="email"
                                        class="form-control"
                                        id="useremail"
                                        required
                                    />
                                    <label for="useremail">Email</label>
                                </div>
                                <div class="mt-4">
                                    <button
                                        class="btn btn-block waves-effect waves-light bg-main-cl white-cl"
                                        type="submit"
                                    >
                                        Tìm mật khẩu
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
