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
<div class="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <!-- Content bên trái -->
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-header bg-transparent p-3">
                        <h5 class="header-title mb-0">
                            Thông tin kinh doanh hôm nay
                        </h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="media my-2">
                                <div class="media-body">
                                    <p class="text-muted mb-2">Doanh số</p>
                                    <h5 class="mb-0">1,625</h5>
                                </div>
                                <div class="icons-lg ml-2 align-self-center">
                                    <i class="uim uim-layer-group"></i>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="media my-2">
                                <div class="media-body">
                                    <p class="text-muted mb-2">Doanh thu trung bình</p>
                                    <h5 class="mb-0">$ 42,235</h5>
                                </div>
                                <div class="icons-lg ml-2 align-self-center">
                                    <i class="uim uim-analytics"></i>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="media my-2">
                                <div class="media-body">
                                    <p class="text-muted mb-2">Giá tiền trung bình</p>
                                    <h5 class="mb-0">$ 14.56</h5>
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
                                    <h5 class="mb-0">8,235</h5>
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
                                <form class="form-inline float-right">
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
                                </form>
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
                            <table
                                class="table table-centered table-hover mb-0 datatable"
                            >
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
                                    <tr>
                                        <th scope="row">
                                            <a href="#"># XO1345</a>
                                        </th>
                                        <td>Danny Johnson</td>
                                        <td>26 Jan</td>
                                        <td>
                                            <div class="badge badge-soft-primary">
                                                Confirm
                                            </div>
                                        </td>
                                        <td>$124</td>
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
                                    <tr>
                                        <th scope="row">
                                            <a href="#"># XO1346</a>
                                        </th>
                                        <td>Alvin Newton</td>
                                        <td>21 Jan</td>
                                        <td>
                                            <div class="badge badge-soft-warning">
                                                Pending
                                            </div>
                                        </td>
                                        <td>$112</td>
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
                                    <tr>
                                        <th scope="row">
                                            <a href="#"># XO1347</a>
                                        </th>
                                        <td>Bennie Perez</td>
                                        <td>15 Jan</td>
                                        <td>
                                            <div class="badge badge-soft-primary">
                                                Confirm
                                            </div>
                                        </td>
                                        <td>$106</td>
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
                                    <tr>
                                        <th scope="row">
                                            <a href="#"># XO1348</a>
                                        </th>
                                        <td>Steven Kwon</td>
                                        <td>11 Jan</td>
                                        <td>
                                            <div class="badge badge-soft-primary">
                                                Confirm
                                            </div>
                                        </td>
                                        <td>$115</td>
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
                                    <tr>
                                        <th scope="row">
                                            <a href="#"># XO1349</a>
                                        </th>
                                        <td>Bryan Roark</td>
                                        <td>08 Jan</td>
                                        <td>
                                            <div class="badge badge-soft-danger">
                                                Cancel
                                            </div>
                                        </td>
                                        <td>$105</td>
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
                                    <tr>
                                        <th scope="row">
                                            <a href="#"># XO1345</a>
                                        </th>
                                        <td>Danny Johnson</td>
                                        <td>26 Jan</td>
                                        <td>
                                            <div class="badge badge-soft-primary">
                                                Confirm
                                            </div>
                                        </td>
                                        <td>$124</td>
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
                                    <tr>
                                        <th scope="row">
                                            <a href="#"># XO1346</a>
                                        </th>
                                        <td>Alvin Newton</td>
                                        <td>21 Jan</td>
                                        <td>
                                            <div class="badge badge-soft-warning">
                                                Pending
                                            </div>
                                        </td>
                                        <td>$112</td>
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
                                    <tr>
                                        <th scope="row">
                                            <a href="#"># XO1347</a>
                                        </th>
                                        <td>Bennie Perez</td>
                                        <td>15 Jan</td>
                                        <td>
                                            <div class="badge badge-soft-primary">
                                                Confirm
                                            </div>
                                        </td>
                                        <td>$106</td>
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
                                    <tr>
                                        <th scope="row">
                                            <a href="#"># XO1348</a>
                                        </th>
                                        <td>Steven Kwon</td>
                                        <td>11 Jan</td>
                                        <td>
                                            <div class="badge badge-soft-primary">
                                                Confirm
                                            </div>
                                        </td>
                                        <td>$115</td>
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
                                    <tr>
                                        <th scope="row">
                                            <a href="#"># XO1349</a>
                                        </th>
                                        <td>Bryan Roark</td>
                                        <td>08 Jan</td>
                                        <td>
                                            <div class="badge badge-soft-danger">
                                                Cancel
                                            </div>
                                        </td>
                                        <td>$105</td>
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
                                    <tr>
                                        <th scope="row">
                                            <a href="#"># XO1345</a>
                                        </th>
                                        <td>Danny Johnson</td>
                                        <td>26 Jan</td>
                                        <td>
                                            <div class="badge badge-soft-primary">
                                                Confirm
                                            </div>
                                        </td>
                                        <td>$124</td>
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
                                    <tr>
                                        <th scope="row">
                                            <a href="#"># XO1346</a>
                                        </th>
                                        <td>Alvin Newton</td>
                                        <td>21 Jan</td>
                                        <td>
                                            <div class="badge badge-soft-warning">
                                                Pending
                                            </div>
                                        </td>
                                        <td>$112</td>
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
                                    <tr>
                                        <th scope="row">
                                            <a href="#"># XO1347</a>
                                        </th>
                                        <td>Bennie Perez</td>
                                        <td>15 Jan</td>
                                        <td>
                                            <div class="badge badge-soft-primary">
                                                Confirm
                                            </div>
                                        </td>
                                        <td>$106</td>
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
                                    <tr>
                                        <th scope="row">
                                            <a href="#"># XO1348</a>
                                        </th>
                                        <td>Steven Kwon</td>
                                        <td>11 Jan</td>
                                        <td>
                                            <div class="badge badge-soft-primary">
                                                Confirm
                                            </div>
                                        </td>
                                        <td>$115</td>
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
                                    <tr>
                                        <th scope="row">
                                            <a href="#"># XO1349</a>
                                        </th>
                                        <td>Bryan Roark</td>
                                        <td>08 Jan</td>
                                        <td>
                                            <div class="badge badge-soft-danger">
                                                Cancel
                                            </div>
                                        </td>
                                        <td>$105</td>
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
                                    <tr>
                                        <th scope="row">
                                            <a href="#"># XO1345</a>
                                        </th>
                                        <td>Danny Johnson</td>
                                        <td>26 Jan</td>
                                        <td>
                                            <div class="badge badge-soft-primary">
                                                Confirm
                                            </div>
                                        </td>
                                        <td>$124</td>
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
                                    <tr>
                                        <th scope="row">
                                            <a href="#"># XO1346</a>
                                        </th>
                                        <td>Alvin Newton</td>
                                        <td>21 Jan</td>
                                        <td>
                                            <div class="badge badge-soft-warning">
                                                Pending
                                            </div>
                                        </td>
                                        <td>$112</td>
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
                                    <tr>
                                        <th scope="row">
                                            <a href="#"># XO1347</a>
                                        </th>
                                        <td>Bennie Perez</td>
                                        <td>15 Jan</td>
                                        <td>
                                            <div class="badge badge-soft-primary">
                                                Confirm
                                            </div>
                                        </td>
                                        <td>$106</td>
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
                                    <tr>
                                        <th scope="row">
                                            <a href="#"># XO1348</a>
                                        </th>
                                        <td>Steven Kwon</td>
                                        <td>11 Jan</td>
                                        <td>
                                            <div class="badge badge-soft-primary">
                                                Confirm
                                            </div>
                                        </td>
                                        <td>$115</td>
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
                                    <tr>
                                        <th scope="row">
                                            <a href="#"># XO1349</a>
                                        </th>
                                        <td>Bryan Roark</td>
                                        <td>08 Jan</td>
                                        <td>
                                            <div class="badge badge-soft-danger">
                                                Cancel
                                            </div>
                                        </td>
                                        <td>$105</td>
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
                                    <tr>
                                        <th scope="row">
                                            <a href="#"># XO1345</a>
                                        </th>
                                        <td>Danny Johnson</td>
                                        <td>26 Jan</td>
                                        <td>
                                            <div class="badge badge-soft-primary">
                                                Confirm
                                            </div>
                                        </td>
                                        <td>$124</td>
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
                                    <tr>
                                        <th scope="row">
                                            <a href="#"># XO1346</a>
                                        </th>
                                        <td>Alvin Newton</td>
                                        <td>21 Jan</td>
                                        <td>
                                            <div class="badge badge-soft-warning">
                                                Pending
                                            </div>
                                        </td>
                                        <td>$112</td>
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
                                    <tr>
                                        <th scope="row">
                                            <a href="#"># XO1347</a>
                                        </th>
                                        <td>Bennie Perez</td>
                                        <td>15 Jan</td>
                                        <td>
                                            <div class="badge badge-soft-primary">
                                                Confirm
                                            </div>
                                        </td>
                                        <td>$106</td>
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
                                    <tr>
                                        <th scope="row">
                                            <a href="#"># XO1348</a>
                                        </th>
                                        <td>Steven Kwon</td>
                                        <td>11 Jan</td>
                                        <td>
                                            <div class="badge badge-soft-primary">
                                                Confirm
                                            </div>
                                        </td>
                                        <td>$115</td>
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
                                    <tr>
                                        <th scope="row">
                                            <a href="#"># XO1349</a>
                                        </th>
                                        <td>Bryan Roark</td>
                                        <td>08 Jan</td>
                                        <td>
                                            <div class="badge badge-soft-danger">
                                                Cancel
                                            </div>
                                        </td>
                                        <td>$105</td>
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
                                    <tr>
                                        <th scope="row">
                                            <a href="#"># XO1345</a>
                                        </th>
                                        <td>Danny Johnson</td>
                                        <td>26 Jan</td>
                                        <td>
                                            <div class="badge badge-soft-primary">
                                                Confirm
                                            </div>
                                        </td>
                                        <td>$124</td>
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
                                    <tr>
                                        <th scope="row">
                                            <a href="#"># XO1346</a>
                                        </th>
                                        <td>Alvin Newton</td>
                                        <td>21 Jan</td>
                                        <td>
                                            <div class="badge badge-soft-warning">
                                                Pending
                                            </div>
                                        </td>
                                        <td>$112</td>
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
                                    <tr>
                                        <th scope="row">
                                            <a href="#"># XO1347</a>
                                        </th>
                                        <td>Bennie Perez</td>
                                        <td>15 Jan</td>
                                        <td>
                                            <div class="badge badge-soft-primary">
                                                Confirm
                                            </div>
                                        </td>
                                        <td>$106</td>
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
                                    <tr>
                                        <th scope="row">
                                            <a href="#"># XO1348</a>
                                        </th>
                                        <td>Steven Kwon</td>
                                        <td>11 Jan</td>
                                        <td>
                                            <div class="badge badge-soft-primary">
                                                Confirm
                                            </div>
                                        </td>
                                        <td>$115</td>
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
                                    <tr>
                                        <th scope="row">
                                            <a href="#"># XO1349</a>
                                        </th>
                                        <td>Bryan Roark</td>
                                        <td>08 Jan</td>
                                        <td>
                                            <div class="badge badge-soft-danger">
                                                Cancel
                                            </div>
                                        </td>
                                        <td>$105</td>
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

@else
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
        <!-- end row -->
    </div>
    <!-- end container-fluid -->
</div>
@endif


@endsection
