@extends('front-end/layout/layout')
@section('title', 'Không Tìm Thấy')
@section('wrapper')
<div class="wrapper-404">
      <section class="not-found">
          <div class="not-found__items">
            <img class="img-fluid" src="{{asset('FrontEnd/assets/images/defaults/')}}/bg-404.png" alt="img">
            <p>Oops!. Trang bạn đang tìm kiếm không tồn tại. Hãy trở lại trang chủ !</p>
            <a href="#">Về trang chủ</a>
          </div>
      </section>
    </div>
@endsection