@extends('admin/layouts/layout')
@section('Page-Title')
<div class="col-md-12">
    <h4 class="page-title mb-1">Coupon</h4>
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item">
            <a href="/admin/dashboard">Trang chủ</a>
        </li>
        <li class="breadcrumb-item active">Coupon</li>
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
                        <h4 class="header-title">Bảng mã khuyến mãi</h4>
                        <p class="card-title-desc">
                            Danh sách các mã khuyến mãi cho người dùng.
                        </p>
                        <div class="table-responsive" style="border: 0">
                            @if (session('account')->role==1)
                            <table
                            class="table table-centered table-hover mb-0 datatable"
                        >
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nhà cung cấp</th>
                                    <th scope="col">Mã Coupon</th>
                                    <th scope="col">Ngày bắt đầu</th>
                                    <th scope="col">Giá trị</th>
                                    <th scope="col">Số lượng</th>
                                    <th scope="col">Trạng thái</th>
                                    <th scope="col">Action</th>
                                    <th scope="col">Hành vi</th>
                                </tr>
                            </thead>
                            <tbody id="trCoupon">
                                @php
                                    $i=1;
                                @endphp
                                @foreach ($showCouponDoiTac as $t)
                                <tr>
                                    <th scope="row">
                                    <a href="#"># {{$i++}}</a>
                                    </th>
                                    <td>{{$t->name}}</td>
                                    <td>{{$t->code_coupon}}</td>
                                    <td>{{$t->date_start}}</td>
                                    <td>{{$t->price}}%</td>
                                    <td>{{$t->quantity}}</td>
                                    <td>
                                        @if ($t->status==0)
                                        <div class="badge badge-soft-danger">
                                            Chưa kích hoạt
                                        </div>
                                        @else
                                        <div class="badge badge-soft-success">
                                            Đang hoạt động
                                        </div>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($t->status==1)
                                        <a href="/admin/delcoupon/{{$t->id_coupon}}" class="btn btn-danger btn-sm waves-effect waves-light" style="padding: 2px">
                                            Hủy
                                        </a>
                                        @else
                                    <a href="/admin/activecoupon/{{$t->id_coupon}}" class="btn btn-success btn-sm waves-effect waves-light" style="padding: 2px">
                                            Kích hoạt
                                        </a>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <button
                                            onclick="oneCoupon({{$t->id_coupon}})"
                                                type="button"
                                                class="btn btn-outline-secondary btn-sm"
                                                data-toggle="modal"
                                                data-target=".bs-example-modal-sm"
                                                data-placement="top"
                                                title="View"
                                            >
                                            <i class="mdi mdi-eye"></i>
                                            </button>
                                            <a
                                        href="/admin/formeditcoupon/{{$t->id_coupon}}"
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
                                            onclick="deleteCoupon({{$t->id_coupon}})"
                                            title="Delete"
                                            onclick=""
                                        >
                                            <i class="mdi mdi-trash-can"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            {{-- modal----------------------------------------> --}}

                            <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title mt-0" id="myExtraLargeModalLabel">Xem coupon chi tiết</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body" id="boxModel">

                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div>

                            {{-- modal----------------------------------------> --}}
                        </table>
                            @else
                            <table
                            class="table table-centered table-hover mb-0 datatable"
                        >
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nhà cung cấp</th>
                                    <th scope="col">Mã Coupon</th>
                                    <th scope="col">Ngày bắt đầu</th>
                                    <th scope="col">Ngày kết thúc</th>
                                    <th scope="col">Giá trị</th>
                                    <th scope="col">Số lượng</th>
                                    <th scope="col">Trạng thái</th>
                                    <th scope="col">Hành vi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i=1;
                            @endphp
                                @foreach ($showCoupon as $t)
                                <tr>
                                    <th scope="row">
                                    <a href="#"># {{$i++}}</a>
                                    </th>
                                    <td>{{$t->name}}</td>
                                    <td>{{$t->code_coupon}}</td>
                                    <td>{{$t->date_start}}</td>
                                    <td>{{$t->date_end}}</td>
                                    <td>{{$t->price}}%</td>
                                    <td>{{$t->quantity}}</td>
                                    <td>
                                        @if ($t->status==0)
                                        <div class="badge badge-soft-danger">
                                            Chưa kích hoạt
                                        </div>
                                        @else
                                        <div class="badge badge-soft-success">
                                            Đang hoạt động
                                        </div>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <button
                                            onclick="oneCoupon({{$t->id_coupon}})"
                                                type="button"
                                                class="btn btn-outline-secondary btn-sm"
                                                data-toggle="modal"
                                                data-target=".bs-example-modal-sm"
                                                data-placement="top"
                                                title="View"
                                            >
                                            <i class="mdi mdi-eye"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            {{-- modal----------------------------------------> --}}

                            <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title mt-0" id="myExtraLargeModalLabel">Xem coupon chi tiết</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body" id="boxModel">

                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div>

                            {{-- modal----------------------------------------> --}}
                        </table>
                            @endif

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



