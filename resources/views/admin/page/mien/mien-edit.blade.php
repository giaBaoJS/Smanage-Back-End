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
                        <h4 class="header-title">Chỉnh sửa {{$showMien->name_mien}}</h4>
                    <form class="custom-validation" action="/admin/editMien/{{$showMien->id_mien}}" method="POST" enctype="multipart/form-data">
                            @csrf
                                <input
                                    type="hidden" disabled="disabled"
                                    class="form-control"
                                    placeholder="Mã miền"
                                    name="id_mien"
                                    value="{{$showMien->id_mien}}"
                                    required

                                />

                            <div class="form-group col-xl-12">
                                <label>Tên miền</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    placeholder="Tên miền"
                                    name="tenmien"
                                    value="{{$showMien->name_mien}}"
                                    required

                                />
                            </div>
                            <div class="form-group col-xl-12" style="text-align:center">
                                <img src="{{asset('BackEnd/assets/images')}}/{{$showMien->url_img_mien}}" alt="" width="80%">
                            </div>
                            <div class="form-group col-xl-12">
                                <label>Đổi hình ảnh đại diện</label>
                                <div class="custom-file">
                                    <input
                                        type="file"
                                        class="custom-file-input"
                                        required
                                        name="url_img_mien"
                                    />
                                    <label class="custom-file-label"
                                        >Chọn ảnh...</label
                                    >
                                </div>
                            </div>
                            <div class="form-group mb-0">
                                <div>
                                    <button type="submit"
                                        class="btn waves-effect waves-light mr-1 white-cl bg-main-cl"
                                    >
                                        Cập nhật
                                    </button>
                                    <a
                                        href="/admin/mien"
                                        class="btn btn-secondary waves-effect"
                                    >
                                        Hủy
                                    </a>
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
