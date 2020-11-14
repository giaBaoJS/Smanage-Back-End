@extends('admin/layouts/layout')
@section('Page-Title')
<div class="col-md-12">
    <h4 class="page-title mb-1">Chỉnh sửa Coupon</h4>
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item">
            <a href="/admin/dashboard">Trang chủ</a>
        </li>
        <li class="breadcrumb-item active">Chỉnh sửa Coupon</li>
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
                        <h4 class="header-title">Chỉnh sửa {{$tinh->name_tinh}}</h4>
                    <form class="custom-validation" action="/admin/editTinh/{{$tinh->id_tinh}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>ID</label>
                                <input
                                    type="text" disabled="disabled"
                                    class="form-control"
                                    placeholder="Mã tỉnh"
                                    name="id_tinh"
                                    value="{{$tinh->id_tinh}}"
                                    required

                                />
                            </div>

                            <div class="form-group">
                                <label>Tên tỉnh</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    placeholder="Tên tỉnh"
                                    name="tentinh"
                                    value="{{$tinh->name_tinh}}"
                                    required
                                />
                            </div>
                            <div class="form-group">
                                <label>Thuộc Miền</label>
                                <select class="custom-select" name="id_mien" required>

                                    @foreach($mien as $m)
                                        @if($m->id_mien == $tinh->id_mien){
                                            <option value="{{ $m->id_mien}}" selected>{{$m->name_mien}}</option>
                                        }
                                        @else
                                        <option value="{{ $m->id_mien}}">{{$m->name_mien}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-0">
                                <div>
                                    <button type="submit"
                                        class="btn waves-effect waves-light mr-1 white-cl bg-main-cl"
                                    >
                                        Cập nhật
                                    </button>
                                    <a
                                        href="/admin/mien"
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
