@extends('front-end/layout/layout')
@section('title', 'Quên Mật Khẩu')
@section('wrapper')
<div class="change-psw">
			<div class="container">
				<div class="signin">
					<h1 class="signin-heading">Tìm lại mật khẩu</h1>
					<form
						action="javscript:voi(0);"
						class="signin-form"
						autocomplete="off"
					>
						<div class="form-group">
							<label for="email" class="form-label"
								>Hãy nhập email đã đăng ký với Golden Tour (*)</label
							>
							<input
								type="email"
								class="form-input"
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