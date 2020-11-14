@extends('admin/layouts/layout')
@section('Page-Title')
<div class="col-md-12">
    <h4 class="page-title mb-1">Tỉnh thành</h4>
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item">
            <a href="/admin/dashboard">Trang chủ</a>
        </li>
        <li class="breadcrumb-item active">Tỉnh thành</li>
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
                        <h4 class="header-title">Bảng tỉnh thành</h4>
                        <p class="card-title-desc">
                            Danh sách các tỉnh thành trong hệ thống.
                        </p>
                        <div class="table-responsive" style="border: 0">
                            <table
                                class="table table-centered table-hover mb-0 datatable"
                            >
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Tên tỉnh thành</th>
                                        <th scope="col">Thuộc miền</th>
                                        <th scope="col">Hành vi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($showTinh as $tinh)
                                    <tr>
                                        <th scope="row">
                                            <a href="#"># {{$tinh->id_tinh}}</a>
                                        </th>
                                        <td>{{$tinh->name_tinh}}</td>
                                        <td>{{$mien->name_mien}}</td>
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
                                                    href="/admin/formedittinh/{{$tinh->id_tinh}}"
                                                    type="button"
                                                    class="btn btn-outline-secondary btn-sm"
                                                    data-toggle="tooltip"
                                                    data-placement="top"
                                                    title="Edit"
                                                >
                                                    <i class="mdi mdi-pencil"></i>
                                                </a>
                                                <a
                                                    href="/admin/delTinh/{{$tinh->id_tinh}}"
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
