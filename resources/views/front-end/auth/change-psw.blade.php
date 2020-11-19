@extends('front-end/layout/layout')
@section('title', 'Đổi Mật Khẩu')
@section('wrapper')
<div class="change-psw">
			<div class="container">
				<div class="signin">
					<h1 class="signin-heading">Đổi mật khẩu</h1>
					<form
						action="javscript:voi(0);"
						class="signin-form"
						autocomplete="off"
					>
						<div class="form-group">
							<label for="old-password" class="form-label"
								>Nhập mật khẩu cũ (*)</label
							>
							<div class="form-psw">
								<input
									type="password"
									class="form-input"
									id="old-password"
									placeholder="*******"
								/>
								<span class="eyes-psw">
									<i class="far fa-eye"></i>
								</span>
							</div>
						</div>
						<div class="form-group">
							<label for="new-password" class="form-label"
								>Nhập mật khẩu mới (*)</label
							>
							<div class="form-psw">
								<input
									type="password"
									class="form-input"
									id="new-password"
									placeholder="*******"
								/>
								<span class="eyes-psw">
									<i class="far fa-eye"></i>
								</span>
							</div>
						</div>
						<div class="form-group">
							<label for="new-password-2" class="form-label"
								>Nhập lại mật khẩu mới (*)</label
							>

							<div class="form-psw">
								<input
									type="password"
									class="form-input"
									id="new-password-2"
									placeholder="*******"
								/>
								<span class="eyes-psw">
									<i class="far fa-eye"></i>
								</span>
							</div>
						</div>
						<button type="submit" class="form-submit">Thay đổi</button>
					</form>
				</div>
			</div>
		</div>
@endsection