@extends('front-end/layout/layout')
@section('title', 'Đổi Mật Khẩu')
@section('wrapper')
<div class="change-psw">
			<div class="container">
				<div class="signin">
					<h1 class="signin-heading">Đổi mật khẩu</h1>
					<form
          class="signin-form user-ajax"  action="doi-mat-khau" method="post" novalidate="novalidate"
					>
						<div class="form-group validate-input" data-validate="Mật khẩu cần 8 ký tự trở lên (Hoa, thường, 0-9)">
							<label for="old-password" class="form-label"
								>Nhập mật khẩu cũ (*)</label
							>
								<input
                  type="password"
                  name="psw_old"
									class="form-input validate-form-control"
									id="old-password"
									placeholder="*******"
                  value=""
                />
                <i class="far fa-eye eyes-psw"></i>
						</div>
						<div class="form-group validate-input" data-validate="Mật khẩu cần 8 ký tự trở lên (Hoa, thường, 0-9)">
							<label for="new-password" class="form-label"
								>Nhập mật khẩu mới (*)</label
							>
								<input
                  type="password"
                  name="psw_new_1"
									class="form-input validate-form-control"
									id="new-password"
                  placeholder="*******"
                  value=""
								/>
                <i class="far fa-eye eyes-psw"></i>
						</div>
						<div class="form-group validate-input" data-validate="Mật khẩu cần 8 ký tự trở lên (Hoa, thường, 0-9)">
							<label for="new-password-2" class="form-label"
								>Nhập lại mật khẩu mới (*)</label
							>

								<input
                  type="password"
                  name="psw_new_2"
									class="form-input validate-form-control"
									id="new-password-2"
                  placeholder="*******"
                  value=""
								/>
                <i class="far fa-eye eyes-psw"></i>
						</div>
						<button type="submit" class="form-submit">Thay đổi</button>
					</form>
				</div>
			</div>
		</div>
@endsection