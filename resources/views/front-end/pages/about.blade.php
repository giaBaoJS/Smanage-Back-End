@extends('front-end/layout/layout')
@section('title', 'Giới Thiệu')
@section('wrapper')
<div class="wraper-about-us">
			<section class="hero-banner">
				<div class="container">
					<h2>Giới thiệu</h2>
				</div>
			</section>
			<div class="sec-breadcrumb">
				<div class="container">
					<ul class="breadcrumb">
						<li><a href="{{url('/')}}">Trang chủ</a></li>
						<li class="--active"><a href="{{url('/gioi-thieu')}}" >Giới thiệu</a></li>
					</ul>
				</div>
			</div>
			<section class="section-1">
				<div class="container">
					<div class="row">
						<div class="col-12 col-md-6">
							<div class="content-1">
								<img
									class="img-fluid"
									src="{{asset('FrontEnd/assets/images/defaults')}}/about-us/about_1.jpg"
									alt=""
								/>
								<div class="box-text">
									<div class="sub-title">
										<h1>Câu Chuyện Của Chúng Tôi</h1>
									</div>
									<div class="text">
										<p>
											Mục đích của chúng tôi là nâng cao chất lượng cuộc sống và
											góp phần vào một tương lai khỏe mạnh hơn. Chúng tôi mong
											muốn tạo ra một thế giới tốt đẹp và khỏe mạnh hơn. Chúng
											tôi cũng mong muốn truyền cảm hứng cho mọi người sống lành
											mạnh hơn. Đây là cách chúng tôi đóng góp cho xã hội trong
											khi vẫn đảm bảo sự thành công lâu dài trong kinh doanh của
											Golden-Tours.
										</p>
									</div>
								</div>
							</div>
						</div>
						<div class="col-12 col-md-6">
							<div class="content-1">
								<img
									class="img-fluid"
									src="{{asset('FrontEnd/assets/images/defaults')}}/about-us/about_2.png"
									alt=""
								/>
								<div class="box-text">
									<div class="sub-title">
										<h1>Nhiệm vụ của chúng tôi</h1>
									</div>
									<div class="text">
										<p>
											Đảm bảo những giá trị lợi ích của khách hàng cũng như thỏa
											mãn nhu cầu về an toàn trong ngành dịch vụ du lịch khi
											khách hàng sử dụng sản phẩm của Savavotourist.Khai thác
											tối đa sức mạnh tổng hợp từ các lĩnh vực hoạt động chính,
											góp phần phát triển du lịch Việt Nam lên tầm cao mới.
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section class="section-2">
				<div class="container">
					<div class="row">
						<div class="col-lg-3 col-md-6">
							<div class="tpk_card">
								<div class="front">
									<h1>
										<span> 100+ <br /></span>
										đổi tác
									</h1>
								</div>
								<div class="back">
									<div class="details">
										<p>
											Lorem ipsum dolor sit amet consectetur adipisicing elit.
											Sed, minima ipsum. Necessitatibus voluptatem numquam
										</p>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6">
							<div class="tpk_card">
								<div class="front">
									<h1>
										<span> 2k+ <br /></span>
										đặc trưng
									</h1>
								</div>
								<div class="back">
									<div class="details">
										<p>
											Lorem ipsum dolor sit amet consectetur adipisicing elit.
											Sed, minima ipsum. Necessitatibus voluptatem numquam
										</p>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6">
							<div class="tpk_card">
								<div class="front">
									<h1>
										<span> 300+ <br /></span>
										điểm đến
									</h1>
								</div>
								<div class="back">
									<div class="details">
										<p>
											Lorem ipsum dolor sit amet consectetur adipisicing elit.
											Sed, minima ipsum. Necessitatibus voluptatem numquam
										</p>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6">
							<div class="tpk_card">
								<div class="front">
									<h1>
										<span> 40k+ <br /></span>
										lượt booking
									</h1>
								</div>
								<div class="back">
									<div class="details">
										<p>
											Lorem ipsum dolor sit amet consectetur adipisicing elit.
											Sed, minima ipsum. Necessitatibus voluptatem numquam
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section class="section-3">
				<div class="container">
					<div class="content">
						<div class="row">
							<h2>
								“Một khi bị nhiễm niềm đam mê du lịch, chẳng có phương thuốc nào
								có thể hóa giải, và tôi biết rằng tôi sẽ hạnh phúc khi có căn
								bệnh này cho đến hết cuộc đời.”
							</h2>
						</div>
					</div>
				</div>
			</section>
			<section class="list-image">
				<div class="swiper-container4">
					<div class="swiper-wrapper">
						<div class="swiper-slide">
							<img
								class="img-full w-100"
								src="{{asset('FrontEnd/assets/images/defaults')}}/about1.jpg"
								alt="image"
							/>
						</div>
						<div class="swiper-slide">
							<img
								class="img-full w-100"
								src="{{asset('FrontEnd/assets/images/defaults')}}/about2.jpg"
								alt="image"
							/>
						</div>
						<div class="swiper-slide">
							<img
								class="img-full w-100"
								src="{{asset('FrontEnd/assets/images/defaults')}}/about3.jpg"
								alt="image"
							/>
						</div>
						<div class="swiper-slide">
							<img
								class="img-full w-100"
								src="{{asset('FrontEnd/assets/images/defaults')}}/about4.jpg"
								alt="image"
							/>
						</div>
					</div>
					<div class="swiper-pagination4"></div>
				</div>
			</section>
			<section class="our-team">
				<h2 class="title">Thành Viên Nhóm</h2>
				<div class="container">
					<div class="row">
						<div class="col-lg col-md-6">
							<div class="describe">
								<img src="{{asset('FrontEnd/assets/images/defaults')}}/bao.jpg" alt="ava" />
								<div class="content">
									<h3>Nguyễn Huỳnh Gia Bảo</h3>
									<p>PS08844</p>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-6">
							<div class="describe">
								<img src="{{asset('FrontEnd/assets/images/defaults')}}/kimbeo.jpg" alt="ava" />
								<div class="content">
									<h3>Lê Kim Bảo</h3>
									<p>PS08844</p>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-6">
							<div class="describe">
								<img src="{{asset('FrontEnd/assets/images/defaults')}}/phuoc.jpg" alt="ava" />
								<div class="content">
									<h3>Nguyễn Đại Phước</h3>
									<p>PS08844</p>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-6">
							<div class="describe">
								<img src="{{asset('FrontEnd/assets/images/defaults')}}/linhduy.jpg" alt="ava" />
								<div class="content">
									<h3>Trịnh Linh Duy</h3>
									<p>PS08844</p>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-6">
							<div class="describe">
								<img src="{{asset('FrontEnd/assets/images/defaults')}}/nhat.jpg" alt="ava" />
								<div class="content">
									<h3>Nguyễn Hồng Nhật</h3>
									<p>PS08844</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
@endsection