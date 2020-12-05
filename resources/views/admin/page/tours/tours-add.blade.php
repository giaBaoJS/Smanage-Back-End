@extends('admin/layouts/layout')
@section('Page-Title')
<div class="col-md-12">
    <h4 class="page-title mb-1">Thêm Tours</h4>
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item">
            <a href="/admin/dashboard">Trang chủ</a>
        </li>
        <li class="breadcrumb-item active">Thêm Tours</li>
    </ol>
</div>
@endsection
@section('content')
@if (session('account')->role==1)
<div class="add-form-tours">
    <form action="/admin/addtour" id="formTour" method="post" enctype='multipart/form-data'>
        @csrf
    <div class="tab1">
        <h3 class="title-cm">Thông tin tours</h3>
           <div class="row">
                <div class="form-group col-md-6">
                    <label for="name">Tên Tours</label>
                    <input type="text" class="form-control" name="name_tour" placeholder="Nhập tên tour" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="name">Mô tả</label>
                    <input type="text" class="form-control" name="short_content" placeholder="Nhập mô tả" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="name">Miền</label>
                    <select class="form-control" id="checkMien" name="id_mien" value='' required>
                        @foreach ($showMien as $m)
                    <option value="{{$m->id_mien}}">{{$m->name_mien}}</option>
                        @endforeach

                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="name">Tỉnh</label>
                    <select class="form-control" id="checkTinh" name="id_tinh" value='' required>
                        @foreach ($showTinh as $t)
                        <option value="{{$t->id_tinh}}">{{$t->name_tinh}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="name">Giờ đi</label>
                    <input type="text" class="form-control" name="time" placeholder="Giờ đi" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="name">Ngày đi</label>
                    <input type="date" class="form-control" name="date_start" placeholder="Nhập Ngày đi" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="name">Ngày về</label>
                    <input type="date" class="form-control" name="date_end" placeholder="Nhập Ngày về" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="name">Phương tiện</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="vehicle" value='' required>
                        <option value="1">Máy bay</option>
                        <option value="2">Xe Khách</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="name">Giá mặc định</label>
                    <input type="text" class="form-control" name="price" placeholder="Nhập giá" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="name">Giá trẻ em</label>
                    <input type="text" class="form-control" name="price_children" placeholder="Nhập giá" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="name">Giảm giá coupon </label>
                    <select class="form-control" id="exampleFormControlSelect1" name="discount" required>
                        <option value="0">Không có mã giảm giá</option>
                        @foreach ($showCoupon as $c)
                    <option value="{{$c->id_coupon}}">{{$c->code_coupon}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="name">Số lượng người</label>
                    <input type="number" class="form-control" name="quantity_limit" placeholder="Nhập tối đa số người tham gia" required>
                </div>
                <div class="form-group col-md-6">
                    <label>Ảnh đại diện cho tour</label>
                        <div class="custom-file">
                            <input
                            type="file"
                            class="custom-file-input"
                            name="url_img_tour"
                            required
                            />
                            <label class="custom-file-label"
                            >Chọn ảnh đại diện...</label >
                        </div>
                </div>
                <div class="form-group col-md-6">
                    <label>Ảnh thư viện cho tour</label>
                        <div class="custom-file">
                            <input
                            type="file"
                            class="custom-file-input"
                            name="url_gallery_tours[]"
                            multiple
                            required
                            />
                            <label class="custom-file-label"
                            >Chọn ảnh đại diện...</label >
                        </div>
                </div>
                <div class="group-my-btn col-md-6">
                    <button class="mybtn" type="submit">Thêm</button>
                </div>
           </div>
    </div>
    </form>
</div>
@else
<div class="add-form-tours">
    <h4>Bạn không thể thêm tour</h4>
</div>
@endif
@endsection
