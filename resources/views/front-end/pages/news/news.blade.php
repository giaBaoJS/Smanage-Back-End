@extends('front-end/layout/layout')
@section('title', 'Tin Tức')
@section('wrapper')
<div class="wrapper-news">
      <section class="hero-banner">
        <div class="container">
          <h2>Blog</h2>
        </div>
      </section>
      <section class="news">
        <div class="container">
          <div class="row">
            <div class="col-lg-9 col-md-8">
              <div class="news-list">
                <div class="items">
                  <a href="#">
                    <img
                      src="{{asset('FrontEnd/assets/images/defaults/news')}}/3-mat-than.jpg"
                      alt="news"
                  /></a>
                  <a class="title" href="#">Những Hang Động Đẹp</a>
                  <div class="list-info">
                    <img src="{{asset('FrontEnd/assets/images/defaults')}}/phuoc.jpg" alt="icon" />
                    <h4>Phước nguyễn</h4>
                    <span>21/10/2020</span>
                    <a href="#">4 Nhận xét</a>
                  </div>
                  <p>
                    On the Insert tab, the galleries include items that are
                    designed to coordinate with the overall look of your
                    document. You can use these galleries to insert tables,
                    headers, footers, lists, cover pages, and other document
                    building blocks. When you create pictures, charts, or
                    diagrams, they also coordinate with your current document
                    look. You can […]
                  </p>
                  <a class="readmore" href="#">Read More</a>
                </div>
                <div class="items">
                  <a href="#"
                    ><img
                      src="{{asset('FrontEnd/assets/images/defaults/news')}}/mang-den_1.jpg"
                      alt="news"
                  /></a>
                  <a class="title" href="#">Những Hang Động Đẹp</a>
                  <div class="list-info">
                    <img src="{{asset('FrontEnd/assets/images/defaults')}}/phuoc.jpg" alt="icon" />
                    <h4>Phước nguyễn</h4>
                    <span>21/10/2020</span>
                    <a href="#">4 Nhận xét</a>
                  </div>
                  <p>
                    On the Insert tab, the galleries include items that are
                    designed to coordinate with the overall look of your
                    document. You can use these galleries to insert tables,
                    headers, footers, lists, cover pages, and other document
                    building blocks. When you create pictures, charts, or
                    diagrams, they also coordinate with your current document
                    look. You can […]
                  </p>
                  <a class="readmore" href="#">Read More</a>
                </div>
                <div class="items">
                  <a href="#">
                    <img
                      src="{{asset('FrontEnd/assets/images/defaults/news')}}/3-mat-than.jpg"
                      alt="news"
                  /></a>
                  <a class="title" href="#">Những Hang Động Đẹp</a>
                  <div class="list-info">
                    <img src="{{asset('FrontEnd/assets/images/defaults')}}/phuoc.jpg" alt="icon" />
                    <h4>Phước nguyễn</h4>
                    <span>21/10/2020</span>
                    <a href="#">4 Nhận xét</a>
                  </div>
                  <p>
                    On the Insert tab, the galleries include items that are
                    designed to coordinate with the overall look of your
                    document. You can use these galleries to insert tables,
                    headers, footers, lists, cover pages, and other document
                    building blocks. When you create pictures, charts, or
                    diagrams, they also coordinate with your current document
                    look. You can […]
                  </p>
                  <a class="readmore" href="#">Read More</a>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-4">
              <div class="filter-news">
                <form action="#">
                  <input type="text" placeholder="Tìm kiếm ..." />
                  <button type="submit">
                    <i class="fa fa-search"></i>
                  </button>
                </form>
                <div class="abouts">
                  <h3>Về chúng tôi</h3>
                  <img
                    src="{{asset('FrontEnd/assets/images/defaults')}}/travelers.jpg"
                    alt="travels"
                  />
                  <p>
                    Nam dapibus nisl vitae elit fringilla rutrum. Aenean
                    sollicitudin, erat a elementum rutrum, neque sem pretium
                    metus, quis mollis nisl nunc et massa
                  </p>
                </div>
                <div class="lasted-news">
                  <h3>Tin mới nhất</h3>
                  <div class="row no-gutters">
                    <div class="col-md-4 mb-3">
                      <a href="#">
                        <img
                          src="{{asset('FrontEnd/assets/images/defaults/background')}}/homepage-02-banner.jpg"
                          alt="news"
                        />
                      </a>
                    </div>
                    <div class="col-md-8 mb-3">
                      <div class="content">
                        <h3><a href="#">Visit Thailand, Bali And China</a></h3>
                        <span>21 Tháng 12 Năm 2020</span>
                      </div>
                    </div>
                    <div class="col-md-4 mb-3">
                      <a href="#">
                        <img
                          src="{{asset('FrontEnd/assets/images/defaults/background')}}/homepage-02-banner.jpg"
                          alt="news"
                        />
                      </a>
                    </div>
                    <div class="col-md-8 mb-3">
                      <div class="content">
                        <h3><a href="#">Visit Thailand, Bali And China</a></h3>
                        <span>21 Tháng 12 Năm 2020</span>
                      </div>
                    </div>
                    <div class="col-md-4 mb-3">
                      <a href="#">
                        <img
                          src="{{asset('FrontEnd/assets/images/defaults/background')}}/homepage-02-banner.jpg"
                          alt="news"
                        />
                      </a>
                    </div>
                    <div class="col-md-8 mb-3">
                      <div class="content">
                        <h3><a href="#">Visit Thailand, Bali And China</a></h3>
                        <span>21 Tháng 12 Năm 2020</span>
                      </div>
                    </div>
                   
                  </div>
                </div>
                <div class="tag-news">
                  <h3>Tags</h3>
                  <div class="list-tag">
                    <a href="#">Miền Bắc</a>
                    <a href="#">Miền Trung</a>
                    <a href="#">Miền nam</a>
                    <a href="#">Biển</a>
                    <a href="#">Núi rừng</a>
                    <a href="#">Cao bằng</a>
                    <a href="#">Sa pa</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
@endsection