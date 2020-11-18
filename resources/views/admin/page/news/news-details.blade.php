@extends('admin/layouts/layout')
@section('Page-Title')
<div class="col-md-12">
    <h4 class="page-title mb-1">Tin tức chi tiết</h4>
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item">
            <a href="/admin/dashboard">Trang chủ</a>
        </li>
        <li class="breadcrumb-item active">Tin tức chi tiết</li>
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
                        <!DOCTYPE html>
                            <html lang="en">
                            <head>
                                <meta charset="UTF-8" />
                                <meta name="viewport" content="width=device-width, initial-scale=1.0" />
                                <link
                                rel="stylesheet"
                                href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"
                                />
                                <link rel="stylesheet" href="{{asset('FrontEnd/assets/libs/css')}}/bootstrap.min.css" />
                                <link rel="stylesheet" href="{{asset('FrontEnd/assets/css')}}/font.css" />
                                <link rel="stylesheet" href="{{asset('FrontEnd/assets/css')}}/main-detail.css" />
                            </head>
                            <body>

                                <div class="wrapper-detail-news">
                                <section class="hero-banner">
                                    <div class="container">
                                    <h2>Tin tức</h2>
                                    </div>
                                </section>
                                <section class="detail-news">
                                    <div class="container">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12">
                                        <div class="news-list">
                                            <div class="items">
                                            <a href="#">
                                                <img
                                            src="{{asset('BackEnd/assets/images/news')}}/{{$showOneNews->url_img_news}}"
                                                alt="news"
                                            /></a>
                                            <h3 class="title">{{$showOneNews->title}}</h3>
                                            <div class="list-info">
                                                <span>{{date('d/m/Y',strtotime($showOneNews->created_at))}}</span>
                                                <a>0 Nhận xét</a>
                                            </div>
                                            {!!$showOneNews->content!!}
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                </section>
                                </div>
                                <script src="{{asset('FrontEnd/assets/libs/js')}}/jquery-3.5.1.min.js"></script>
                                <script src="{{asset('FrontEnd/assets/libs/js')}}/bootstrap.min.js"></script>
                                <script src="https://kit.fontawesome.com/a076d05399.js"></script>
                                <script src="{{asset('FrontEnd/assets/libs/js')}}/jquery.mousewheel.min.js"></script>
                                <script src="{{asset('FrontEnd/assets/js')}}/main.js"></script>
                            </body>
                            </html>

                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div>
    <!-- end container-fluid -->
</div>
@endsection
