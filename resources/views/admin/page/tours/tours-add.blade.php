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
            <div class="items active">
                <span>1. Thêm Tour</span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="items">
                <span>2. Thêm Lịch trình</span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="items">
                <span>3. Hoàn thành</span>
            </div>
        </div>
    </div>
    <form action="#">
    <div class="group-forms">
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
                <label for="name">Số ngày</label>
                <input type="text" class="form-control"  placeholder="Nhập Số ngày">
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
                <label for="name">Ảnh mặc định cho tour</label>
                <input type="file" class="form-control-file" id="exampleFormControlFile1">
            </div>
        <div class="group-my-btn">
            <a href="#">Tiếp theo</a>
        </div>
    </div>
    
    </form>
</div>
@endsection
