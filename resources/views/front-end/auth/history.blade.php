@extends('front-end/layout/layout')
@section('title', 'Lịch Sử Đặt Tours')
@section('wrapper')
<div class="history">
			<div class="container">
				<div class="history__wrap">
					<h2>Lịch sử mua tour</h2>
					<div class="h_inner">
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th scope="col">Mã HĐ</th>
										<th scope="col">Thời Gian</th>
										<th scope="col">Tổng</th>
										<th scope="col">Trạng Thái</th>
										<th scope="col"></th>
									</tr>
								</thead>
								<tbody class="shop_table cart">
									<tr>
										<td>1</td>
										<td>12-11-2020 22:48:11</td>
										<td>25.800.000 VNĐ</td>
										<td>Đã Hoàn Tất</td>
										<td>
											<a href="#/" class="bill-detail">Xem chi tiết</a>
										</td>
									</tr>
									<tr>
										<td>3</td>
										<td>12-11-2020 00:23:33</td>
										<td>13.035.000 VNĐ</td>
										<td>Chờ Xác Nhận</td>
										<td>
											<a href="#/" class="bill-detail">Xem chi tiết</a>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
    </div>
    <div
			id="modal-bill"
			class="modal fade bs-example-modal-lg"
			style="display: none"
			aria-hidden="true"
		>
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title" id="modal-title-bill">Hóa đơn chi tiết</h4>

						<button
							type="button"
							class="close"
							data-dismiss="modal"
							aria-hidden="true"
						>
							×
						</button>
					</div>
					<div class="modal-body">
						<div>
							<p>Tên tour: <span>Du lịch cùng trai đẹp Kim Bảo</span></p>
							<p>Thời gian: <span>12-11-2020 22:48:11</span></p>
							<p>Số lượng: <span>4</span> người lớn / <span>2</span> trẻ em</p>
						</div>
						<table id="table-bill" class="table table-bordered">
							<thead>
								<tr>
									<td>Tên thành viên</td>
									<td>Giới tính</td>
									<td>Giá vé</td>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Kim Bảo</td>
									<td>Nam</td>
									<td>12.900.000 VNĐ</td>
								</tr>
								<tr>
									<td>Kim Bảo</td>
									<td>Nam</td>
									<td>12.900.000 VNĐ</td>
								</tr>
								<tr>
									<td>Kim Bảo</td>
									<td>Nam</td>
									<td>12.900.000 VNĐ</td>
								</tr>
								<tr>
									<td>Kim Bảo</td>
									<td>Nam</td>
									<td>12.900.000 VNĐ</td>
								</tr>
							</tbody>
							<tfoot>
								<tr>
									<td colspan="2" style="text-align: right">Tổng Giá vé</td>
									<td><span>20.000.000 VNĐ</span></td>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
			</div>
		</div>
@endsection