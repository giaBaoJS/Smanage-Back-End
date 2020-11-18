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
                  <li class="list-inline-item">
                    <button style="display: block;
                    color: #4f8a8b !important;
                    background-color: rgba(48, 81, 211, 0.1);
                    border: 1px solid rgba(48, 81, 211, 0.1);
                    padding: 0 15px;
                    margin: 5px 3px;
                    cursor: pointer;
                    line-height: 34px;
                    border-radius: 4px;
                    -webkit-transition: all 0.4s;
                    transition: all 0.4s;"
                    class="categories" type="button" data-toggle="modal" data-target=".bs-example-modal-lg">
                        <svg style="color: green;font-size: 20px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="1em"><path class="uim-primary" d="M19.96484,13h-16a1,1,0,0,1,0-2h16a1,1,0,0,1,0,2Z"></path><path class="uim-primary" d="M11.96484,21a.99974.99974,0,0,1-1-1V4a1,1,0,0,1,2,0V20A.99973.99973,0,0,1,11.96484,21Z"></path><circle cx="3.964" cy="16" r="1" class="uim-tertiary"></circle><circle cx="3.964" cy="20" r="1" class="uim-tertiary"></circle><circle cx="3.964" cy="8" r="1" class="uim-tertiary"></circle><circle cx="3.964" cy="4" r="1" class="uim-tertiary"></circle><circle cx="7.964" cy="4" r="1" class="uim-tertiary"></circle><circle cx="15.964" cy="4" r="1" class="uim-tertiary"></circle><circle cx="7.964" cy="20" r="1" class="uim-tertiary"></circle><circle cx="15.964" cy="20" r="1" class="uim-tertiary"></circle><circle cx="19.964" cy="16" r="1" class="uim-tertiary"></circle><circle cx="19.964" cy="20" r="1" class="uim-tertiary"></circle><circle cx="19.964" cy="8" r="1" class="uim-tertiary"></circle><circle cx="19.964" cy="4" r="1" class="uim-tertiary"></circle></svg>
                    </button>
                  </li>
                </ul>
              </div>
              <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title mt-0" id="myLargeModalLabel">Thêm hình ảnh thư viện</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="row custom-validation" action="/admin/addgallery"  method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group col-xl-6">
                                    <label>Nội dung</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        placeholder="Tên hình"
                                        id="title"
                                        name="title"
                                        required
                                    />
                                </div>
                                <div class="form-group col-xl-6">
                                    <label>Chọn miền</label>
                                    <select class="custom-select" required="" name="id_mien" id="mien" value=''>
                                        <option value="">Chọn miền</option>
                                        @foreach ($showmien as $m)
                                        <option value="{{$m->id_mien}}">{{$m->name_mien}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-xl-12">
                                    <label>Hình ảnh</label>
                                    <div class="custom-file">
                                        <input
                                            type="file"
                                            class="custom-file-input"
                                            required
                                            name="url_img_gallery"
                                        />
                                        <label class="custom-file-label"
                                            >Chọn ảnh...</label
                                        >
                                    </div>
                                </div>
                                <div class="form-group col-xl-12 mb-0">
                                    <div>
                                        <button type="submit" class="btn waves-effect waves-light mr-1 white-cl bg-main-cl">
                                            Thêm
                                        </button>
                                        <button type="reset" class="btn btn-secondary waves-effect">
                                            Hủy
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
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
                        <div>
                            <a href="#" title="Edit">
                                <i class="mdi mdi-pencil"></i>
                            </a>
                            <a href="#" onclick="deleteGallery({{$g->id_gallery}})">
                                <i class="mdi mdi-trash-can"></i>
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
