@extends('front-end/layout/layout')
@section('title', 'Thư Viện')
@section('wrapper')
<div class="wrapper-gallery">
      <section class="hero-banner">
        <div class="container">
          <h2>Gallery</h2>
        </div>
      </section>
      <section class="list__gallery">
        <div class="container">
          <ul class="list-cato">
            <li class="tab active" data-tab="tab1">Miền Bắc</li>
            <li class="tab" data-tab="tab2">Miền Trung</li>
            <li class="tab" data-tab="tab3">Miền Nam</li>
          </ul>
        </div>
      </section>
      <section class="list__album">
          <div class="container">
            <div class="tablist tab1 active">
                <div class="row lightgallery">
                  <div
                    class="col-md-3 items-gl"
                    data-src="{{asset('FrontEnd/assets/images/defaults/tours')}}/danang.jpg">
                    <img
                      class="img-fluid w-100"
                      src="{{asset('FrontEnd/assets/images/defaults/tours')}}/danang.jpg"
                      alt="Đà nẵng"
                    />
                    <div class="gl-overlay">
                      <i class="fa fa-image"></i>
                    </div>
                  </div>
                  <div
                    class="col-md-3 items-gl"
                    data-src="{{asset('FrontEnd/assets/images/defaults/tours')}}/ho-guom.jpg">
                    <img
                      class="img-fluid w-100"
                      src="{{asset('FrontEnd/assets/images/defaults/tours')}}/ho-guom.jpg"
                      alt="Hồ gươm"
                    />
                    <div class="gl-overlay">
                      <i class="fa fa-image"></i>
                    </div>
                  </div>
                  <div
                    class="col-md-3 items-gl"
                    data-src="{{asset('FrontEnd/assets/images/defaults/tours')}}/lang-bac-ho.jpg">
                    <img
                      class="img-fluid w-100"
                      src="{{asset('FrontEnd/assets/images/defaults/tours')}}/lang-bac-ho.jpg"
                      alt="Lăng bác hồ"
                    />
                    <div class="gl-overlay">
                      <i class="fa fa-image"></i>
                    </div>
                  </div>
                  <div
                    class="col-md-3 items-gl"
                    data-src="{{asset('FrontEnd/assets/images/defaults/tours')}}/mientrung.jpg">
                    <img
                      class="img-fluid w-100"
                      src="{{asset('FrontEnd/assets/images/defaults/tours')}}/mientrung.jpg"
                      alt="Cầu rồng"
                    />
                    <div class="gl-overlay">
                      <i class="fa fa-image"></i>
                    </div>
                  </div>
                  <div
                    class="col-md-3 items-gl"
                    data-src="{{asset('FrontEnd/assets/images/defaults/tours')}}/hohoankiem.jpg">
                    <img
                      class="img-fluid w-100"
                      src="{{asset('FrontEnd/assets/images/defaults/tours')}}/hohoankiem.jpg"
                      alt="Hồ hoàn kiếm"
                    />
                    <div class="gl-overlay">
                      <i class="fa fa-image"></i>
                    </div>
                  </div>
                  <div
                    class="col-md-3 items-gl"
                    data-src="{{asset('FrontEnd/assets/images/defaults/tours')}}/mientrung.jpg">
                    <img
                      class="img-fluid w-100"
                      src="{{asset('FrontEnd/assets/images/defaults/tours')}}/mientrung.jpg"
                      alt="Cầu rồng"
                    />
                    <div class="gl-overlay">
                      <i class="fa fa-image"></i>
                    </div>
                  </div>
                  <div
                  class="col-md-3 items-gl"
                  data-src="{{asset('FrontEnd/assets/images/defaults/tours')}}/danang.jpg">
                  <img
                    class="img-fluid w-100"
                    src="{{asset('FrontEnd/assets/images/defaults/tours')}}/danang.jpg"
                    alt="Đà nẵng"
                  />
                  <div class="gl-overlay">
                    <i class="fa fa-image"></i>
                  </div>
                </div>
                <div
                  class="col-md-3 items-gl"
                  data-src="{{asset('FrontEnd/assets/images/defaults/tours')}}/ho-guom.jpg">
                  <img
                    class="img-fluid w-100"
                    src="{{asset('FrontEnd/assets/images/defaults/tours')}}/ho-guom.jpg"
                    alt="Hồ gươm"
                  />
                  <div class="gl-overlay">
                    <i class="fa fa-image"></i>
                  </div>
                </div>
                <div
                  class="col-md-3 items-gl"
                  data-src="{{asset('FrontEnd/assets/images/defaults/tours')}}/lang-bac-ho.jpg">
                  <img
                    class="img-fluid w-100"
                    src="{{asset('FrontEnd/assets/images/defaults/tours')}}/lang-bac-ho.jpg"
                    alt="Lăng bác hồ"
                  />
                  <div class="gl-overlay">
                    <i class="fa fa-image"></i>
                  </div>
                </div>
                <div
                  class="col-md-3 items-gl"
                  data-src="{{asset('FrontEnd/assets/images/defaults/tours')}}/lang-bac-ho.jpg">
                  <img
                    class="img-fluid w-100"
                    src="{{asset('FrontEnd/assets/images/defaults/tours')}}/lang-bac-ho.jpg"
                    alt="Lăng bác hồ"
                  />
                  <div class="gl-overlay">
                    <i class="fa fa-image"></i>
                  </div>
                </div>
                <div
                class="col-md-3 items-gl"
                data-src="{{asset('FrontEnd/assets/images/defaults/tours')}}/mientrung.jpg">
                <img
                  class="img-fluid w-100"
                  src="{{asset('FrontEnd/assets/images/defaults/tours')}}/mientrung.jpg"
                  alt="Cầu rồng"
                />
                <div class="gl-overlay">
                  <i class="fa fa-image"></i>
                </div>
              </div>
              <div
                class="col-md-3 items-gl"
                data-src="{{asset('FrontEnd/assets/images/defaults/tours')}}/hohoankiem.jpg">
                <img
                  class="img-fluid w-100"
                  src="{{asset('FrontEnd/assets/images/defaults/tours')}}/hohoankiem.jpg"
                  alt="Hồ hoàn kiếm"
                />
                <div class="gl-overlay">
                  <i class="fa fa-image"></i>
                </div>
              </div>
              </div>
          </div>
            <div class="tablist tab2">
                <div class="row lightgallery">
                    <div
                    class="col-md-3 items-gl"
                    data-src="{{asset('FrontEnd/assets/images/defaults/tours')}}/lang-bac-ho.jpg">
                    <img
                      class="img-fluid w-100"
                      src="{{asset('FrontEnd/assets/images/defaults/tours')}}/lang-bac-ho.jpg"
                      alt="Lăng bác hồ"
                    />
                    <div class="gl-overlay">
                      <i class="fa fa-image"></i>
                    </div>
                  </div>
                  <div
                    class="col-md-3 items-gl"
                    data-src="{{asset('FrontEnd/assets/images/defaults/tours')}}/lang-bac-ho.jpg">
                    <img
                      class="img-fluid w-100"
                      src="{{asset('FrontEnd/assets/images/defaults/tours')}}/lang-bac-ho.jpg"
                      alt="Lăng bác hồ"
                    />
                    <div class="gl-overlay">
                      <i class="fa fa-image"></i>
                    </div>
                  </div>
                  <div
                  class="col-md-3 items-gl"
                  data-src="{{asset('FrontEnd/assets/images/defaults/tours')}}/mientrung.jpg">
                  <img
                    class="img-fluid w-100"
                    src="{{asset('FrontEnd/assets/images/defaults/tours')}}/mientrung.jpg"
                    alt="Cầu rồng"
                  />
                  <div class="gl-overlay">
                    <i class="fa fa-image"></i>
                  </div>
                </div>
                <div
                  class="col-md-3 items-gl"
                  data-src="{{asset('FrontEnd/assets/images/defaults/tours')}}/hohoankiem.jpg">
                  <img
                    class="img-fluid w-100"
                    src="{{asset('FrontEnd/assets/images/defaults/tours')}}/hohoankiem.jpg"
                    alt="Hồ hoàn kiếm"
                  />
                  <div class="gl-overlay">
                    <i class="fa fa-image"></i>
                  </div>
                </div>
                  <div
                    class="col-md-3 items-gl"
                    data-src="{{asset('FrontEnd/assets/images/defaults/tours')}}/danang.jpg">
                    <img
                      class="img-fluid w-100"
                      src="{{asset('FrontEnd/assets/images/defaults/tours')}}/danang.jpg"
                      alt="Đà nẵng"
                    />
                    <div class="gl-overlay">
                      <i class="fa fa-image"></i>
                    </div>
                  </div>
                  <div
                    class="col-md-3 items-gl"
                    data-src="{{asset('FrontEnd/assets/images/defaults/tours')}}/ho-guom.jpg">
                    <img
                      class="img-fluid w-100"
                      src="{{asset('FrontEnd/assets/images/defaults/tours')}}/ho-guom.jpg"
                      alt="Hồ gươm"
                    />
                    <div class="gl-overlay">
                      <i class="fa fa-image"></i>
                    </div>
                  </div>
                  <div
                    class="col-md-3 items-gl"
                    data-src="{{asset('FrontEnd/assets/images/defaults/tours')}}/lang-bac-ho.jpg">
                    <img
                      class="img-fluid w-100"
                      src="{{asset('FrontEnd/assets/images/defaults/tours')}}/lang-bac-ho.jpg"
                      alt="Lăng bác hồ"
                    />
                    <div class="gl-overlay">
                      <i class="fa fa-image"></i>
                    </div>
                  </div>
                  <div
                    class="col-md-3 items-gl"
                    data-src="{{asset('FrontEnd/assets/images/defaults/tours')}}/mientrung.jpg">
                    <img
                      class="img-fluid w-100"
                      src="{{asset('FrontEnd/assets/images/defaults/tours')}}/mientrung.jpg"
                      alt="Cầu rồng"
                    />
                    <div class="gl-overlay">
                      <i class="fa fa-image"></i>
                    </div>
                  </div>
                  <div
                    class="col-md-3 items-gl"
                    data-src="{{asset('FrontEnd/assets/images/defaults/tours')}}/hohoankiem.jpg">
                    <img
                      class="img-fluid w-100"
                      src="{{asset('FrontEnd/assets/images/defaults/tours')}}/hohoankiem.jpg"
                      alt="Hồ hoàn kiếm"
                    />
                    <div class="gl-overlay">
                      <i class="fa fa-image"></i>
                    </div>
                  </div>
                  <div
                    class="col-md-3 items-gl"
                    data-src="{{asset('FrontEnd/assets/images/defaults/tours')}}/mientrung.jpg">
                    <img
                      class="img-fluid w-100"
                      src="{{asset('FrontEnd/assets/images/defaults/tours')}}/mientrung.jpg"
                      alt="Cầu rồng"
                    />
                    <div class="gl-overlay">
                      <i class="fa fa-image"></i>
                    </div>
                  </div>
                  <div
                  class="col-md-3 items-gl"
                  data-src="{{asset('FrontEnd/assets/images/defaults/tours')}}/danang.jpg">
                  <img
                    class="img-fluid w-100"
                    src="{{asset('FrontEnd/assets/images/defaults/tours')}}/danang.jpg"
                    alt="Đà nẵng"
                  />
                  <div class="gl-overlay">
                    <i class="fa fa-image"></i>
                  </div>
                </div>
                <div
                  class="col-md-3 items-gl"
                  data-src="{{asset('FrontEnd/assets/images/defaults/tours')}}/ho-guom.jpg">
                  <img
                    class="img-fluid w-100"
                    src="{{asset('FrontEnd/assets/images/defaults/tours')}}/ho-guom.jpg"
                    alt="Hồ gươm"
                  />
                  <div class="gl-overlay">
                    <i class="fa fa-image"></i>
                  </div>
                </div>

              </div>
          </div>
          <div class="tablist tab3">
            <div class="row lightgallery">
              <div
                class="col-md-3 items-gl"
                data-src="{{asset('FrontEnd/assets/images/defaults/tours')}}/danang.jpg">
                <img
                  class="img-fluid w-100"
                  src="{{asset('FrontEnd/assets/images/defaults/tours')}}/danang.jpg"
                  alt="Đà nẵng"
                />
                <div class="gl-overlay">
                  <i class="fa fa-image"></i>
                </div>
              </div>
              <div
                class="col-md-3 items-gl"
                data-src="{{asset('FrontEnd/assets/images/defaults/tours')}}/ho-guom.jpg">
                <img
                  class="img-fluid w-100"
                  src="{{asset('FrontEnd/assets/images/defaults/tours')}}/ho-guom.jpg"
                  alt="Hồ gươm"
                />
                <div class="gl-overlay">
                  <i class="fa fa-image"></i>
                </div>
              </div>
              <div
                class="col-md-3 items-gl"
                data-src="{{asset('FrontEnd/assets/images/defaults/tours')}}/lang-bac-ho.jpg">
                <img
                  class="img-fluid w-100"
                  src="{{asset('FrontEnd/assets/images/defaults/tours')}}/lang-bac-ho.jpg"
                  alt="Lăng bác hồ"
                />
                <div class="gl-overlay">
                  <i class="fa fa-image"></i>
                </div>
              </div>
              <div
                class="col-md-3 items-gl"
                data-src="{{asset('FrontEnd/assets/images/defaults/tours')}}/mientrung.jpg">
                <img
                  class="img-fluid w-100"
                  src="{{asset('FrontEnd/assets/images/defaults/tours')}}/mientrung.jpg"
                  alt="Cầu rồng"
                />
                <div class="gl-overlay">
                  <i class="fa fa-image"></i>
                </div>
              </div>
              <div
                class="col-md-3 items-gl"
                data-src="{{asset('FrontEnd/assets/images/defaults/tours')}}/hohoankiem.jpg">
                <img
                  class="img-fluid w-100"
                  src="{{asset('FrontEnd/assets/images/defaults/tours')}}/hohoankiem.jpg"
                  alt="Hồ hoàn kiếm"
                />
                <div class="gl-overlay">
                  <i class="fa fa-image"></i>
                </div>
              </div>
              <div
                class="col-md-3 items-gl"
                data-src="{{asset('FrontEnd/assets/images/defaults/tours')}}/mientrung.jpg">
                <img
                  class="img-fluid w-100"
                  src="{{asset('FrontEnd/assets/images/defaults/tours')}}/mientrung.jpg"
                  alt="Cầu rồng"
                />
                <div class="gl-overlay">
                  <i class="fa fa-image"></i>
                </div>
              </div>
              <div
              class="col-md-3 items-gl"
              data-src="{{asset('FrontEnd/assets/images/defaults/tours')}}/danang.jpg">
              <img
                class="img-fluid w-100"
                src="{{asset('FrontEnd/assets/images/defaults/tours')}}/danang.jpg"
                alt="Đà nẵng"
              />
              <div class="gl-overlay">
                <i class="fa fa-image"></i>
              </div>
            </div>
            <div
              class="col-md-3 items-gl"
              data-src="{{asset('FrontEnd/assets/images/defaults/tours')}}/ho-guom.jpg">
              <img
                class="img-fluid w-100"
                src="{{asset('FrontEnd/assets/images/defaults/tours')}}/ho-guom.jpg"
                alt="Hồ gươm"
              />
              <div class="gl-overlay">
                <i class="fa fa-image"></i>
              </div>
            </div>
            <div
              class="col-md-3 items-gl"
              data-src="{{asset('FrontEnd/assets/images/defaults/tours')}}/lang-bac-ho.jpg">
              <img
                class="img-fluid w-100"
                src="{{asset('FrontEnd/assets/images/defaults/tours')}}/lang-bac-ho.jpg"
                alt="Lăng bác hồ"
              />
              <div class="gl-overlay">
                <i class="fa fa-image"></i>
              </div>
            </div>
            <div
              class="col-md-3 items-gl"
              data-src="{{asset('FrontEnd/assets/images/defaults/tours')}}/lang-bac-ho.jpg">
              <img
                class="img-fluid w-100"
                src="{{asset('FrontEnd/assets/images/defaults/tours')}}/lang-bac-ho.jpg"
                alt="Lăng bác hồ"
              />
              <div class="gl-overlay">
                <i class="fa fa-image"></i>
              </div>
            </div>
            <div
            class="col-md-3 items-gl"
            data-src="{{asset('FrontEnd/assets/images/defaults/tours')}}/mientrung.jpg">
            <img
              class="img-fluid w-100"
              src="{{asset('FrontEnd/assets/images/defaults/tours')}}/mientrung.jpg"
              alt="Cầu rồng"
            />
            <div class="gl-overlay">
              <i class="fa fa-image"></i>
            </div>
          </div>
          <div
            class="col-md-3 items-gl"
            data-src="{{asset('FrontEnd/assets/images/defaults/tours')}}/hohoankiem.jpg">
            <img
              class="img-fluid w-100"
              src="{{asset('FrontEnd/assets/images/defaults/tours')}}/hohoankiem.jpg"
              alt="Hồ hoàn kiếm"
            />
            <div class="gl-overlay">
              <i class="fa fa-image"></i>
            </div>
          </div>
          </div>
      </div>
      </section>
    </div>
@endsection