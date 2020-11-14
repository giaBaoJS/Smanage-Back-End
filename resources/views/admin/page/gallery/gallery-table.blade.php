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
                    <a class="categories" data-filter=".{{$t->name}}">{{$t->name}}</a>
                    </li>
                  @endforeach
                </ul>
              </div>

              <!-- Gallary -->
              <div class="row container-grid projects-wrapper">
                <div class="col-xl-3 col-md-4 col-sm-6 branding designing development">
                  <div class="gallery-box mt-4">
                    <a class="gallery-popup" href="assets/images/small/img-1.jpg" title="">
                      <img class="gallery-demo-img img-fluid mx-auto" src="assets/images/small/img-1.jpg"
                        alt="1" />
                      <div class="gallery-overlay">
                        <div class="overlay-content">
                          <h5 class="overlay-title">
                            Person riding on snowmobile
                          </h5>
                          <p class="text-uppercase mb-0">
                            Joseph Clark
                          </p>
                        </div>
                      </div>
                    </a>
                  </div>
                </div>

                <div class="col-xl-3 col-md-4 col-sm-6 photography">
                  <div class="gallery-box mt-4">
                    <a class="gallery-popup" href="assets/images/small/img-2.jpg" title="">
                      <img class="gallery-demo-img img-fluid mx-auto" src="assets/images/small/img-2.jpg"
                        alt="1" />
                      <div class="gallery-overlay">
                        <div class="overlay-content">
                          <h5 class="overlay-title">Photography</h5>
                          <p class="text-uppercase mb-0">Paul Stone</p>
                        </div>
                      </div>
                    </a>
                  </div>
                </div>

                <div class="col-xl-3 col-md-4 col-sm-6 branding development">
                  <div class="gallery-box mt-4">
                    <a class="gallery-popup" href="assets/images/small/img-3.jpg" title="">
                      <img class="gallery-demo-img img-fluid mx-auto" src="assets/images/small/img-3.jpg"
                        alt="1" />
                      <div class="gallery-overlay">
                        <div class="overlay-content">
                          <h5 class="overlay-title">
                            Skateland storefront
                          </h5>
                          <p class="text-uppercase mb-0">
                            Thomas Moser
                          </p>
                        </div>
                      </div>
                    </a>
                  </div>
                </div>

                <div class="col-xl-3 col-md-4 col-sm-6 branding designing photography">
                  <div class="gallery-box mt-4">
                    <a class="gallery-popup" href="assets/images/small/img-4.jpg" title="">
                      <img class="gallery-demo-img img-fluid mx-auto" src="assets/images/small/img-4.jpg"
                        alt="1" />
                      <div class="gallery-overlay">
                        <div class="overlay-content">
                          <h5 class="overlay-title">
                            Two persons walking on road
                          </h5>
                          <p class="text-uppercase mb-0">
                            Daniel Draper
                          </p>
                        </div>
                      </div>
                    </a>
                  </div>
                </div>

                <div class="col-xl-3 col-md-4 col-sm-6 branding designing">
                  <div class="gallery-box mt-4">
                    <a class="gallery-popup" href="assets/images/small/img-5.jpg" title="">
                      <img class="gallery-demo-img img-fluid mx-auto" src="assets/images/small/img-5.jpg"
                        alt="1" />
                      <div class="gallery-overlay">
                        <div class="overlay-content">
                          <h5 class="overlay-title">
                            Person holding smartphone
                          </h5>
                          <p class="text-uppercase mb-0">
                            Rocky Jensen
                          </p>
                        </div>
                      </div>
                    </a>
                  </div>
                </div>

                <div class="col-xl-3 col-md-4 col-sm-6 photography">
                  <div class="gallery-box mt-4">
                    <a class="gallery-popup" href="assets/images/small/img-6.jpg" title="">
                      <img class="gallery-demo-img img-fluid mx-auto" src="assets/images/small/img-6.jpg"
                        alt="1" />
                      <div class="gallery-overlay">
                        <div class="overlay-content">
                          <h5 class="overlay-title">
                            People sitting on chair
                          </h5>
                          <p class="text-uppercase mb-0">James Lewis</p>
                        </div>
                      </div>
                    </a>
                  </div>
                </div>
                <div class="col-xl-3 col-md-4 col-sm-6 branding designing development">
                  <div class="gallery-box mt-4">
                    <a class="gallery-popup" href="assets/images/small/img-7.jpg" title="">
                      <img class="gallery-demo-img img-fluid mx-auto" src="assets/images/small/img-7.jpg"
                        alt="1" />
                      <div class="gallery-overlay">
                        <div class="overlay-content">
                          <h5 class="overlay-title">
                            Coffee cup on Table
                          </h5>
                          <p class="text-uppercase mb-0">
                            Edward Kelley
                          </p>
                        </div>
                      </div>
                    </a>
                  </div>
                </div>

                <div class="col-xl-3 col-md-4 col-sm-6 photography">
                  <div class="gallery-box mt-4">
                    <a class="gallery-popup" href="assets/images/small/img-8.jpg" title="">
                      <img class="gallery-demo-img img-fluid mx-auto" src="assets/images/small/img-8.jpg"
                        alt="1" />
                      <div class="gallery-overlay">
                        <div class="overlay-content">
                          <h5 class="overlay-title">
                            Play game with VR
                          </h5>
                          <p class="text-uppercase mb-0">Brett John</p>
                        </div>
                      </div>
                    </a>
                  </div>
                </div>

                <div class="col-xl-3 col-md-4 col-sm-6 branding development">
                  <div class="gallery-box mt-4">
                    <a class="gallery-popup" href="assets/images/small/img-9.jpg" title="">
                      <img class="gallery-demo-img img-fluid mx-auto" src="assets/images/small/img-9.jpg"
                        alt="1" />
                      <div class="gallery-overlay">
                        <div class="overlay-content">
                          <h5 class="overlay-title">
                            Person climbing on wall
                          </h5>
                          <p class="text-uppercase mb-0">
                            Patrick Waddell
                          </p>
                        </div>
                      </div>
                    </a>
                  </div>
                </div>

                <div class="col-xl-3 col-md-4 col-sm-6 branding designing development">
                  <div class="gallery-box mt-4">
                    <a class="gallery-popup" href="assets/images/small/img-10.jpg" title="">
                      <img class="gallery-demo-img img-fluid mx-auto" src="assets/images/small/img-10.jpg"
                        alt="1" />
                      <div class="gallery-overlay">
                        <div class="overlay-content">
                          <h5 class="overlay-title">
                            Hello World text
                          </h5>
                          <p class="text-uppercase mb-0">
                            Johnny Garcia
                          </p>
                        </div>
                      </div>
                    </a>
                  </div>
                </div>

                <div class="col-xl-3 col-md-4 col-sm-6 branding designing">
                  <div class="gallery-box mt-4">
                    <a class="gallery-popup" href="assets/images/small/img-11.jpg" title="">
                      <img class="gallery-demo-img img-fluid mx-auto" src="assets/images/small/img-11.jpg"
                        alt="1" />
                      <div class="gallery-overlay">
                        <div class="overlay-content">
                          <h5 class="overlay-title">
                            Discussion for project
                          </h5>
                          <p class="text-uppercase mb-0">
                            Wayne Horton
                          </p>
                        </div>
                      </div>
                    </a>
                  </div>
                </div>

                <div class="col-xl-3 col-md-4 col-sm-6 photography development">
                  <div class="gallery-box mt-4">
                    <a class="gallery-popup" href="assets/images/small/img-12.jpg" title="">
                      <img class="gallery-demo-img img-fluid mx-auto" src="assets/images/small/img-12.jpg"
                        alt="1" />
                      <div class="gallery-overlay">
                        <div class="overlay-content">
                          <h5 class="overlay-title">Red car on Road</h5>
                          <p class="text-uppercase mb-0">
                            Steven Holcomb
                          </p>
                        </div>
                      </div>
                    </a>
                  </div>
                </div>
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
