@extends('admin/layouts/layout')
@section('Page-Title')
<div class="col-md-12">
    <h4 class="page-title mb-1">Thêm Tours</h4>
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item">
            <a href="/admin/dashboard">Trang chủ</a>
        </li>
        <li class="breadcrumb-item active">Thêm Tours</li>
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
                        <h4 class="header-title">Thêm tours</h4>
                        <p class="card-title-desc">
                            Tạo coupon tạo ưu đãi cho người dùng
                        </p>

                        <form class="custom-validation" action="#">
                            <div class="form-group">
                                <label>Tên tours</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    placeholder="Trải nghiệm Mù Cang Chải 5 ngày 4 đêm"
                                    required
                                />
                            </div>

                            <!-- chọn miền gọi ajax ra tỉnh -->
                            <div class="form-group">
                                <label>Miền</label>
                                <select class="custom-select" required>
                                    <option value="">Chọn miền</option>
                                    <option value="1">Miền Bắc</option>
                                    <option value="2">Miền Trung</option>
                                    <option value="3">Miền Nam</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tỉnh</label>
                                <select class="custom-select" required>
                                    <option value="">Chọn tỉnh</option>
                                    <option value="1">Sài Gòn</option>
                                    <option value="2">Wakanda</option>
                                    <option value="3">Cần Thơ</option>
                                </select>
                            </div>
                            <!-- chọn hình thức di chuyển gọi ajax ra nhà vận chuyển -->
                            <div class="form-group">
                                <label>Hình thức di chuyển</label>
                                <select class="custom-select" required>
                                    <option value="">
                                        Lựa chọn hình thức di chuyển
                                    </option>
                                    <option value="1">Máy bay</option>
                                    <option value="2">Xe 50 chỗ</option>
                                    <option value="3">Xe giường nằm</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nhà vận chuyển</label>
                                <select class="custom-select" required>
                                    <option value="">Chọn nhà vận chuyển</option>
                                    <option value="1">Vietnam Airline</option>
                                    <option value="2">Thành Bưởi</option>
                                </select>
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
                            <!-- Giá trẻ em sẽ bằng số % giá người lớn -->
                            <div class="form-group">
                                <label>Giá</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    placeholder="40.000.000 VNĐ"
                                    required
                                />
                            </div>
                            <div class="form-group">
                                <label>Ảnh đại diện tours</label>

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
                            <div class="form-group">
                                <label>Thêm ảnh vào thư viện</label>

                                <div class="custom-file">
                                    <input
                                        type="file"
                                        multiple
                                        class="custom-file-input"
                                        required
                                    />
                                    <label class="custom-file-label"
                                        >Chọn nhiều ảnh...</label
                                    >
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Giới thiệu tours</label>
                                <textarea
                                    id="elm1"
                                    name="area"
                                    placeholder="Nhập mô tả"
                                ></textarea>
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
