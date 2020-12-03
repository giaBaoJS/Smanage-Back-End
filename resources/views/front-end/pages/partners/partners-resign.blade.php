@extends('front-end/layout/layout')
@section('title', 'Cung cấp thông tin')
@section('wrapper')
<div class="change-psw --gb">
			<div class="container">
				<div class="signin">
					<h1 class="signin-heading">Cung cấp thông tin doanh nghiệp</h1>
					<form class="signin-form"	>
						<div class="form-group">
							<label for="name" class="form-label">Tên doanh nghiệp</label>
								<input type="text" name="name"
									class="form-input"
									id="name"
									placeholder="Nhập tên doanh nghiệp"
                                    value=""/>
						</div>
						<div class="form-group">
							<label for="diachi" class="form-label">Địa chỉ doanh nghiệp</label>
								<input type="text" name="diachi"
									class="form-input"
									id="diachi"
									placeholder="Nhập địa chỉ doanh nghiệp"
                                    value=""/>
						</div>
						<div class="form-group">
							<label for="name" class="form-label">Số điện thoại</label>
								<input type="number" name="sdt"
									class="form-input"
									id="sdt"
									placeholder="Nhập số điện thoại"
                                    value=""/>
						</div>
						<div class="form-group">
							<label for="name" class="form-label">Email</label>
								<input type="email" name="email"
									class="form-input"
									id="email"
									placeholder="Nhập email"
                                    value=""/>
						</div>
                        <div class="form-group">
							<label for="diachi" class="form-label">Slogan</label>
								<input type="text" name="slogan"
									class="form-input"
									id="slogan"
									placeholder="Nhập câu slogan đặc trưng"
                                    value=""/>
						</div>
						<button type="submit" class="form-submit">Xác nhận</button>
					</form>
				</div>
			</div>
            <div class="image-ol">
                <div class="img1"><img src="{{asset('FrontEnd/assets/images/defaults')}}/rs1.png" alt="img"></div>
                <div class="img2"><img src="{{asset('FrontEnd/assets/images/defaults')}}/rs2.png" alt="img"></div>
                <div class="img3"><img src="{{asset('FrontEnd/assets/images/defaults')}}/partner.png" alt="img"></div>
            </div>
</div>
@endsection