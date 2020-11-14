@extends('admin/layouts/layout')
@section('Page-Title')
<div class="col-md-12">
    <h4 class="page-title mb-1">Thư viện</h4>
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item">
            <a href="/admin/dashboard">Trang chủ</a>
        </li>
        <li class="breadcrumb-item active">Thư viện</li>
    </ol>
</div>
@endsection
@section('content')
<div class="page-content-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-body">
              <!-- Viết nội dung vào đây nè các AE -->
              <div class="row">
                <ul class="col list-inline gallery-categories-filter text-center" id="filter">
                  <li class="list-inline-item">
                    <a class="categories active" data-filter="*">Tất cả</a>
                  </li>
                  @foreach ($showmien as $t)
                    <li class="list-inline-item">
                    <a class="categories" data-filter=".{{$t->id_mien}}">{{$t->name_mien}}</a>
                    </li>
                  @endforeach
                </ul>
              </div>

              <!-- Gallary -->
              <div class="row container-grid projects-wrapper">
                @foreach ($showGallery as $g)
                    <div class="col-xl-3 col-md-4 col-sm-6 {{$g->id_mien}}">
                        <div class="gallery-box mt-4">
                        <a class="gallery-popup" href="{{asset('BackEnd/assets/images/gallery')}}/{{$g->url_img_gallery}}" title="">
                            <img class="gallery-demo-img img-fluid mx-auto" src="{{asset('BackEnd/assets/images/gallery')}}/{{$g->url_img_gallery}}"
                            alt="1" />
                            <div class="gallery-overlay">
                            <div class="overlay-content">
                                <h5 class="overlay-title">
                                    {{$g->title}}
                                </h5>
                                <p class="text-uppercase mb-0">
                                    {{$g->name_mien}}
                                </p>
                            </div>
                            </div>
                        </a>
                        </div>
                    </div>
                @endforeach

                <!-- Gallary -->
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- end row -->
    </div>
    <!-- end container-fluid -->
  </div>
@endsection
