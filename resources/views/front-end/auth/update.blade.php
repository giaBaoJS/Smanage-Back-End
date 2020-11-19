@extends('front-end/layout/layout')
@section('title', 'Cập Nhật Thông Tin Tài Khoản')
@section('wrapper')
<div class="change-psw">
			<div class="container">
				<div class="signin register">
					<h1 class="signin-heading">Cập nhật thông tin tài khoản</h1>
					<form
						action="javscript:voi(0);"
						class="signin-form"
						autocomplete="off"
					>
						<div class="form-group">
							<label for="email" class="form-label">Email</label>
							<input
								type="email"
								class="form-input"
								id="email"
								readonly
								value="kimbao123@gmail.com"
							/>
						</div>
						<div class="form-group">
							<label for="phone" class="form-label">Số điện thoại</label>
							<input
								type="tel"
								pattern="^[0-9-+\s()]*$"
								class="form-input"
								id="phone"
								readonly
								value="0909123123"
							/>
						</div>
						<div class="form-group">
							<label for="name" class="form-label">Tên đầy đủ</label>
							<input
								type="text"
								class="form-input"
								id="name"
								placeholder="Ví dụ: Kim Bảo Đẹp Trai "
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
						<button type="submit" class="form-submit">Cập nhật</button>
					</form>
				</div>
			</div>
		</div>
@endsection