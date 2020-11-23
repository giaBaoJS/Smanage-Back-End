@extends('admin/layouts/layout')
@section('Page-Title')
<div class="col-md-12">
    <h4 class="page-title mb-1">Người Dùng</h4>
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item">
            <a href="/admin/dashboard">Trang chủ</a>
        </li>
        <li class="breadcrumb-item active">Người Dùng</li>
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
                        <h4 class="header-title">Bảng người dùng</h4>
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
                                        <th scope="col">Email</th>
                                        <th scope="col">Số điện thoại</th>
                                        <th scope="col">Địa chỉ</th>
                                        <th scope="col">Chức năng</th>
                                        <th scope="col">Tên Đối Tác</th>
                                        <th scope="col">Hoạt động</th>
                                        <th scope="col">Ngày kích hoạt</th>
                                        <th scope="col">Hành vi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($showUser as $t)
                                    <tr>
                                        <th scope="row">
                                        <a href="#">#{{$t->id_user}}</a>
                                        </th>
                                        <td>{{$t->name}}</td>
                                        <td>{{$t->email}}</td>
                                        <td>{{$t->phone}}</td>
                                        <td>{{$t->address}}</td>
                                        <td>
                                            <?php
                                                if ($t->role==2) {
                                                    echo 'admin';
                                                } elseif ($t->role==1) {
                                                    echo 'Đối tác';
                                                }else {
                                                    echo 'Người dùng';
                                                }
                                            ?>
                                        </td>
                                        <td>
                                          <?php
                                                if ($t->role==1) {
                                                    $showName=DB::table('doitac')->where('id_doitac','=',$t->id_doitac)->first();
                                                    echo $showName->name;
                                                }else {
                                                    echo '';
                                                }
                                          ?>
                                        </td>
                                        <td>
                                            @if ($t->active==2)
                                            <span class="badge badge-success">Đã kích hoạt</span>
                                            @endif
                                            @if ($t->active==1)
                                            <span class="badge badge-warning">Đang dùng thử</span>
                                            @endif
                                            @if ($t->active==0)
                                            <button class="badge badge-danger" style="border: none">Chưa kích hoạt</button>
                                            @endif

                                        </td>
                                        <td>{{date($t->created_at)}}</td>
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
                                                    type="button"
                                            href="/admin/formedituser/{{$t->id_user}}"
                                                    class="btn btn-outline-secondary btn-sm"
                                                    data-toggle="tooltip"
                                                    data-placement="top"
                                                    title="Edit"
                                                >
                                                    <i class="mdi mdi-pencil"></i>
                                                </a>
                                                <button
                                                onclick="deleteUser({{$t->id_user}},{{session('account')->id_user}},{{$t->role}})"
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
