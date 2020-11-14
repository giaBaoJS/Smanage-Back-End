@extends('admin/layouts/layout')
@section('Page-Title')
<div class="col-md-12">
    <h4 class="page-title mb-1">Thêm Slider</h4>
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item">
            <a href="/admin/dashboard">Trang chủ</a>
        </li>
        <li class="breadcrumb-item active">Thêm Slider</li>
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
                        <h4 class="header-title">Thêm Sliser</h4>
                        <p class="card-title-desc">Thêm Sliser</p>

                        <form class="custom-validation" action="/admin/addSlider" enctype="multipart/form-data" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Tên Sliser</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    placeholder="Banner mẫu"
                                    name="title"
                                    required
                                />
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Nội dung</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" name="content" rows="3"></textarea>
                            </div>


                            <div class="form-group">
                                <label>Hình ảnh</label>

                                <div class="custom-file">
                                    <input
                                        type="file"
                                        class="custom-file-input"
                                        required
                                        name="url_img_slider"

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
                                    <a
                                        href="/admin/slider"
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
