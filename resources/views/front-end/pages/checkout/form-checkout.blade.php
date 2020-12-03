@extends('front-end/layout/layout')
@section('title', 'Thanh Toán')
@section('wrapper')
<div class="wrapper-checkout">
      <section class="hero-banner">
        <div class="container">
          <h2>Đặt Tour</h2>
        </div>
      </section>
      <section class="checkout__detail">
        <div class="container">
          <div class="step-check">
            <ul>
              <li class="active">
                <h2>Điền thông tin <i class="fas fa-info-circle"></i></h2>
              </li>
              <li>
                <h2>Hành khách <i class="fas fa-address-card"></i></h2>
              </li>
              <li>
                <h2>Thanh toán <i class="fab fa-amazon-pay"></i></h2>
              </li>
              <li>
                <h2>Xác nhận <i class="fas fa-check-circle"></i></h2>
              </li>
            </ul>
          </div>
          <div class="form__client">
            <div class="row">
              <div class="col-lg-8">
                <h3>Thông tin liên hệ</h3>
                <form action="{{url('/thanh-toan-2')}}" method="post">
                    @csrf
                  <div class="form__items">
                    <label for="name">Họ và tên</label>
                    <input
                      class="reset-apperance"
                      placeholder="Nhập họ và tên"
                      type="text"
                  value="{{session('account')->name}}"
                      disabled
                    />
                  </div>
                  <div class="form__items">
                    <label for="name">Email</label>
                    <input
                      class="reset-apperance"
                      placeholder="Nhập email"
                      type="email"
                      disabled
                      value="{{session('account')->email}}"
                    />
                  </div>
                  <div class="form__items">
                    <label for="name">Số điện thoại</label>
                    <input
                      class="reset-apperance"
                      placeholder="Nhập số điện thoại"
                      type="text"
                      value="{{session('account')->phone}}"
                      disabled
                    />
                  </div>
                  <div class="form__items">
                    <label for="name">Địa chỉ</label>
                    <input class="reset-apperance" type="text" value="{{session('account')->address}}" disabled/>
                  </div>
                  <div class="form__items form__items-full">
                    <label for="name">Ghi chú</label>
                    <textarea
                      class="reset-apperance"
                      name="note"
                      id="ghichu"
                      cols="30"
                      rows="10"
                    ></textarea>
                  </div>
                <input type="hidden" name="id_tour" value="{{$showT->id_tour}}">
                <input type="hidden" name="id_doitac" value="{{session('account')->id_doitac}}">
                <input type="hidden" name="quantity_adults" value="{{$qty['qty_adult']}}">
                <input type="hidden" name="quantity_children" value="{{$qty['qty_child']}}">
                <input type="hidden" name="total_price" value="{{$showT->price*$qty['qty_adult']+$showT->price_children*$qty['qty_child']}}">
                <div id="show_coupon">
                </div>
                <div class="form__items form__items-full add-coupon">
                    <h3 class="magiamgia">
                      Mã Giảm giá <small>(nếu có)</small>
                    </h3>
                  </div>
                  <div class="form__items" style="margin-bottom: 0">
                    <input type="text" name="code_coupon" id="code_coupon"/>
                  </div>
                  <div class="form__items" style="margin-bottom: 0">
                    <a class="check-cp" href="#" id="checkcoupon" >Áp dụng</a>
                  </div>
                  <div style="width:100%">
                    <p style="padding:10px" id="show_erro_cp"></p>
                  </div>
                  <div class="form__items">
                  <a class="goback" href="/tours/dt/{{$showT->id_tour}}">Trở về</a>
                  </div>
                  <div class="form__items">
                    <button class="reset-apperance" type="submit">
                      Tiếp tục
                    </button>
                  </div>
                </form>
              </div>
              <div class="col-lg-4">
                <div class="support-kh">Hotline - 1900 200 777</div>
                <div class="book-details">
                  <img
                    class="w-100"
                    src="{{asset('BackEnd/assets/images/tours')}}/{{$showT->url_img_tour}}"
                    alt="tour"
                  />
                  <div class="book-details__info">
                  <h4>{{$showT->name_tour}}</h4>
                    <ul>
                      <li>
                        <i class="fa fa-barcode" aria-hidden="true"></i>
                        Mã: <span>STN{{$showT->id_tour}}</span>
                      </li>
                      <li>
                        <i class="far fa-calendar" aria-hidden="true"></i>
                        Ngày đi: <span>{{date('d-m-Y',strtotime($showT->date_start))}}</span>
                      </li>
                      <li>
                        <i class="far fa-calendar" aria-hidden="true"></i>
                        Ngày về: <span>{{date('d-m-Y',strtotime($showT->date_end))}}</span>
                      </li>
                      <li>
                        <i class="far fa-clock" aria-hidden="true"></i>
                        Thời gian xuất phát: <span>{{$showT->time}}</span>
                      </li>
                      <li>
                        <i class="fas fa-user-friends" aria-hidden="true"></i>
                      Tổng thành viên: <span>{{$qty['qty_adult']+$qty['qty_child']}}</span>
                      </li>
                      <li>
                        <i class="fas fa-user" aria-hidden="true"></i>
                        Người lớn: <span>{{number_format($showT->price*$qty['qty_adult'],0,'','.')}} đ</span>
                      <span class="adult">X {{$qty['qty_adult']}}</span>
                      </li>
                      <li>
                        <i class="fas fa-baby" aria-hidden="true"></i>
                        Trẻ em: <span>{{number_format($showT->price_children*$qty['qty_child'],0,'','.')}} đ</span>
                        <span class="adult">X {{$qty['qty_child']}}</span>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
@endsection
