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
										<th scope="col">Ghi chú</th>
										<th scope="col">Trạng Thái</th>
										<th scope="col"></th>
									</tr>
								</thead>
								<tbody class="shop_table cart">
                                    @foreach ($bill as $b)
                                    <tr>
                                    <td>{{$b->id_bill}}</td>
										<td>{{$b->created_at}}</td>
										<td>{{$b->total_price}}</td>
                                        <td>{{$b->note}}</td>
                                        @if ($b->status==0)
                                        <td><span class="badge badge-secondary" style="padding: 5px">Chưa xử lý</span></td>
                                        @else
                                        <td><span class="badge badge-success" style="padding: 5px">Đã Hoàn Tất</span></td>
                                        @endif

										<td>
                                        <a href="#/" onclick="showBill({{$b->id_bill}})" class="bill-detail">Xem chi tiết</a>
										</td>
									</tr>
                                    @endforeach

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

					</div>
				</div>
			</div>
		</div>
@endsection
