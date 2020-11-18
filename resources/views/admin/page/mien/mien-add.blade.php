@extends('admin/layouts/layout')
@section('Page-Title')
<div class="col-md-12">
    <h4 class="page-title mb-1">Thêm Miền</h4>
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item">
            <a href="/admin/dashboard">Trang chủ</a>
        </li>
        <li class="breadcrumb-item active">Thêm Miền</li>
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
                        <h4 class="header-title">Thêm miền</h4>
                        <p class="card-title-desc">Thêm miền</p>

                        <form class="custom-validation" action="/admin/addMien" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group col-xl-12">
                                <label>Tên miền</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    placeholder="Miền Nam"
                                    name="tenmien"
                                    required
                                />
                            </div>
                            <div class="form-group col-xl-12">
                                <label>Hình ảnh đại diện</label>
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
