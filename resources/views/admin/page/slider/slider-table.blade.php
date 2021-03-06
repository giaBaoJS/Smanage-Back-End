@extends('admin/layouts/layout')
@section('Page-Title')
<div class="col-md-12">
    <h4 class="page-title mb-1">Slider</h4>
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item">
            <a href="/admin/dashboard">Trang chủ</a>
        </li>
        <li class="breadcrumb-item active">Slider</li>
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
                        <h4 class="header-title">Bảng Slider</h4>
                        <p class="card-title-desc">
                            Danh sách các Slider trong hệ thống.
                        </p>
                        <div class="table-responsive" style="border: 0">
                            <table
                                class="table table-centered table-hover mb-0 datatable"
                            >
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Hình Ảnh</th>
                                        <th scope="col">Tiều Đề</th>
                                        <th scope="col">Nội Dung</th>
                                        <th scope="col">Hành vi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($showSlider as $sl)
                                    <tr>
                                        <th scope="row">
                                            <a href="#">{{$sl->id_slider}}</a>
                                        </th>
                                        <td data-role="imagemagnifier"
                                        data-magnifier-mode="glass"
                                        data-lens-type="circle"
                                        data-lens-size="20"><img src="{{asset('BackEnd/assets/images/slider')}}/{{$sl->url_img_slider}}" alt="banner1" style="width: 100px"></td>
                                        <td>{{$sl->title}}</td>
                                        <td>{{$sl->content}}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                            <a href="/admin/editformslider/{{ $sl->id_slider }}"

                                                    class="btn btn-outline-secondary btn-sm"
                                                    data-toggle="tooltip"
                                                    data-placement="top"
                                                    title="Edit"
                                                >
                                                    <i class="mdi mdi-pencil"></i>
                                                </a>
                                                <a href="/admin/delslider/{{$sl->id_slider}}"
                                                    type="button"
                                                    class="btn btn-outline-secondary btn-sm"
                                                    data-toggle="tooltip"
                                                    data-placement="top"
                                                    title="Delete"
                                                >
                                                    <i class="mdi mdi-trash-can"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div>
    <!-- end container-fluid -->
</div>
@endsection
