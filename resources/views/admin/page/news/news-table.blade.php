@extends('admin/layouts/layout')
@section('Page-Title')
<div class="col-md-12">
    <h4 class="page-title mb-1">Tin tức</h4>
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item">
            <a href="/admin/dashboard">Trang chủ</a>
        </li>
        <li class="breadcrumb-item active">Tin tức</li>
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
                        <h4 class="header-title">Bảng tin tức</h4>
                        <p class="card-title-desc">Danh sách tin tức.</p>
                        <div class="table-responsive" style="border: 0">
                            <table
                                class="table table-centered table-hover mb-0 datatable"
                            >
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Người đăng</th>
                                        <th scope="col">Tiêu đề</th>
                                        <th scope="col">Ảnh đại diện</th>
                                        <th scope="col">Mô tả ngắn</th>
                                        <th scope="col">Lượt xem</th>
                                        <th scope="col">Lượt thích</th>
                                        <th scope="col">Ngày đăng</th>
                                        <th scope="col">Hành vi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i=1;
                                    @endphp
                                    @foreach ($showNew as $n)
                                    <tr>
                                        <th scope="row">
                                        <a href="#"># {{$i++}}</a>
                                        </th>
                                    <td>{{$n->name}}</td>
                                        <td>{{$n->title}}</td>
                                    <td><img src="{{asset('BackEnd/assets/images/news')}}/{{$n->url_img_news}}" alt="" width="100px"></td>
                                        <td>{{$n->short_content}}</td>
                                        <td>{{$n->views}}</td>
                                        <td>{{$n->likes}}</td>
                                        <td>{{date('d/m/Y',strtotime($n->created_at))}}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a
                                            href="/admin/viewsnews/{{$n->id_news}}"
                                                type="button"
                                                    class="btn btn-outline-secondary btn-sm"
                                                    data-toggle="tooltip"
                                                    data-placement="top"
                                                    title="View"
                                                >
                                                    <i class="mdi mdi-eye"></i>
                                                </a>
                                                <a
                                            href="/admin/formeditnew/{{$n->id_news}}"
                                                    type="button"
                                                    class="btn btn-outline-secondary btn-sm"
                                                    data-toggle="tooltip"
                                                    data-placement="top"
                                                    title="Edit"
                                                >
                                                    <i class="mdi mdi-pencil"></i>
                                                </a>
                                                <button
                                                    type="button"
                                                    class="btn btn-outline-secondary btn-sm"
                                                    data-toggle="tooltip"
                                                    data-placement="top"
                                                    title="Delete"
                                                    onclick="deleteNews({{$n->id_news}})"
                                                >
                                                    <i class="mdi mdi-trash-can"></i>
                                                </button>
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
