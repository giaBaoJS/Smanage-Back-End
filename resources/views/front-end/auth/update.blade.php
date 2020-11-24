@extends('front-end/layout/layout')
@section('title', 'Cập Nhật Thông Tin Tài Khoản')
@section('wrapper')
<div class="change-psw">
			<div class="container">
				<div class="signin register">
					<h1 class="signin-heading">Cập nhật thông tin tài khoản</h1>
					<form
						class="signin-form user-ajax"  action="cap-nhat-tai-khoan" method="post" novalidate="novalidate"
					>
						<div class="form-group">
							<label for="email" class="form-label">Email</label>
							<input
								type="email"
                name="email"
								class="form-input"
								id="email"
								readonly
								value="{{$user->email}}"
							/>
						</div>
						<div class="form-group validate-input"  data-validate="Số điện thoại không đúng định dạng">
							<label for="phone" class="form-label">Số điện thoại</label>
							<input
								type="text"
                name="phone"
								class="form-input validate-form-control"
								id="phone"
                maxlength='10'
								value="{{$user->phone}}"
							/>
						</div>
						<div class="form-group  validate-input"  data-validate="Số điện thoại không đúng định dạng">
							<label for="name" class="form-label">Tên đầy đủ</label>
							<input
								type="text"
                name="name"
								class="form-input validate-form-control"
								id="name"
								placeholder="Ví dụ: Kim Bảo Đẹp Trai "
                value="{{$user->name}}"
							/>
						</div>

						<div class="form-group  validate-input"  data-validate="Số điện thoại không đúng định dạng">
							<label for="address" class="form-label">Địa chỉ</label>
							<input
								type="text"
                name="address"
								class="form-input validate-form-control"
								id="address"
								placeholder="Địa chỉ"
                value="{{$user->address}}"
              />
						</div>
						<button type="submit" class="form-submit">Cập nhật</button>
					</form>
				</div>
			</div>
		</div>
@endsection