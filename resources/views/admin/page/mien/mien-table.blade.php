@extends('admin/layouts/layout')
@section('Page-Title')
<div class="col-md-12">
    <h4 class="page-title mb-1">Miền</h4>
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item">
            <a href="/admin/dashboard">Trang chủ</a>
        </li>
        <li class="breadcrumb-item active">Miền</li>
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
                        <h4 class="header-title">Bảng miền</h4>
                        <p class="card-title-desc">
                            Danh sách các miền trong hệ thống.
                        </p>
                        <div class="table-responsive" style="border: 0">
                            <table
                                class="table table-centered table-hover mb-0 datatable"
                            >
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Tên miền</th>
                                        <th scope="col">Hình</th>
                                        <th scope="col">Hành vi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i=1;
                                    @endphp
                                    @foreach ($showMien as $mien)
                                    <tr>
                                        <th scope="row">
                                            <a href="#">{{$i++}}</a>
                                        </th>
                                    <td>{{$mien->name_mien}}</td>
                                    <td><img src="{{asset('BackEnd/assets/images')}}/{{$mien->url_img_mien}}" width="200px" alt=""></td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <button
                                                    type="button"
                                                    class="btn btn-outline-secondary btn-sm"
                                                    data-toggle="tooltip"
                                                    data-placement="top"
                                                    title="View"
                                                >
                                                    <i class="mdi mdi-eye"></i>
                                                </button>
                                                <a
                                                    href="/admin/formeditmien/{{$mien->id_mien}}"
                                                    class="btn btn-outline-secondary btn-sm" data-toggle="tooltip"
                                                    data-placement="top"
                                                    title="edit"
                                                    >
                                                    <i class="mdi mdi-pencil"></i>
                                                </a>
                                                <a
                                                    type="button"
                                                    class="btn btn-outline-secondary btn-sm"
                                                    data-toggle="tooltip"
                                                    data-placement="top"
                                            title="Delete" href="/admin/delMien/{{$mien->id_mien}}"
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
