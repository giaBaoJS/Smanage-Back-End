@extends('admin/layouts/layout')
@section('Page-Title')
<div class="col-md-12">
    <h4 class="page-title mb-1">Hóa đơn</h4>
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item">
            <a href="/admin/dashboard">Trang chủ</a>
        </li>
        <li class="breadcrumb-item active">Hóa đơn</li>
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
                        <h4 class="header-title">Bảng hóa đơn</h4>
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
                                        <th scope="col">Tên</th>
                                        <th scope="col">Số lượng trẻ em</th>
                                        <th scope="col">Số lượng người lớn</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Số điện thoại</th>
                                        <th scope="col">Địa chỉ</th>
                                        <th scope="col">Phương thức thanh toán</th>
                                        <th scope="col">Hành vi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($showBillDT as $b)
                                    @php
                                        $i=1;
                                    @endphp
                                    <tr>
                                        <th scope="row">
                                            <a href="#"># {{$i++}}</a>
                                        </th>
                                        <td>{{$b->name}}</td>
                                        <td>{{$b->quantity_childen}}</td>
                                        <td>{{$b->quantity_adults}}</td>
                                        <td>{{$b->email}}</td>
                                        <td>{{$b->phone}}</td>
                                        <td>{{$b->address}}</td>
                                        <td>{{$b->name_payment}}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <button
                                                    type="button"
                                                    class="btn btn-outline-secondary btn-sm"
                                                    data-toggle="modal"
                                                    data-target=".bs-example-modal-xl"
                                                    data-placement="top"
                                                    title="View"
                                                    onclick="showBillDetails({{$b->id_bill}})"
                                                >
                                                    <i class="mdi mdi-eye"></i>
                                                </button>
                                                <button
                                                    type="button"
                                                    class="btn btn-outline-secondary btn-sm"
                                                    data-toggle="tooltip"
                                                    data-placement="top"
                                                    onclick="delBill({{$b->id_bill}})"
                                                    title="Delete"
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
        <div class="modal fade bs-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title mt-0" id="myExtraLargeModalLabel">Xem hóa đơn chi tiết</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="boxModel">

                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>
    </div>
    <!-- end container-fluid -->
</div>
@endsection
