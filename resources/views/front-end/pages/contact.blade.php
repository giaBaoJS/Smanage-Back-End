@extends('front-end/layout/layout')
@section('title', 'Liên Hệ')
@section('wrapper')
<div class="wraper-contact">
<section class="hero-banner">
        <div class="container">
          <h2>Liên Hệ</h2>
        </div>
      </section>
      <div class="sec-breadcrumb">
					<div class="container">
						<ul class="breadcrumb">
							<li><a href="#">Home</a></li>
							<li><a href="#">Tour</a></li>
							<li class="--active"><a href="#">Tour Detail</a></li>
						</ul>
					</div>
				</div>
      <section class="section-2">
        <div class="container">
          <div class="row">
            <div class="col-lg-5">
              <div class="title-form">
                <h1>Liên Hệ</h1>
                <p>Chúng tôi sẽ phản hồi mail của bạn sớm nhất</p>
              </div>
              <form>
                <div class="form-group">
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Họ và Tên"
                  />
                </div>
                <div class="form-group">
                  <input
                    type="email"
                    class="form-control"
                    id="exampleInputEmail1"
                    aria-describedby="emailHelp"
                    placeholder="Email của bạn"
                  />
                  <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                </div>
                <div class="form-group">
                  <textarea
                    class="form-control"
                    id="exampleFormControlTextarea1"
                    rows="3"
                    value=""
                    placeholder="Để lại lời nhắn..."
                  >
                  </textarea>
                </div>

                <button class="btn btn-primary" type="submit">Gửi Thư</button>
              </form>
            </div>
            <div class="col-lg-7">
              <div class="contact-right position-relative">
                <img
                  class="img-fluid d-lg-block d-md-none"
                  src="{{asset('FrontEnd/assets/images/defaults/images/blog/')}}/bg-contact-1.jpg"
                  alt=""
                />
                <div class="title-contact-right">
                  <h1>Travel Ltd</h1>
                  <ul>
                    <li>Tell. +0904047470</li>
                    <li>Email. Duytrinh2508@gmail.com</li>
                    <li>Đ/C.Công viên phần mềm Quang Trung, Quận 12, TP HCM</li>
                    <li></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section>
        <div class="goog-maps">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.4570662860397!2d106.62434975094074!3d10.852798760707692!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752a272ac90551%3A0xfdedca96b3ea5e15!2zQ8O0bmcgdmnDqm4gUGjhuqduIG3hu4FtIFF1YW5nIFRydW5n!5e0!3m2!1svi!2s!4v1601711560637!5m2!1svi!2s"
            width="100%"
            height="450"
            frameborder="0"
            style="border: 0"
            allowfullscreen=""
            aria-hidden="false"
            tabindex="0"
          ></iframe>
        </div>
      </section>
    </div>
@endsection