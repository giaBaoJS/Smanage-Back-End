@extends('admin/layouts/layout')
@section('Page-Title')
<div class="col-md-12">
    <h4 class="page-title mb-1">Thêm tin tức</h4>
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item">
            <a href="/admin/dashboard">Trang chủ</a>
        </li>
        <li class="breadcrumb-item active">Thêm tin tức</li>
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
                        <h4 class="header-title">Thêm tin tức</h4>
                        <form class="custom-validation" action="/admin/addnews" method="post" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group">
                                <label>Tiêu đề</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="title"
                                    placeholder="Trải nghiệm Mù Cang Chải 5 ngày 4 đêm"
                                    required
                                />
                            </div>
                            <div class="form-group">
                                <label>Mô tả ngắn</label>
                                <input
                                    type="text"
                                    name="short_content"
                                    class="form-control"
                                    placeholder="Trải nghiệm Mù Cang Chải 5 ngày 4 đêm"
                                    required
                                />
                            <input type="hidden" name="id_user" value="{{session('account')->id_user}}">
                            </div>
                            <div class="form-group">
                                <label>Ảnh đại diện tin tức</label>

                                <div class="custom-file">
                                    <input
                                        type="file"
                                        class="custom-file-input"
                                        required
                                        name="url_img_news"
                                    />
                                    <label class="custom-file-label"
                                        >Chọn ảnh đại diện...</label
                                    >
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Nội dung tin tức</label>
                                <textarea
                                    id="elm1"
                                    name="content"
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
