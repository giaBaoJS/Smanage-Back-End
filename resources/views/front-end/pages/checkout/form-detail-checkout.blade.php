@extends('front-end/layout/layout')
@section('title', 'Thông Tin Thanh Toán')
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
              <li class="active">
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

              <input type="hidden" value="{{$showBill->quantity_adults+$showBill->quantity_children}}" id="quantity" name="quantity">
                    <?php
                        for ($i=0; $i < ($showBill->quantity_adults+$showBill->quantity_children); $i++) {
                    ?>
                      <form action="{{url('/thanh-toan-3')}}" method="post">
                        @csrf
                     <div class="form__items-full">
                     <h3>Thông tin hành khách {{$i+1}}</h3>
                     <p id="errorValidate{{$i}}" style="color: red;text-align:center"></p>
                      </div>
                      <div class="form__items">
                        <label for="name">Họ và tên</label>
                        <input
                          class="reset-apperance"
                          placeholder="Nhập họ và tên"
                          type="text"
                      name="name_passenger"
                          id="name_passenger{{$i}}"
                        />
                      </div>
                      <div class="form__items">
                        <label for="name">Địa chỉ</label>
                        <input
                          class="reset-apperance"
                          placeholder="Nhập địa chỉ"
                          type="text"
                          name="address_passenger"
                          id="address_passenger{{$i}}"
                        />
                      </div>
                      <div class="form__items">
                        <label for="name">Số điện thoại</label>
                        <input
                          class="reset-apperance"
                          placeholder="Nhập số điện thoại"
                          type="text"
                          name="phone_passenger"
                          id="phone_passenger{{$i}}"
                        />
                      </div>
                      <div class="form__items">
                        <label for="name">Giới tính</label>
                        <select id="gender_passenger{{$i}}" name="gender_passenger">
                          <option value="1">Nam</option>
                          <option value="2">Nữ</option>
                        </select>
                      </div>
                      <div class="form__items">
                        <label for="name">Quốc gia</label>
                        <input class="reset-apperance" id="country_passenger{{$i}}" placeholder="Nhập tên quốc gia" type="text" name="country_passenger"/>
                      </div>
                      <div class="form__items">
                        <label for="name">Passport</label>
                        <input class="reset-apperance" id="passport_passenger{{$i}}" placeholder="Nhập passport" type="text" name="passport_passenger"/>
                      </div>
                    <?php
                        }
                    ?>


                  <div class="form__items">
                    {{-- <a class="goback" href="{{url('/thanh-toan-1')}}">Trở về</a> --}}
                    </div>
                    <div class="form__items">
                     <button class="reset-apperance" type="button" id="checkPass">
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
                        Tổng thành viên: <span>{{$showBill->quantity_adults+$showBill->quantity_children}}</span>
                        </li>
                        <li>
                          <i class="fas fa-user" aria-hidden="true"></i>
                          Người lớn: <span>{{number_format($showT->price*$showBill->quantity_adults,0,'','.')}} đ</span>
                        <span class="adult">X {{$showBill->quantity_adults}}</span>
                        </li>
                        <li>
                          <i class="fas fa-baby" aria-hidden="true"></i>
                          Trẻ em: <span>{{number_format($showT->price_children*$showBill->quantity_children,0,'','.')}} đ</span>
                          <span class="adult">X {{$showBill->quantity_children}}</span>
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
