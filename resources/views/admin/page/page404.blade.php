<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Golden Tours CMS</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta content="Golden Tours CMS" name="description" />
		<meta content="Golden Tours Team" name="author" />
		<!-- App favicon -->
		<link rel="shortcut icon" href="{{asset('BackEnd/assets/images')}}/favicon.ico" />

		<!-- Bootstrap Css -->
		<link
			href="{{asset('BackEnd/assets/css')}}/bootstrap.min.css"
			rel="stylesheet"
			type="text/css"
		/>
		<!-- Icons Css -->
		<link href="{{asset('BackEnd/assets/css')}}/icons.min.css" rel="stylesheet" type="text/css" />
		<!-- App Css-->
		<link href="{{asset('BackEnd/assets/css')}}/app.css" rel="stylesheet" type="text/css" />
	</head>

	<body class="bg-pattern">
		<div class="account-pages my-5 pt-sm-5">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-12">
						<div class="mt-4 text-center">
							<div class="row justify-content-center">
								<div class="col-md-4 col-6">
									<img
										src="{{asset('BackEnd/assets/images')}}/error-img.png"
										alt=""
										class="img-fluid mx-auto d-block"
									/>
								</div>
							</div>

							<h1 class="mt-5 text-uppercase text-white font-weight-bold mb-3">
								Xin lỗi, hiện tại không tìm thấy trang bạn yêu cầu
							</h1>
							<h5 class="text-white-50">
								Chúng tôi sẽ trở lại trong thời gian sớm nhất
							</h5>
							<div class="mt-5">
								<a
									class="btn waves-effect waves-light bg-second-cl main-cl font-weight-bold"
									href="index.html"
									>Trở về trang chủ</a
								>
							</div>
						</div>
					</div>
				</div>
				<!-- end row -->
			</div>
		</div>
		<!-- end Account pages -->

		<!-- JAVASCRIPT -->
		<script src="{{asset('BackEnd/assets/libs/jquery')}}/jquery.min.js"></script>
		<script src="{{asset('BackEnd/assets/libs/bootstrap/js')}}/bootstrap.bundle.min.js"></script>
		<script src="{{asset('BackEnd/assets/libs/metismenu')}}/metisMenu.min.js"></script>
		<script src="{{asset('BackEnd/assets/libs/simplebar')}}/simplebar.min.js"></script>
    <script src="{{asset('BackEnd/assets/libs/node-waves')}}/waves.min.js"></script>

		<script src="https://unicons.iconscout.com/release/v2.0.1/script/monochrome/bundle.js"></script>

		<script src="{{asset('BackEnd/assets/js')}}/app.js"></script>
	</body>
</html>
