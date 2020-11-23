@extends('front-end/layout/layout')
@section('title', 'Quên Mật Khẩu')
@section('wrapper')
<div class="change-psw">
			<div class="container">
				<div class="signin">
					<h1 class="signin-heading">Tìm lại mật khẩu</h1>
					<form
            class="signin-form user-ajax"  action="quen-mat-khau" method="post" novalidate="novalidate"
					>
						<div class="form-group validate-input" data-validate="Email không đúng định dạng">
							<label for="email" class="form-label"
								>Hãy nhập email đã đăng ký với Golden Tour (*)</label
							>
							<input
                type="email"
                name='email'
								class="form-input validate-form-control"
								id="email"
								placeholder="Ví dụ: goldentour@gmail.com"
							/>
						</div>
						<button type="submit" class="form-submit">Gửi</button>
					</form>
				</div>
			</div>
		</div>
@endsection