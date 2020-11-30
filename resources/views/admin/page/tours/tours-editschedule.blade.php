@extends('admin/layouts/layout')
@section('Page-Title')
<div class="col-md-12">
    <h4 class="page-title mb-1">Thêm Lịch trình Tours</h4>
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item">
            <a href="/admin/dashboard">Trang chủ</a>
        </li>
        <li class="breadcrumb-item active">Thêm Lịch trình Tours</li>
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
                        <h4 class="header-title">Thêm lịch trình</h4>
                        <form action="/admin/editschedule" method="post">
                        @csrf
                            <div class="form-group">
                                <label>Nội dung lịch trình</label>
                                <textarea
                                    id="elm1"
                                    name="content"
                                    placeholder="Nhập mô tả"
                                >{{$showSchedule->content}}</textarea>
                            </div>
                            <input type="hidden" name="id_schedule" value="{{$showSchedule->id_schedule}}">
                            <div class="form-group mb-0">
                                <div>
                                    <button
                                        type="submit"
                                        class="btn waves-effect waves-light mr-1 white-cl bg-main-cl"
                                    >
                                        Thêm
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div>
    <!-- end container-fluid -->
</div>
@endsection
