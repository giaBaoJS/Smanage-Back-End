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
		<div class="home-btn d-none d-sm-block">
			<!-- Trở về trang chủ nhé -->
			<a href="index.html"
				><i class="mdi mdi-home-variant h2 text-white"></i
			></a>
		</div>

		<div class="account-pages my-5 pt-sm-5">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="text-center mb-5">
							<a href="index.html" class="logo"
								><img src="{{asset('BackEnd/assets/images')}}/logo-trang.png" height="60" alt="logo"
							/></a>
							<h5 class="font-size-16 text-white-50 mb-4">
								Quản lý tours với hệ thống thông minh
							</h5>
						</div>
					</div>
				</div>
				<!-- end row -->

				<div class="row justify-content-center">
					<div class="col-xl-5 col-sm-8">
						<div class="card">
							<div class="card-body p-4">
								<div class="p-2">
									<h5 class="mb-5 text-center">
										Đăng nhập vào Golden Tours CMS
									</h5>
									<form class="form-horizontal" action="index.html">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group form-group-custom mb-4">
													<input
														type="text"
														class="form-control"
														id="username"
														required
													/>
													<label for="username">Tên đăng nhập</label>
												</div>

												<div class="form-group form-group-custom mb-4">
													<input
														type="password"
														class="form-control"
														id="userpassword"
														required
													/>
													<label for="userpassword">Mật khẩu</label>
												</div>

												<div class="row">
													<div class="col-md-6">
														<div class="custom-control custom-checkbox">
															<input
																type="checkbox"
																class="custom-control-input"
																id="customControlInline"
															/>
															<label
																class="custom-control-label"
																for="customControlInline"
																>Ghi nhớ đăng nhập</label
															>
														</div>
													</div>
													<div class="col-md-6">
														<div class="text-md-right mt-3 mt-md-0">
															<a href="auth-recoverpw.html" class="text-muted"
																><i class="mdi mdi-lock"></i> Quên mật khẩu?</a
															>
														</div>
													</div>
												</div>
												<div class="mt-4">
													<button
														class="btn btn-block waves-effect waves-light bg-main-cl white-cl"
														type="submit"
													>
														Đăng nhập
													</button>
												</div>
												<div class="mt-4 text-center">
													<a href="auth-register.html" class="text-muted"
														><i class="mdi mdi-account-circle mr-1"></i> Tạo tài
														khoản mới</a
													>
												</div>
											</div>
										</div>
									</form>
								</div>
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
