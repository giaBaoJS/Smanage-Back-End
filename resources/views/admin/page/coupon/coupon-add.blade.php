@extends('admin/layouts/layout')
@section('Page-Title')
<div class="col-md-12">
    <h4 class="page-title mb-1">Thêm Coupon</h4>
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item">
            <a href="/admin/dashboard">Trang chủ</a>
        </li>
        <li class="breadcrumb-item active">Thêm Coupon</li>
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
                        <h4 class="header-title">Thêm coupon</h4>
                        <p class="card-title-desc">
                            Tạo coupon tạo ưu đãi cho người dùng
                        </p>

                        <form class="custom-validation" action="#">
                            <div class="form-group">
                                <label>Mã Coupon</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    placeholder="D20"
                                    required
                                />
                            </div>

                            <div class="form-group">
                                <label>Giá trị coupon</label>
                                <div>
                                    <input
                                        type="text"
                                        id="coupon-value"
                                        class="form-control"
                                        required
                                        parsley-type="email"
                                        placeholder="20%"
                                    />
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Ngày và giờ</label>
                                <div>
                                    <input
                                        class="form-control datepicker-here"
                                        placeholder="01/10/2020 - 10/10/2020"
                                        id="coupon-time"
                                        data-range="true"
                                        data-multiple-dates-separator=" - "
                                        data-language="vi"
                                        required
                                    />
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Số lượng</label>
                                <div>
                                    <input
                                        data-parsley-type="number"
                                        type="text"
                                        class="form-control"
                                        required
                                        placeholder="Nhấp số lượng của coupon"
                                    />
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Nhà cung cấp</label>
                                <select class="custom-select" required>
                                    <option value="">Open this select State</option>
                                    <option value="1">California</option>
                                    <option value="2">Nevada</option>
                                    <option value="3">Montana</option>
                                </select>
                            </div>
                            <div class="form-group mb-0">
                                <div>
                                    <button
                                        type="submit"
                                        class="btn waves-effect waves-light mr-1 white-cl bg-main-cl"
                                    >
                                        Thêm
                                    </button>
                                    <button
                                        type="reset"
                                        class="btn btn-secondary waves-effect"
                                    >
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
