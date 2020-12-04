@extends('admin/layouts/layout')
@section('Page-Title')
<div class="col-md-12">
    <h4 class="page-title mb-1">Chỉnh sửa Coupon</h4>
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item">
            <a href="/admin/dashboard">Trang chủ</a>
        </li>
        <li class="breadcrumb-item active">Chỉnh sửa Coupon</li>
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
                        <h4 class="header-title">Chỉnh sửa coupon</h4>
                        <p class="card-title-desc">
                            Chỉnh sửa coupon tạo ưu đãi cho người dùng
                        </p>

                    <form class="custom-validation" action="/admin/editcoupon/{{$showCouponOne->id_coupon}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Mã Coupon</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    placeholder="Mã Coupon"
                                    id="code_coupon"
                                    name="code_coupon"
                                    value="{{$showCouponOne->code_coupon}}"
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
                                        name="price"
                                        required
                                        parsley-type="email"
                                        placeholder="1% - 50%"
                                        value="{{$showCouponOne->price}}"
                                    />
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Ngày và giờ</label>
                                <div>
                                    <input
                                        class="form-control datepicker-here"
                                        placeholder="Ngày bắt đầu - Ngày kết thúc"
                                        id="coupon-time"
                                        data-range="true"
                                        name="date_start"
                                        data-multiple-dates-separator=" - "
                                        data-language="vi"
                                        value="{{$showCouponOne->date_start}}"
                                        required
                                    />
                                </div>
                            </div>
                        <input type="hidden" name="id_user" id="id_user" value="{{session('account')->id_user}}">
                        <input type="hidden" name="id_doitac" id="id_doitac" value="{{session('account')->id_doitac}}">
                            <div class="form-group">
                                <label>Số lượng</label>
                                <div>
                                    <input
                                        data-parsley-type="number"
                                        type="number"
                                        class="form-control"
                                        required
                                        name="quantity"
                                        placeholder="Nhấp số lượng của coupon"
                                        value="{{$showCouponOne->quantity}}"
                                    />
                                </div>
                            </div>
                            <div class="form-group mb-0">
                                <div>
                                    <button
                                        type="submit"
                                        class="btn waves-effect waves-light mr-1 white-cl bg-main-cl"
                                    >
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
