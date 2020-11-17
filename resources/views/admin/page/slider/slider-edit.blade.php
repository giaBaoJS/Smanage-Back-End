@extends('admin/layouts/layout')
@section('Page-Title')
<div class="col-md-12">
    <h4 class="page-title mb-1">Chỉnh sửa Slider</h4>
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item">
            <a href="/admin/dashboard">Trang chủ</a>
        </li>
        <li class="breadcrumb-item active">Chỉnh sửa Slider</li>
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
                        <h4 class="header-title">Chỉnh sửa {{$slider->title}}</h4>
                    <form class="custom-validation" action="/admin/editSlider/{{$slider->id_slider}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>ID</label>
                                <input
                                    type="text" disabled="disabled"
                                    class="form-control"
                                    placeholder="Mã slider"
                                    name="id_slider"
                                    value="{{$slider->id_slider}}"
                                    required

                                />
                            </div>

                            <div class="form-group">
                                <label>Tên slider</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    placeholder="Tiêu đề"
                                    name="title"
                                    value="{{$slider->title}}"
                                    required

                                />
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Nội dung</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" name="content" rows="3">{{$slider->content}}</textarea>
                            </div>

                            <div class="form-group">
                                <label>Hình ảnh</label>

                                <div class="custom-file">
                                    <input
                                        type="file"
                                        class="custom-file-input"
                                        value="{{$slider->url_img_slider}}"
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
                                    <button type="submit"
                                        class="btn waves-effect waves-light mr-1 white-cl bg-main-cl"
                                    >
                                        Cập nhật
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
