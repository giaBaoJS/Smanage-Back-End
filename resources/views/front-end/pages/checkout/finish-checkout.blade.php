@extends('front-end/layout/layout')
@section('title', 'Hoàn Thành Thanh Toán')
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
              <li class="active">
                <h2>Thanh toán <i class="fab fa-amazon-pay"></i></h2>
              </li>
              <li class="active">
                <h2>Xác nhận <i class="fas fa-check-circle"></i></h2>
              </li>
            </ul>
          </div>
          <div class="form__client">
            <div class="hoanthanh">
              <h2>Đặt Tour thành công</h2>
              <img src="{{asset('FrontEnd/assets/images/defaults')}}/logo-2.png" alt="logo">
              <h4>
                Golden Tours xin cảm ơn quý khách đã đặt tour tại chúng tôi, mọi
                thông tin chi tiết liên hệ qua số điện thoại: 0924010212.
              </h4>
              <p>
                Quý khách sẽ trở lại trang chủ trong <span>30</span> giây hoặc
                nhấp vào <a href="{{url('/')}}">đây</a>
              </p>
            </div>
          </div>
        </div>
      </section>
    </div>
    @endsection