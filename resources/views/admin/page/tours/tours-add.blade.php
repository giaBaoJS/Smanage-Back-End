@extends('admin/layouts/layout')
@section('Page-Title')
<div class="col-md-12">
    <h4 class="page-title mb-1">Thêm Tours</h4>
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item">
            <a href="/admin/dashboard">Trang chủ</a>
        </li>
        <li class="breadcrumb-item active">Thêm Tours</li>
    </ol>
</div>
@endsection
@section('content')
<div class="add-form-tours">
    <div class="row">
        <div class="col-md-4">
            <div class="items  tabl1 active" data-tab="tab1">
                <span>1. Thêm Tour</span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="items tabl2" data-tab="tab2">
                <span>2. Thêm Lịch trình</span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="items tabl3" data-tab="tab3">
                <span>3. Hoàn thành</span>
            </div>
        </div>
    </div>
    <form action="#">
    <div class="group-forms  tabsz tab1 active">
        <h3 class="title-cm">Thông tin tours</h3>
            <div class="form-group">
                <label for="name">Tên Tours</label>
                <input type="text" class="form-control"  placeholder="Nhập tên tour">
            </div>
            <div class="form-group">
                <label for="name">Mô tả</label>
                <input type="text" class="form-control"  placeholder="Nhập mô tả">
            </div>
            <div class="form-group">
                <label for="name">Giờ đi</label>
                <input type="text" class="form-control"  placeholder="Giờ đi">
            </div>
            <div class="form-group">
                <label for="name">Ngày đi</label>
                <input type="date" class="form-control"  placeholder="Nhập Ngày đi">
            </div>
            <div class="form-group">
                <label for="name">Ngày về</label>
                <input type="date" class="form-control"  placeholder="Nhập Ngày về">
            </div>
            <div class="form-group">
                <label for="name">Phương tiện</label>
                <select class="form-control" id="exampleFormControlSelect1">
                    <option value="1">Máy bay</option>
                    <option value="2">Xe Khách</option>
                </select>
            </div>
            <div class="form-group">
                <label for="name">Giá mặc định</label>
                <input type="text" class="form-control"  placeholder="Nhập giá">
            </div>
            <div class="form-group">
                <label for="name">Giá trẻ em</label>
                <input type="text" class="form-control"  placeholder="Nhập giá">
            </div>
            <div class="form-group">
                <label for="name">Giá trẻ em</label>
                <input type="text" class="form-control"  placeholder="Nhập giá">
            </div>
            <div class="form-group">
                <label for="name">Giảm giá coupon </label>
                <select class="form-control" id="exampleFormControlSelect1">
                    <option value="1">SALE20</option>
                    <option value="2">SALE40</option>
                </select>
            </div>
            <div class="form-group">
                <label for="name">Số lượng người</label>
                <input type="number" class="form-control"  placeholder="Nhập tối đa số người tham gia">
            </div>
            <div class="form-group">
                <label>Ảnh đại diện cho tour</label>
                    <div class="custom-file">
                         <input
                          type="file"
                           class="custom-file-input"
                           required
                           />
                         <label class="custom-file-label"
                        >Chọn ảnh đại diện...</label >
                    </div>
            </div>
        <div class="group-my-btn">
        <a class="mybtn"  href="/admin/dashboard">Hủy</a>
        <a class="mybtn tab1"  data-tab="tab2">Tiếp theo</a>
        </div>
    </div>
    <div class="group-forms  tabsz tab2">
        <h3 class="title-cm">Thông tin lịch trình</h3>
            <div class="form-group">
                <label for="name">Số Ngày</label>
                <input type="text" class="form-control"  placeholder="Nhập số ngày">
            </div>
            <div class="form-group">
                <label>Giới thiệu tours</label>
                 <textarea
                    id="elm1"
                    name="area"
                    placeholder="Nhập mô tả"
                    ></textarea>
            </div>
            <div class="form-group">
                <label>Ảnh cho lịch trình</label>
                    <div class="custom-file">
                         <input
                          type="file"
                           class="custom-file-input"
                           required
                           />
                         <label class="custom-file-label"
                        >Chọn ảnh lịch trình...</label >
                    </div>
            </div>
            <div class="group-my-btn">
            <a class="mybtn tab2-ql"  data-tab="tab1">Quay lại</a>
                <a class="mybtn tab2"  data-tab="tab3">Tiếp theo</a>
            </div>
    </div>
    <div class="group-forms  tabsz tab3">
        <h3 class="title-cm">Xác nhận thông tin đầy đủ</h3>
        <p>
           Vui lòng kiểm tra lại đầy đủ thông tin trước khi gửi. Xin cảm ơn !
        </p>
        <div class="group-my-btn">
            <a class="mybtn tab3"  data-tab="tab2">Quay lại</a>
            <button class="mybtn" type="submit">Hoàn Thành</button>
        </div>
    </div>
    </div>
    </form>
</div>
@endsection