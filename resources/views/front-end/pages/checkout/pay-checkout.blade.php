@extends('front-end/layout/layout')
@section('title', 'Phương Thức Thanh Toán')
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
              <li>
                <h2>Xác nhận <i class="fas fa-check-circle"></i></h2>
              </li>
            </ul>
          </div>
          <div class="form__client">
            <div class="row">
              <div class="col-lg-8">
                <h3>Chọn phương thức thanh toán</h3>
                <div class="phuongthuctt">
                  <div class="phuongthuctt__items active" data-tab="tab1">
                    <div class="wrap__info">
                      <img
                        src="{{asset('FrontEnd/assets/images/defaults')}}/bank.png"
                        alt="img"
                      />
                      <p>Ngân hàng nội địa</p>
                    </div>
                  </div>
                  <div class="phuongthuctt__items" data-tab="tab2">
                    <div class="wrap__info">
                      <img
                        src="{{asset('FrontEnd/assets/images/defaults')}}/master-card.png"
                        alt="img"
                      />
                      <p>Thanh toán quốc tế</p>
                    </div>
                  </div>
                  <div class="phuongthuctt__items" data-tab="tab3">
                    <div class="wrap__info">
                      <img
                        src="{{asset('FrontEnd/assets/images/defaults')}}/zalopay.png"
                        alt="img"
                      />
                      <p>Zalo Pay</p>
                    </div>
                  </div>
                  <div class="phuongthuctt__items" data-tab="tab4">
                    <div class="wrap__info">
                      <img src="{{asset('FrontEnd/assets/images/defaults')}}/momo.png" alt="img" />
                      <p>Ví điện tử Momo</p>
                    </div>
                  </div>
                  <div class="phuongthuctt__items" data-tab="tab5">
                    <div class="wrap__info">
                      <img
                        src="{{asset('FrontEnd/assets/images/defaults')}}/thanhtoantructiep.png"
                        alt="img"
                      />
                      <p>Thanh toán trực tiếp</p>
                    </div>
                  </div>
                </div>
                <div class="list-tab">
                  <div class="tabs tab1 active">
                    <h4>
                      <b> Golden Tour</b> chấp nhận thanh toán bằng các thẻ ATM nội địa
                      dưới đây.
                    </h4>
                    <div class="list__nganhang">
                      <div class="item active">
                        <div class="wrap-image">
                          <img
                            src="{{asset('FrontEnd/assets/images/defaults')}}/nh1.png"
                            alt="img"
                          />
                        </div>
                      </div>
                      <div class="item">
                        <div class="wrap-image">
                          <img
                            src="{{asset('FrontEnd/assets/images/defaults')}}/nh2.png"
                            alt="img"
                          />
                        </div>
                      </div>
                      <div class="item">
                        <div class="wrap-image">
                          <img
                            src="{{asset('FrontEnd/assets/images/defaults')}}/nh3.png"
                            alt="img"
                          />
                        </div>
                      </div>
                      <div class="item">
                        <div class="wrap-image">
                          <img
                            src="{{asset('FrontEnd/assets/images/defaults')}}/nh4.png"
                            alt="img"
                          />
                        </div>
                      </div>
                      <div class="item">
                        <div class="wrap-image">
                          <img
                            src="{{asset('FrontEnd/assets/images/defaults')}}/nh5.png"
                            alt="img"
                          />
                        </div>
                      </div>
                      <div class="item">
                        <div class="wrap-image">
                          <img
                            src="{{asset('FrontEnd/assets/images/defaults')}}/nh6.png"
                            alt="img"
                          />
                        </div>
                      </div>
                      <div class="item">
                        <div class="wrap-image">
                          <img
                            src="{{asset('FrontEnd/assets/images/defaults')}}/nh7.png"
                            alt="img"
                          />
                        </div>
                      </div>
                      <div class="item">
                        <div class="wrap-image">
                          <img
                            src="{{asset('FrontEnd/assets/images/defaults')}}/nh8.png"
                            alt="img"
                          />
                        </div>
                      </div>
                      <div class="item">
                        <div class="wrap-image">
                          <img
                            src="{{asset('FrontEnd/assets/images/defaults')}}/nh9.png"
                            alt="img"
                          />
                        </div>
                      </div>
                      <div class="item">
                        <div class="wrap-image">
                          <img
                            src="{{asset('FrontEnd/assets/images/defaults')}}/nh10.png"
                            alt="img"
                          />
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="tabs tab2">
                    <form action="#">
                      <div class="form__items">
                        <label for="name">Số thẻ</label>
                        <input
                          class="reset-apperance"
                          placeholder="Nhập số thẻ"
                          type="text"
                        />
                      </div>
                      <div class="form__items">
                        <label for="name">Tên chủ thẻ</label>
                        <input
                          class="reset-apperance"
                          placeholder="Nhập họ và tên"
                          type="text"
                        />
                      </div>
                      <div class="form__items">
                        <label for="name">Ngày hết hạn</label>
                        <input
                          class="reset-apperance"
                          placeholder="MM/YY"
                          type="text"
                        />
                      </div>
                      <div class="form__items">
                        <label for="name">CVV/CVC</label>
                        <input
                          class="reset-apperance"
                          placeholder="CVV/CVC"
                          type="text"
                        />
                      </div>
                      <div class="form__items form__items-full">
                        <img
                          class="w-100"
                          src="{{asset('FrontEnd/assets/images/defaults')}}/credit-card.png"
                          alt="img"
                        />
                      </div>
                    </form>
                  </div>
                  <div class="tabs tab3">
                    <div class="qr_choose">
                      <h5>
                        Vui lòng mở ứng dụng <b>ZaloPay</b> và quét mã bên dưới
                      </h5>
                      <img
                        class="qrcode"
                        src="{{asset('FrontEnd/assets/images/defaults')}}/qrcode.png"
                        alt="img"
                      />
                    </div>
                  </div>
                  <div class="tabs tab4">
                    <div class="qr_choose">
                      <h5>
                        Vui lòng mở ứng dụng <b>Momo</b> và quét mã bên dưới
                      </h5>
                      <img
                        class="qrcode"
                        src="{{asset('FrontEnd/assets/images/defaults')}}/qrcode.png"
                        alt="img"
                      />
                    </div>
                  </div>
                  <div class="tabs tab5">
                    <div class="qr_choose">
                      <h5>
                        Thanh toán trực tiếp tại trụ sở của <b>Golden Tour</b>
                      </h5>
                      <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.455226329226!2d106.62735611437098!3d10.852939092269638!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317529b6a2b351a5%3A0x11690ada8c36f9bc!2zVHLGsOG7nW5nIENhbyDEkeG6s25nIFRo4buxYyBow6BuaCBGUFQgUG9seXRlY2huaWMgVFAuSENNIChDUzMp!5e0!3m2!1svi!2s!4v1604991318647!5m2!1svi!2s"
                        width="600"
                        height="450"
                        frameborder="0"
                        style="border: 0"
                        allowfullscreen=""
                        aria-hidden="false"
                        tabindex="0"
                      ></iframe>
                    </div>
                  </div>
                </div>
                <form >
                  <div class="form__items">
                    <a class="goback" href="#">Trở về</a>
                  </div>
                  <div class="form__items">
                    <a class="goback --next" href="#" >
                      Xác nhận
                    </a>
                  </div>
                </form>
              </div>
              <div class="col-lg-4">
                <div class="support-kh">Hotline - 1900 200 777</div>
                <div class="book-details">
                  <img
                    class="w-100"
                    src="{{asset('FrontEnd/assets/images/defaults')}}/tours/mientrung.jpg"
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
                        Giá Người lớn: <span>4.279.000 đ</span>
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