<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Golden Tours CMS</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta content="Golden Tours CMS" name="description" />
		<meta content="Golden Tours Team" name="author" />
		<!-- App favicon -->
		<link rel="shortcut icon" href="{{asset('BackEnd/assets/images')}}/logo-den.png" />

		<!-- chartist chart css -->
		<link href="{{asset('BackEnd/assets/libs/chartist')}}/chartist.min.css" rel="stylesheet" />
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

	<body data-topbar="colored">
		<!-- Begin page -->
		<div id="layout-wrapper">
            @include('admin.layouts.header')
			<!-- ==========  Sidebar Start ========== -->
            @include('admin.layouts.menu')
            <!-- Left Sidebar End -->
			<!-- ============================================================== -->
			<!-- Start right Content here -->
			<div class="main-content">
				<div class="page-content">
					<!-- Page-Title -->
					<div class="page-title-box">
						<div class="container-fluid">
							<div class="row align-items-center">
                                @section('Page-Title')

                                @show

								<!-- Chưa biết nên để chức năng gì -->
								<!-- <div class="col-md-4">
                        <div class="float-right d-none d-md-block">
                        <div class="dropdown">
                            <button class="btn btn-light btn-rounded dropdown-toggle" type="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="mdi mdi-settings-outline mr-1"></i> Settings
                            </button>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Separated link</a>
                            </div>
                        </div>
                        </div>
                    </div> -->
							</div>
						</div>
					</div>
					<!-- end page title end breadcrumb -->

					@section('content')

                    @show
					<!-- end page-content-wrapper -->
				</div>
				<!-- End Page-content -->
				<footer class="footer">
					<div class="container-fluid">
						<div class="row">
							<div class="col-sm-12">2020 © Golden Tours.</div>
						</div>
					</div>
				</footer>
			</div>
			<!-- end main content-->
		</div>
		<!-- END layout-wrapper -->

		<!-- JAVASCRIPT -->
		<script src="{{asset('BackEnd/assets/js')}}/libs.js"></script>
		<script src="https://unicons.iconscout.com/release/v2.0.1/script/monochrome/bundle.js"></script>
		<!-- apexcharts -->
		<script src="{{asset('BackEnd/assets/libs/apexcharts')}}/apexcharts.min.js"></script>
		<script src="{{asset('BackEnd/assets/libs/jquery-knob')}}/jquery.knob.min.js"></script>
        <script src="{{asset('BackEnd/assets/libs/tinymce')}}/tinymce.min.js"></script>
		<!-- MAIN JS -->
        <script src="{{asset('BackEnd/assets/js')}}/app.js"></script>
        <script src="{{asset('BackEnd/assets/libs/sweetalert2')}}/sweetalert2.min.js"></script>
        <script src="{{asset('BackEnd/assets/js')}}/login-cms.js"></script>
        <script src="{{asset('BackEnd/assets/libs/alertifyjs/build')}}/alertify.min.js"></script>
	</body>
</html>
