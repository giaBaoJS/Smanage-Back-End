@extends('front-end/layout/layout')
@section('title', 'Cung cấp thông tin')
@section('wrapper')
<div class="wrapper-checkout">
    <section class="hero-banner">
      <div class="container">
        <h2>Thanh toán đối tác</h2>
      </div>
    </section>
    <section class="checkout__detail">
      <div class="container">
        <div class="form__client">
          <div class="row">
            <div class="col-lg-8">
              <h3>Chọn phương thức thanh toán</h3>
              <div class="phuongthuctt">
                  @php
                      $i=1;
                  @endphp
                  <div id="showPayment">

                  </div>
                  @foreach ($showPayment as $p)
              <div class="phuongthuctt__items" data-tab="tab{{$i++}}" id="payMent">
              <input type="hidden" value="{{$p->id_payment}}" name="payment">
                      <div class="wrap__info">
                        <img
                      src="{{asset('FrontEnd/assets/images/defaults')}}/{{$p->img_payment}}"
                          alt="img"
                        />
                        <p>{{$p->name_payment}}</p>
                      </div>
                    </div>
                  @endforeach
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
                {{-- <div class="form__items">
                  <a class="goback" href="#">Trở về</a>
                </div> --}}
                <div class="form__items">
                    <style>
                      .loader {
                          border: 5px solid #f3f3f3; /* Light grey */
                          border-top: 5px solid #3498db; /* Blue */
                          border-radius: 50%;
                          width: 30px;
                          height: 30px;
                          animation: spin 2s linear infinite;
                          float: right;
                          margin-left: 10px;
                          margin-top: 10px;
                          }

                          @keyframes spin {
                          0% { transform: rotate(0deg); }
                          100% { transform: rotate(360deg); }
                          }
                    </style>
                  <div id="showLoader">
                      <a class="goback --next" href="#" id="checkout-part">Xác nhận</a>
                  </div>

                </div>
    </section>
</div>
    @endsection
