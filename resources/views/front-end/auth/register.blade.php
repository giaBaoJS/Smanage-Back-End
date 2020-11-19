<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Đăng nhập</title>
		<link
			rel="icon"
			type="image/png"
			href="{{asset('favicon.ico')}}/"
		/>
		<link
			rel="stylesheet"
			href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"
		/>
		<script src="https://kit.fontawesome.com/a076d05399.js"></script>
		<link rel="stylesheet" href="{{asset('FrontEnd/assets/libs/css/')}}/bootstrap.min.css" />
		<link rel="stylesheet" href="{{asset('FrontEnd/assets/css')}}/font.css" />
		<link rel="stylesheet" href="{{asset('FrontEnd/assets/css')}}/main.css" />
	</head>
	<body>
  <div class="auth">
			<!-- Design belong to: https://dribbble.com/chouaibblgn45 -->
			<div class="container">
				<div class="signin register">
					<div class="auth__home-btn">
						<a href="{{ url('/') }}">
							<i class="fa fa-home" aria-hidden="true"></i>
						</a>
					</div>
					<h1 class="signin-heading">Đăng ký</h1>
					<a href="#" class="signin-google">
						<i class="fab fa-google signin-google-icon"></i>
						<span class="signin-google-text">Đăng ký với Google</span>
					</a>
					<div class="signin-or">
						<span class="signin-or-text">Hoặc</span>
					</div>
					<form
						action="javscript:voi(0);"
						class="signin-form"
						autocomplete="off"
					>
						<div class="form-group">
							<label for="name" class="form-label">Tên đầy đủ (*)</label>
							<input
								type="text"
								class="form-input"
								id="name"
								placeholder="Ví dụ: Kim Bảo Đẹp Trai "
							/>
						</div>
						<div class="form-group">
							<label for="email" class="form-label">Email (*)</label>
							<input
								type="email"
								class="form-input"
								id="email"
								placeholder="Ví dụ: goldentour@gmail.com"
							/>
						</div>
						<div class="form-group">
							<label for="password" class="form-label">Mật khẩu (*)</label>

							<div class="form-psw">
								<input
									type="password"
									class="form-input"
									id="password"
									placeholder="*******"
								/>
								<span class="eyes-psw">
									<i class="far fa-eye"></i>
								</span>
							</div>
						</div>
						<div class="form-group">
							<label for="password-2" class="form-label"
								>Nhập lại mật khẩu (*)</label
							>

							<div class="form-psw">
								<input
									type="password"
									class="form-input"
									id="password-2"
									placeholder="*******"
								/>
								<span class="eyes-psw">
									<i class="far fa-eye"></i>
								</span>
							</div>
						</div>
						<div class="form-group">
							<label for="phone" class="form-label">Số điện thoại</label>
							<input
								type="tel"
								pattern="^[0-9-+\s()]*$"
								class="form-input"
								id="phone"
								placeholder="0909123123"
							/>
						</div>
						<div class="form-group">
							<label for="address" class="form-label">Địa chỉ</label>
							<input
								type="text"
								class="form-input"
								id="address"
								placeholder="Địa chỉ"
							/>
						</div>
						<button type="submit" class="form-submit">Đăng ký</button>
					</form>
					<p class="signin-already">
						Bạn đã có tài khoản?
						<a href="{{ url('dang-nhap') }}" class="signin-already-link">Đăng nhập ngay nào</a>
					</p>
				</div>
			</div>
		</div>
     <script src="{{asset('FrontEnd/assets/libs/js')}}/jquery-3.5.1.min.js"></script>
		<!--<script src="{{asset('FrontEnd/assets/libs/js')}}/bootstrap.min.js"></script>
		<script src="{{asset('FrontEnd/assets/libs/js')}}/jquery.mousewheel.min.js"></script>
		<script src="{{asset('FrontEnd/assets/libs/js')}}/swiper-bundle.js"></script>
		<script src="{{asset('FrontEnd/assets/libs/js')}}/swiper-bundle.min.js"></script>
		<script src="{{asset('FrontEnd/assets/libs/js')}}/flatpickr.js"></script>
		<script src="https://npmcdn.com/flatpickr/dist/l10n/vn.js"></script> -->
    <script src="{{asset('FrontEnd/assets/js/')}}/main.js"></script>
    
	</body>
</html>
