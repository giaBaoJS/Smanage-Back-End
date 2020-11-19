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
                <form action="#">
                  <div class="form__items">
                    <label for="name">Họ và tên</label>
                    <input
                      class="reset-apperance"
                      placeholder="Nhập họ và tên"
                      type="text"
                    />
                  </div>
                  <div class="form__items">
                    <label for="name">Email</label>
                    <input
                      class="reset-apperance"
                      placeholder="Nhập email"
                      type="email"
                    />
                  </div>
                  <div class="form__items">
                    <label for="name">Số điện thoại</label>
                    <input
                      class="reset-apperance"
                      placeholder="Nhập số điện thoại"
                      type="email"
                    />
                  </div>
                  <div class="form__items">
                    <label for="name">Thành phố</label>
                    <input class="reset-apperance" type="text" />
                  </div>
                  <div class="form__items form__items-full">
                    <label for="name">Ghi chú</label>
                    <textarea
                      class="reset-apperance"
                      name="ghichu"
                      id="ghichu"
                      cols="30"
                      rows="10"
                    ></textarea>
                  </div>
                  <div class="form__items form__items-full add-coupon">
                    <h3 class="magiamgia">
                      Mã Giảm giá <small>(nếu có)</small>
                    </h3>
                  </div>
                  <div class="form__items">
                    <input type="text " />
                  </div>
                  <div class="form__items">
                    <a class="check-cp" href="#">Áp dụng</a>
                  </div>
                  <div class="form__items">
                    <a class="goback" href="#">Trở về</a>
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
                    src="{{asset('FrontEnd/assets/images/defaults/tours')}}/mientrung.jpg"
                    alt="tour"
                  />
                  <div class="book-details__info">
                    <h4>Nha trang - Đà Lạt</h4>
                    <ul>
                      <li>
                        <i class="fa fa-barcode" aria-hidden="true"></i>
                        Mã: <span>STN084-2020-00330</span>
                      </li>
                      <li>
                        <i class="far fa-calendar" aria-hidden="true"></i>
                        Ngày đi: <span>11-11-2020</span>
                      </li>
                      <li>
                        <i class="far fa-calendar" aria-hidden="true"></i>
                        Ngày về: <span>15-11-2020</span>
                      </li>
                      <li>
                        <i class="far fa-clock" aria-hidden="true"></i>
                        Thời gian: <span>5 ngày 4 đêm</span>
                      </li>
                      <li>
                        <i class="fas fa-user-friends" aria-hidden="true"></i>
                        Tổng thành viên: <span>3</span>
                      </li>
                      <li>
                        <i class="fas fa-user" aria-hidden="true"></i>
                        Người lớn: <span>4.279.000 đ</span>
                        <span class="adult">X 1</span>
                      </li>
                      <li>
                        <i class="fas fa-baby" aria-hidden="true"></i>
                        Trẻ em: <span>3.279.000 đ</span>
                        <span class="adult">X 2</span>
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