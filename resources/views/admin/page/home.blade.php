@extends('admin/layouts/layout')
@section('Page-Title')
<div class="col-md-12">
    <!-- Tên trang -->
    <h4 class="page-title mb-1">Trang chủ</h4>
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item active">
            Chào mừng bạn đến với Golden Tours
        </li>
    </ol>
</div>
@endsection
@section('content')

@if (session('account')->role==1)
<input type="hidden" name="role" id="role" value="{{session('account')->role}}">
<div class="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <!-- Content bên trái -->
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-header bg-transparent p-3">
                        <h5 class="header-title mb-0">
                            Thông tin kinh doanh
                        </h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="media my-2">
                                <div class="media-body">
                                    <p class="text-muted mb-2">Doanh thu hôm nay</p>
                                    <h5 class="mb-0">{{number_format($totalDay,0,'','.')}} VNĐ</h5>
                                </div>
                                <div class="icons-lg ml-2 align-self-center">
                                    <i class="uim uim-layer-group"></i>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="media my-2">
                                <div class="media-body">
                                    <p class="text-muted mb-2">Doanh thu trung bình ( tháng / năm )</p>
                                    <h5 class="mb-0">{{number_format($totalPrice/12,0,'','.')}} VNĐ</h5>
                                </div>
                                <div class="icons-lg ml-2 align-self-center">
                                    <i class="uim uim-analytics"></i>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="media my-2">
                                <div class="media-body">
                                    <p class="text-muted mb-2">Tổng doanh thu</p>
                                    <h5 class="mb-0">{{number_format($totalPrice,0,'','.')}} VNĐ</h5>
                                </div>
                                <div class="icons-lg ml-2 align-self-center">
                                    <i class="uim uim-ruler"></i>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="media my-2">
                                <div class="media-body">
                                    <p class="text-muted mb-2">Tours đã bán</p>
                                    <h5 class="mb-0">{{$totalBill}}</h5>
                                </div>
                                <div class="icons-lg ml-2 align-self-center">
                                    <i class="uim uim-box"></i>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <h5 class="header-title mb-4 text-justify">
                                    Thống kê doanh thu theo năm
                                </h5>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                {{-- <form class="form-inline float-right">
                                    <div class="input-group mb-3">
                                        <input
                                            type="text"
                                            class="form-control form-control-sm datepicker-here"
                                            data-range="true"
                                            data-multiple-dates-separator=" - "
                                            data-language="vi"
                                            placeholder="Chọn ngày"
                                        />
                                        <div class="input-group-append">
                                            <span class="input-group-text"
                                                ><i class="far fa-calendar font-size-12"></i
                                            ></span>
                                        </div>
                                    </div>
                                </form> --}}
                            </div>
                        </div>
                        <div id="yearly-sale-chart" class="apex-charts"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <!-- <div class="float-right ml-2">
                            <a href="#">Xem tất cả</a>
                        </div> -->
                        <h5 class="header-title mb-4">Các giao dịch</h5>
                        <div class="table-responsive" style="border: none">
                            <table class="table table-centered table-hover mb-0 datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">Mã giao dịch</th>
                                        <th scope="col">Tên người mua</th>
                                        <th scope="col">Ngày</th>
                                        <th scope="col">Trạng thái</th>
                                        <th scope="col">Số tiền</th>
                                        <th scope="col">Hành vi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($showBill as $b)
                                    <tr>
                                        <th scope="row">
                                            <a href="#">#{{$b->id_bill}}</a>
                                        </th>
                                        <td>{{$b->name}}</td>
                                        <td>{{date('d/m/Y',strtotime($b->created_at))}}</td>
                                        <td>
                                            @if ($b->status==0)
                                            <div class="badge badge-soft-danger">
                                                Chưa thanh toán
                                            </div>
                                            @else
                                            <div class="badge badge-soft-primary">
                                                Đã thanh toán
                                            </div>
                                            @endif
                                        </td>
                                        <td>{{number_format($b->total_price,0,'','.')}} VNĐ</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <button type="button" class="btn btn-outline-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="View">
                                                    <i class="mdi mdi-eye"></i>
                                                </button>
                                                <button type="button" class="btn btn-outline-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Edit">
                                                    <i class="mdi mdi-pencil"></i>
                                                </button>
                                                <button type="button" class="btn btn-outline-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Delete">
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
@else
<input type="hidden" name="role" id="role" value="{{session('account')->role}}">
<div class="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <!-- Content bên trái -->
            <div class="col-xl-4">

            </div>
        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <!-- <div class="float-right ml-2">
                            <a href="#">Xem tất cả</a>
                        </div> -->
                        <h4>Chào mừng bạn đến với trang quản trị Admin</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Content bên trái -->
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-header bg-transparent p-3">
                        <h5 class="header-title mb-0">
                            Thông tin kinh doanh
                        </h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="media my-2">
                                <div class="media-body">
                                    <p class="text-muted mb-2">Doanh thu hôm nay</p>
                                    <h5 class="mb-0">{{number_format(($totalbill*10)/100 ,0,'','.')}} VNĐ</h5>
                                </div>
                                <div class="icons-lg ml-2 align-self-center">
                                    <i class="uim uim-layer-group"></i>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="media my-2">
                                <div class="media-body">
                                    <p class="text-muted mb-2">Doanh thu trung bình ( tháng / năm )</p>
                                    <h5 class="mb-0">{{number_format((($totalbilladmin*10)/100)/12 ,0,'','.')}} VNĐ</h5>
                                </div>
                                <div class="icons-lg ml-2 align-self-center">
                                    <i class="uim uim-analytics"></i>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="media my-2">
                                <div class="media-body">
                                    <p class="text-muted mb-2">Tổng doanh thu</p>
                                    <h5 class="mb-0">{{number_format(($totalbilladmin*10)/100 ,0,'','.')}} VNĐ</h5>
                                </div>
                                <div class="icons-lg ml-2 align-self-center">
                                    <i class="uim uim-ruler"></i>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="media my-2">
                                <div class="media-body">
                                    <p class="text-muted mb-2">Tổng đối tác</p>
                                    <h5 class="mb-0">{{$countdoitac}}</h5>
                                </div>
                                <div class="icons-lg ml-2 align-self-center">
                                    <i class="uim uim-box"></i>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <h5 class="header-title mb-4 text-justify">
                                    Thống kê doanh thu của một năm
                                </h5>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                {{-- <form class="form-inline float-right">
                                    <div class="input-group mb-3">
                                        <input
                                            type="text"
                                            class="form-control form-control-sm datepicker-here"
                                            data-range="true"
                                            data-multiple-dates-separator=" - "
                                            data-language="vi"
                                            placeholder="Chọn ngày"
                                        />
                                        <div class="input-group-append">
                                            <span class="input-group-text"
                                                ><i class="far fa-calendar font-size-12"></i
                                            ></span>
                                        </div>
                                    </div>
                                </form> --}}
                            </div>
                        </div>
                        <div id="yearly-sale-chart" class="apex-charts"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <!-- <div class="float-right ml-2">
                            <a href="#">Xem tất cả</a>
                        </div> -->
                        <h5 class="header-title mb-4">Các giao dịch</h5>
                        <div class="table-responsive" style="border: none">
                            <table class="table table-centered table-hover mb-0 datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">Mã giao dịch</th>
                                        <th scope="col">Tên tours</th>
                                        <th scope="col">Đối tác</th>
                                        <th scope="col">Tên người mua</th>
                                        <th scope="col">Ngày</th>
                                        <th scope="col">Số tiền</th>
                                        <!-- <th scope="col">Hành vi</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($billalluser as $a)
                                    <tr>
                                        <th scope="row">
                                            <a href="#">#{{$a->id_bill}}</a>
                                        </th>
                                        <td>{{$a->name_tour}}</td>
                                        <td>
                                            <?php
                                            $nameDT = DB::table('doitac')->where('id_doitac', '=', $a->id_doitac)->first();
                                            echo $nameDT->name;
                                            ?>
                                        </td>
                                        <td> {{$a->name}}</td>
                                        <td>
                                            <!-- @if ($a->status==0)
                                            <div class="badge badge-soft-danger">
                                                Chưa thanh toán
                                            </div>
                                            @else
                                            <div class="badge badge-soft-primary">
                                                Đã thanh toán
                                            </div>
                                            @endif -->
                                            {{date('d/m/Y',strtotime($a->created_at))}}

                                        </td>
                                        <td>{{number_format($a->total_price,0,'','.')}} VNĐ</td>
                                        <td>
                                            <!-- <div class="btn-group" role="group">
                                                <button type="button" class="btn btn-outline-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="View">
                                                    <i class="mdi mdi-eye"></i>
                                                </button>
                                                <button type="button" class="btn btn-outline-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Edit">
                                                    <i class="mdi mdi-pencil"></i>
                                                </button>
                                                <button type="button" class="btn btn-outline-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Delete">
                                                    <i class="mdi mdi-trash-can"></i>
                                                </button>
                                            </div> -->
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
@endif


@endsection