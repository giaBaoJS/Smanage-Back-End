@extends('front-end/layout/layout')
@section('title', 'Lịch Sử Đặt Tours')
@section('wrapper')
<div class="history">
  <div class="change-psw">
    <div class="container">
      <div class="signin">
        <h1 class="signin-heading">Lịch sử mua tour</h1>
        <form
          class="signin-form find-bill"  action="tim-lich-su" method="post" novalidate="novalidate"
        >
          <div class="form-group validate-input"  data-validate="Số điện thoại không đúng định dạng">
            <label for="phone" class="form-label">Số điện thoại</label>
            <input
              type="text"
              name="phone"
              class="form-input validate-form-control"
              id="phone"
              maxlength='10'
              placeholder="Nhập số điện thoại của bạn"
              value=""
            />
          </div>
          <button type="submit" class="form-submit">Gửi</button>
        </form>
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
