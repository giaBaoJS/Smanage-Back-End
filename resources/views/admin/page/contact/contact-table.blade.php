@extends('admin/layouts/layout')
@section('Page-Title')
    <div class="col-md-12">
        <h4 class="page-title mb-1">Liên hệ</h4>
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item">
                <a href="/admin/dashboard">Trang chủ</a>
            </li>
            <li class="breadcrumb-item active">Liên hệ</li>
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
                        <h4 class="header-title">Bảng liên hệ</h4>
                        <p class="card-title-desc">
                            Danh sách các liên hệ từ người dùng.
                        </p>
                        <div class="table-responsive" style="border: 0">
                            <table
                                class="table table-centered table-hover mb-0 datatable"
                            >
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Ngày</th>
                                        <th scope="col">Tên</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Số điện thoại</th>
                                        <th scope="col">Nội dung</th>
                                        <th scope="col">Trạng thái</th>
                                        <th scope="col">Hành vi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">
                                            <a href="#"># XO1345</a>
                                        </th>
                                        <td>20/02/2020</td>
                                        <td>Kim Bảo đẹp trai</td>
                                        <td>kimbao@yahoo.com</td>
                                        <td>0909123123</td>
                                        <td>Kim bảo đẹp trai</td>
                                        <td>
                                            <div class="badge badge-soft-primary">
                                                Đã xác nhận
                                            </div>
                                        </td>
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
                                                <button
                                                    type="button"
                                                    class="btn btn-outline-secondary btn-sm"
                                                    data-toggle="tooltip"
                                                    data-placement="top"
                                                    title="Edit"
                                                >
                                                    <i class="mdi mdi-pencil"></i>
                                                </button>
                                                <button
                                                    type="button"
                                                    class="btn btn-outline-secondary btn-sm"
                                                    data-toggle="tooltip"
                                                    data-placement="top"
                                                    title="Delete"
                                                >
                                                    <i class="mdi mdi-trash-can"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
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
