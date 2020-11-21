<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Golden Tours CMS</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta content="Golden Tours CMS" name="description" />
		<meta content="Golden Tours Team" name="author" />
		<!-- App favicon -->
		<link rel="shortcut icon" href="{{asset('favicon.ico')}}" />

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
		<div class="home-btn d-none d-sm-block">
			<!-- Trở về trang chủ nhé -->
			<a href="/"
				><i class="mdi mdi-home-variant h2 text-white"></i
			></a>
		</div>

		<div class="account-pages my-5 pt-sm-5">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="text-center mb-5">
							<a href="/admin" class="logo"
								><img src="{{asset('BackEnd/assets/images')}}/logo-chu-den.png" height="90" alt="logo"
							/></a>
							<h5 class="font-size-16 text-white-50 mb-4">
								Quản lý tours với hệ thống thông minh
							</h5>
						</div>
					</div>
				</div>
				<!-- end row -->
                @section('content-auth')

                @show

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
        <script src="{{asset('BackEnd/assets/js')}}/login-cms.js"></script>
        <script src="{{asset('BackEnd/assets/js')}}/app.js"></script>
        <script src="{{asset('BackEnd/assets/libs/alertifyjs/build')}}/alertify.min.js"></script>
	</body>
</html>
