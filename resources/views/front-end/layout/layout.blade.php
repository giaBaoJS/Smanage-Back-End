<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link
      rel="icon"
      type="image/png"
      href="{{asset('favicon.ico')}}"
    />
    <link rel="stylesheet" href="{{asset('FrontEnd/assets/libs/css')}}/fontawesome.min.css" />
    <link rel="stylesheet" href="{{asset('FrontEnd/assets/libs/css')}}/bootstrap.min.css" />
    <link rel="stylesheet" href="{{asset('FrontEnd/assets/libs/css')}}/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{asset('FrontEnd/assets/libs/css')}}/magnific.css" />
    <link rel="stylesheet" href="{{asset('FrontEnd/assets/libs/light-gallery')}}/lightgallery.min.css" />
    <link rel="stylesheet" href="{{asset('FrontEnd/assets/libs/css')}}/wow.css" />
    <link rel="stylesheet" href="{{asset('FrontEnd/assets/libs/css')}}/flatpickr.min.css" />
    <link rel="stylesheet" href="{{asset('FrontEnd/assets/css')}}/font.css" />
    <link rel="stylesheet" href="{{asset('FrontEnd/assets/css')}}/main.css" />
  </head>

  <body>
    <header class="header">
      <div class="header__topbar">
        <div class="container-fluid px-0">
          <div class="topbar">
            <ul class="topbar-left">
              <li>
                <a href="#">
                  <i class="fab fa-facebook"></i>
                </a>
                <a href="#">
                  <i class="fab fa-twitter"></i>
                </a>
                <a href="#">
                  <i class="fab fa-google"></i>
                </a>
              </li>
              <li class="header-mail"> <a href="mailto:goldentour@gmail.com">goldentour@gmail.com</a></li>
            </ul>
            <ul class="topbar-right">
              <li><a href="{{ url('/dang-nhap') }}">Đăng nhập</a></li>
              <li><a href="{{ url('/dang-ky') }}">Đăng ký</a></li>
              <li><a href="#" class='logout'>Đăng xuất</a></li>
              <!-- <li>VIE</li> -->
            </ul>
          </div>
        </div>
      </div>
      <div class="header__menu">
        <div class="main-header">
          <div class="container isner">
            <div class="main-logo">
              <a href="#"><img
                      src="{{asset('FrontEnd/assets/images/defaults')}}/logo-1.png"
                    width="100px"
                    alt="logo" />
              </a>
            </div>
            <div class="hamburger-btn main-menu-btn">
              <div class="bar"></div>
            </div>
            <div class="right">
              <div class="main-menu">
                <div class="logo-mobile">
                  <a href="#" >
                  <img
                  src="{{asset('FrontEnd/assets/images/defaults')}}/logo-1.png"
                    width="100px"
                    alt="logo"/>
                  </a>
                </div>
                <ul class="main-menu-nav">
                  <li class="current-menu-item"><a href="{{ url('/') }}">Trang chủ</a></li>
                  <li><a href="{{ url('/gioi-thieu') }}">Giới thiệu</a></li>
                  <li>
                    <a href="{{ url('/tours') }}">Tours</a>
                  </li>
                  <li><a href="{{ url('/doi-tac') }}">Đối tác</a></li>
                  <li><a href="{{ url('/tin-tuc') }}">Tin tức</a></li>
                  <li><a href="{{ url('/lien-he') }}">Liên hệ</a></li>
                </ul>
                <div class="main-menu-overlay"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
    @section('wrapper')

    @show

    <footer>
      <div class="footer-main">
        <div class="container">
          <a href="#"
            ><img
              class="img-fluid"
              src="{{asset('FrontEnd/assets/images/defaults')}}/logo-1.png"
              alt=""
          /></a>
          <div class="row">
            <div class="col-md-3">
              <h3>Miền Bắc</h3>
              <ul class="list-mien">
                <li><a href="#">Hà Nội</a></li>
                <li><a href="#">Hạ Long</a></li>
                <li><a href="#">Spa</a></li>
                <li><a href="#">Ninh Bình</a></li>
              </ul>
            </div>
            <div class="col-md-3">
              <h3>Miền Bắc</h3>
              <ul class="list-mien">
                <li><a href="#">Hà Nội</a></li>
                <li><a href="#">Hạ Long</a></li>
                <li><a href="#">Spa</a></li>
                <li><a href="#">Ninh Bình</a></li>
              </ul>
            </div>
            <div class="col-md-3">
              <h3>Miền Bắc</h3>
              <ul class="list-mien">
                <li><a href="#">Hà Nội</a></li>
                <li><a href="#">Hạ Long</a></li>
                <li><a href="#">Spa</a></li>
                <li><a href="#">Ninh Bình</a></li>
              </ul>
            </div>
            <div class="col-md-3">
              <h3>Mạng xã hội</h3>
              <ul class="list-icon-social">
                <li>
                  <a href="#" class="link facebook">
                    <i class="fab fa-facebook"></i>
                  </a>
                </li>
                <li>
                  <a href="#" class="link twitter">
                    <i class="fab fa-twitter"></i>
                  </a>
                </li>
                <li>
                  <a href="#" class="link pinterest">
                    <i class="fab fa-pinterest-p"></i>
                  </a>
                </li>
                <li>
                  <a href="#" class="link google">
                    <i class="fab fa-google"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="copyright">
        <p>@ Copyright Golden Tours</p>
      </div>
    </footer>
    <a href="javascript:" class="" id="return-to-top"
      ><i class="fa fa-angle-up"></i
    ></a>
    <script src="{{asset('FrontEnd/assets/libs/js')}}/jquery-3.5.1.min.js"></script>
    <script src="{{asset('FrontEnd/assets/libs/js')}}/bootstrap.min.js"></script>
    <script src="{{asset('FrontEnd/assets/libs/js')}}/swiper-bundle.min.js"></script>
    <script src="{{asset('FrontEnd/assets/libs/js')}}/magnific.js"></script>
    <script src="{{asset('FrontEnd/assets/libs/light-gallery')}}/lightgallery-all.min.js"></script>
    <script src="{{asset('FrontEnd/assets/libs/js')}}/wow.min.js"></script>
    <script src="{{asset('FrontEnd/assets/libs/js')}}/flatpickr.js"></script>
    <script src="{{asset('FrontEnd/assets/libs/js')}}/sweetalert.min.js"></script>
    <script src="https://npmcdn.com/flatpickr/dist/l10n/vn.js"></script>
    <script src="{{asset('FrontEnd/assets/js')}}/validate.js"></script>
    <script src="{{asset('FrontEnd/assets/js')}}/api.js"></script>
    <script src="{{asset('FrontEnd/assets/js')}}/main.js"></script>
  </body>
</html>
