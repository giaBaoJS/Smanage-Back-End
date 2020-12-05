@extends('admin/layouts/layout')
@section('Page-Title')
<div class="col-md-12">
    <h4 class="page-title mb-1">Chỉnh sửa Tours</h4>
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item">
            <a href="/admin/dashboard">Trang chủ</a>
        </li>
        <li class="breadcrumb-item active">Chỉnh sửa Tours</li>
    </ol>
</div>
@endsection
@section('content')
@if (session('account')->role==1)
<div class="add-form-tours">
    <form action="/admin/updatetour" method="post" enctype='multipart/form-data'>
        @csrf
    <div class="tab1">
        <h3 class="title-cm">Chỉnh sửa Tours</h3>
           <div class="row">
                <div class="form-group col-md-6">
                    <label for="name">Tên Tours</label>
                    <input type="text" class="form-control" name="name_tour" value="{{$showTour->name_tour}}" placeholder="Nhập tên tour" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="name">Mô tả</label>
                    <input type="text" class="form-control" name="short_content" value="{{$showTour->short_content}}" placeholder="Nhập mô tả" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="name">Miền</label>
                    <select class="form-control" id="checkMien" name="id_mien" value='' required>
                        @foreach ($showMien as $m)
                            @if ($m->id_mien==$showTour->id_mien)
                                {{$stt="selected"}}
                            @else
                                {{$stt=""}}
                            @endif
                    <option value="{{$m->id_mien}}" {{$stt}}>{{$m->name_mien}}</option>
                        @endforeach

                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="name">Tỉnh</label>
                    <select class="form-control" id="checkTinh" name="id_tinh" value='' required>
                        @foreach ($showTinh as $t)
                        @if ($t->id_tinh==$showTour->id_tinh)
                        {{$stt2="selected"}}
                    @else
                        {{$stt2=""}}
                    @endif
                        <option value="{{$t->id_tinh}}" {{$stt2}}>{{$t->name_tinh}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="name">Giờ đi</label>
                    <input type="text" class="form-control" name="time" value="{{$showTour->time}}" placeholder="Giờ đi" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="name">Ngày đi</label>
                    <input type="date" class="form-control" name="date_start" value="{{$showTour->date_start}}" placeholder="Nhập Ngày đi" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="name">Ngày về</label>
                    <input type="date" class="form-control" name="date_end" value="{{$showTour->date_end}}" placeholder="Nhập Ngày về" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="name">Phương tiện</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="vehicle" value='' required>
                       @if ($showTour->vehicle==1)
                       <option value="1" selected>Máy bay</option>
                       <option value="2">Xe Khách</option>
                       @else
                       <option value="1">Máy bay</option>
                       <option value="2" selected>Xe Khách</option>
                       @endif

                    </select>
                </div>
                <input type="hidden" name="id_tour" value="{{$showTour->id_tour}}">
                <div class="form-group col-md-6">
                    <label for="name">Giá mặc định</label>
                    <input type="text" class="form-control" name="price" value="{{$showTour->price}}" placeholder="Nhập giá" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="name">Giá trẻ em</label>
                    <input type="text" class="form-control" name="price_children" value="{{$showTour->price_children}}" placeholder="Nhập giá" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="name">Giảm giá coupon </label>
                    <select class="form-control" id="exampleFormControlSelect1" name="discount" required>
                        <option value="0">Không có mã giảm giá</option>
                        @foreach ($showCoupon as $c)
                        <?php
                        if ($showTour->discount==$c->id_coupon) {
                           $selec="selected";
                        }else {
                            $selec="";
                        }
                        ?>
                    <option value="{{$c->id_coupon}}" {{$selec}}>{{$c->code_coupon}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="name">Số lượng người</label>
                    <input type="number" class="form-control" name="quantity_limit" value="{{$showTour->quantity_limit}}" placeholder="Nhập tối đa số người tham gia" required>
                </div>
                <div class="form-group col-md-6">
                    <img width="100px" src="{{asset('BackEnd/assets/images/tours')}}/{{$showTour->url_img_tour}}" alt="">
                </div>
                <div class="form-group col-md-6">
                    @php
                        $hinhphu=explode(",",$showTour->url_gallery_tours);
                    @endphp
                    @foreach ($hinhphu as $item)
                    @php
                         $item=ltrim($item,'"');
                         $item=rtrim($item,'"');
                    @endphp
                      <img width="100px" src="{{asset('BackEnd/assets/images/tours')}}/{{$item}}" alt="">
                    @endforeach
                </div>
                <div class="form-group col-md-6">
                    <label>Ảnh đại diện cho tour</label>
                        <div class="custom-file">
                            <input
                            type="file"
                            class="custom-file-input"
                            name="url_img_tour"
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
                            />
                            <label class="custom-file-label"
                            >Chọn ảnh đại diện...</label >
                        </div>
                </div>
                <div class="group-my-btn col-md-6">
                    <button class="mybtn" type="submit">Cập nhật tour</button>
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
