@extends('admin/layouts/layout')
@section('Page-Title')
<div class="col-md-12">
    <h4 class="page-title mb-1">Thêm Tỉnh Thành</h4>
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item">
            <a href="/admin/dashboard">Trang chủ</a>
        </li>
        <li class="breadcrumb-item active">Thêm Tỉnh Thành</li>
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
                        <h4 class="header-title">Thêm tỉnh thành</h4>
                        <p class="card-title-desc">Thêm tỉnh thành</p>

                        <form class="custom-validation" action="/admin/addTinh" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Tên tình thành</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="tentinh"
                                    placeholder="Sài gòn"
                                    required
                                />
                            </div>
                            <div class="form-group">
                                <label>Miền</label>
                                <select class="custom-select" name="id_mien" required>
                                    <option value="">Chọn miền</option>
                                    @foreach($mien as $m)
                                    <option value="{{ $m->id_mien}}" >{{$m->name_mien}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-0">
                                <div>
                                    <button
                                        type="submit"
                                        class="btn waves-effect waves-light mr-1 white-cl bg-main-cl"
                                    >
                                        Thêm
                                    </button>
                                    <a
                                        href="/admin/tinhthanh"
                                        class="btn btn-secondary waves-effect"
                                    >
                                        Hủy
                                    </a>
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
