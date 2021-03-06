@extends('front-end/layout/layout')
@section('title', 'Tin Tức')
@section('wrapper')
<div class="wrapper-news">
  <section class="hero-banner">
    <div class="container">
      <h2>Tin tức</h2>
    </div>
  </section>
  <section class="news">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 col-md-8">
          @if(count($showNewsTotal) < 1) <p style="font-weight: bold; font-style: italic">Không tìm thấy tin tức</p>
            @endif
            <div class="news-list">
              @foreach ($showNewsLimit as $new)
              <div class="items">
                <a href="/tin-tuc/dt/{{$new->id_news}}">
                  <img src="{{asset('BackEnd/assets/images/news')}}/{{$new->url_img_news}}" alt="news" /></a>
                <a class="title" href="/tin-tuc/dt/{{$new->id_news}}">{{$new->title}}</a>
                <div class="list-info">
                  <img src="{{asset('BackEnd/assets/images')}}/{{$new->url_avatar}}" alt="icon" />
                  <h4>{{$new->name}}</h4>
                  <span>{{date('d/m/Y H:i:s',strtotime($new->created_at))}}</span>
                  <a href="/tin-tuc/dt/{{$new->id_news}}">
                    {{ count(\App\comment::where('id_news', $new->id_news)->get()) }} Nhận xét
                  </a>
                </div>
                <p>
                  {{$new->short_content}} […]
                </p>
                <a class="readmore" href="/tin-tuc/dt/{{$new->id_news}}">Xem thêm</a>
              </div>
              @endforeach
            </div>
            @if(count($showNewsTotal) > 6)
            <div class='mb-5 text-right'>
              <a href="#" class='pagination-news' style="font-size:20px">Tin cũ hơn</a>
            </div>
            @endif
        </div>
        <div class="col-lg-3 col-md-4">
          <div class="filter-news">
            <form action="/tim-tin-tuc">
              <input type="text" name="keyword" placeholder="Tìm kiếm ..." />
              <button type="submit">
                <i class="fa fa-search"></i>
              </button>
            </form>
            <div class="abouts">
              <h3>Về chúng tôi</h3>
              <img src="{{asset('FrontEnd/assets/images/defaults')}}/travelers.jpg" alt="travels" />
              <p>
                Nam dapibus nisl vitae elit fringilla rutrum. Aenean
                sollicitudin, erat a elementum rutrum, neque sem pretium
                metus, quis mollis nisl nunc et massa
              </p>
            </div>
            <div class="lasted-news">
              <h3>Tin mới nhất</h3>
              <div class="row no-gutters">
                @foreach ($showNewsHighlights as $hl)
                <div class="col-md-4 mb-3">
                  <a href="/tin-tuc/dt/{{$hl->id_news}}">
                    <img src="{{asset('BackEnd/assets/images/news')}}/{{$hl->url_img_news}}" alt="news" />
                  </a>
                </div>
                <div class="tag-news">
                  <h3>Tags</h3>
                  <div class="list-tag">
                      @foreach ($tagTours as $t)
                      <a href="{{ URL::to('/searchByTag/'.$t->tag) }}">{{$t->tag}}</a>
                      @endforeach
                <div class="col-md-8 mb-3">
                  <div class="content">
                    <h3><a href="/tin-tuc/dt/{{$hl->id_news}}">{{$hl->title}}</a></h3>
                    <span>{{date('d',strtotime($hl->created_at))}} Tháng {{date('m',strtotime($hl->created_at))}} Năm {{date('Y',strtotime($hl->created_at))}}</span>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection
