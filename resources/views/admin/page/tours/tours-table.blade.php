@extends('admin/layouts/layout')
@section('Page-Title')
<div class="col-md-12">
    <h4 class="page-title mb-1">Tours</h4>
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item">
            <a href="/admin/dashboard">Trang chủ</a>
        </li>
        <li class="breadcrumb-item active">Tours</li>
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
                        <h4 class="header-title">Bảng tours</h4>
                        <p class="card-title-desc">
                            Danh sách tài khoản người dùng.
                        </p>
                        <div class="table-responsive" style="border: 0">
                            <table
                                class="table table-centered table-hover mb-0 datatable"
                            >
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Hình ảnh</th>
                                        <th scope="col">Tên tours</th>
                                        <th scope="col">Thời gian khởi hành</th>
                                        <th scope="col">Ngày đi</th>
                                        <th scope="col">Ngày về</th>
                                        <th scope="col">Phương tiện</th>
                                        <th scope="col">Giá</th>
                                        <th scope="col">Giá trẻ em</th>
                                        <th scope="col">Số lượng</th>
                                        <th scope="col">Mô tả</th>
                                        <th scope="col">Hành vi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i=1;
                                    @endphp
                                    @foreach ($showTour as $t)
                                    <tr>
                                        <th scope="row">
                                        <a href="#"># {{$i ++}}</a>
                                        </th>
                                    <td><img width="100px" src="{{asset('BackEnd/assets/images/tours')}}/{{$t->url_img_tour}}" alt=""></td>
                                        <td>{{$t->name_tour}}</td>
                                        <td>{{$t->time}}</td>
                                        <td>{{$t->date_start}}</td>
                                        <td>{{$t->date_end}}</td>
                                        <td>@if ($t->vehicle==1)
                                                Máy bay
                                            @else
                                                Xe khách
                                            @endif</td>
                                        <td>{{$t->price}}</td>
                                        <td>{{$t->price_children}}</td>
                                        <td>{{$t->quantity_limit}}</td>
                                        <td>{{$t->short_content}}</td>
                                        <td>
                                            @if (session('account')->role==1)
                                            <div class="btn-group" role="group">
                                                <a
                                                    type="button"
                                                    href="/admin/edittour/{{$t->id_tour}}"
                                                    class="btn btn-outline-secondary btn-sm"
                                                    data-toggle="tooltip"
                                                    data-placement="top"
                                                    title="Edit"
                                                >
                                                    <i class="mdi mdi-pencil"></i>
                                                </a>
                                                <a
                                                    type="button"
                                            href="/admin/deltour/{{$t->id_tour}}"
                                                    class="btn btn-outline-secondary btn-sm"
                                                    data-toggle="tooltip"
                                                    data-placement="top"
                                                    title="Delete"
                                                >
                                                    <i class="mdi mdi-trash-can"></i>
                                                </a>
                                            </div>
                                            @endif
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
