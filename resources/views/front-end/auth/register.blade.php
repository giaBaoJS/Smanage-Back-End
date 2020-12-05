<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
		<title>Đăng ký</title>
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
						class="signin-form user-ajax"  action="dang-ky" method="post" novalidate="novalidate"
          >
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="form-group validate-input" data-validate="Họ và Tên không được để trống">
							<label for="name" class="form-label">Tên đầy đủ (*)</label>
							<input
								type="text"
								class="form-input validate-form-control"
                id="name"
                name="name"
								placeholder="Ví dụ: Kim Bảo Đẹp Trai "
							/>
						</div>
						<div class="form-group validate-input"  data-validate="Email không đúng định dạng">
							<label for="email" class="form-label">Email (*)</label>
							<input
								type="email"
								class="form-input validate-form-control"
                id="email"
                name='email'
								placeholder="Ví dụ: goldentour@gmail.com"
							/>
						</div>
						<div class="form-group validate-input"  data-validate="Mật khẩu phải từ 8 ký tự (Hoa, thường, 0-9)">
							<label for="password" class="form-label">Mật khẩu (*)</label>

								<input
									type="password"
									class="form-input validate-form-control"
                  id="password"
                  name='psw_new_1'
									placeholder="*******"
								/>
									<i class="fas fa-eye eyes-psw"></i>
						</div>
						<div class="form-group validate-input"  data-validate="Mật khẩu phải từ 8 ký tự (Hoa, thường, 0-9)">
							<label for="password-2" class="form-label"
								>Nhập lại mật khẩu (*)</label
							>
								<input
									type="password"
									class="form-input validate-form-control"
                  id="password-2"
                  name='psw_new_2'
									placeholder="*******"
								/>
									<i class="fas fa-eye eyes-psw"></i>
						</div>
						<div class="form-group validate-input"  data-validate="Số điện thoại không đúng định dạng">
							<label for="phone" class="form-label">Số điện thoại (*)</label>
							<input
								type="text"
                class="form-input validate-form-control"
                maxlength="10"
                id="phone"
                name="phone"
								placeholder="0909123123"
							/>
            </div>
            <div class="form-group validate-input">
              <label for="address" class="form-label">Giới tính</label>
              <select class='form-control validate-form-control' name="gender" id="">
                <option value="0">Hãy chọn giới tính</option>
                <option value="1">Nam</option>
                <option value="2">Nữ</option>
                <option value="0">Không công khai</option>
              </select>
			</div>
						<div class="form-group validate-input"  data-validate="Địa chỉ không được để trống" style="grid-column: span 2">
							<label for="address" class="form-label">Địa chỉ (*)</label>
							<input
								type="text"
								class="form-input validate-form-control"
                id="address"
                name="address"
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
    <script src="{{asset('FrontEnd/assets/libs/js')}}/sweetalert.min.js" ></script>
    <script src="{{asset('FrontEnd/assets/js')}}/validate.js"></script>
    <script src="{{asset('FrontEnd/assets/js')}}/api.js"></script>
	</body>
</html>
