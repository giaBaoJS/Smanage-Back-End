<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
		<title>Đăng nhập</title>
		<link
			rel="icon"
			type="image/png"
			href="{{asset('favicon.ico')}}/"
		/>
		<link rel="stylesheet" href="{{asset('FrontEnd/assets/libs/css/')}}/fontawesome.min.css" />
		<link rel="stylesheet" href="{{asset('FrontEnd/assets/libs/css/')}}/bootstrap.min.css" />
		<link rel="stylesheet" href="{{asset('FrontEnd/assets/css')}}/font.css" />
		<link rel="stylesheet" href="{{asset('FrontEnd/assets/css')}}/main.css" />
	</head>
	<body>
    <div class="loading"></div>
		<div class="auth">
			<!-- Design belong to: https://dribbble.com/chouaibblgn45 -->
			<div class="container">
				<div class="signin">
					<div class="auth__home-btn">
						<a href="{{ url('/') }}">
							<i class="fa fa-home" aria-hidden="true"></i>
						</a>
					</div>
					<h1 class="signin-heading">Đăng nhập</h1>
					<a href="#" class="signin-google">
						<i class="fab fa-google signin-google-icon"></i>
						<span class="signin-google-text">Đăng nhập với Google</span>
					</a>
					<div class="signin-or">
						<span class="signin-or-text">Hoặc</span>
					</div>

					<form
						class="signin-form user-ajax"  action="dang-nhap" method="post" novalidate="novalidate"
          >
          <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
						<div class="form-group validate-input" data-validate="Email không đúng định dạng">
							<label for="email" class="form-label">Email</label>
							<input
                type="email"
                name='email'
								class="form-input validate-form-control"
								id="email"
                placeholder="Eg: goldentour@gmail.com"
                value=""
							/>
						</div>
						<div class="form-group validate-input" data-validate="Mật khẩu phải từ 8 ký tự (Hoa, thường, 0-9)">
							<label for="password" class="form-label">Mật khẩu</label>
              <input
                type="password"
                name='psw'
                class="form-input validate-form-control"
                id="password"
                placeholder="*******"
                value=""
              />
              <i class="fas fa-eye eyes-psw"></i>
						</div>
						<div class="form-forget">
							<a href="{{ url('quen-mat-khau') }}">Quên mật khẩu?</a>
						</div>
						<button type="submit" class="form-submit">Đăng nhập</button>
					</form>
					<p class="signin-already">
						Bạn chưa đã có tài khoản?
						<a href="{{ url('dang-ky') }}" class="signin-already-link">Đăng ký ngay nào</a>
					</p>
				</div>
			</div>
    </div>
    <script src="{{asset('FrontEnd/assets/libs/js')}}/jquery-3.5.1.min.js"></script>
    <script src="{{asset('FrontEnd/assets/libs/js')}}/sweetalert.min.js" ></script>
    <script src="{{asset('FrontEnd/assets/js')}}/validate.js" ></script>
    <script src="{{asset('FrontEnd/assets/js')}}/api.js" ></script>
	</body>
</html>
