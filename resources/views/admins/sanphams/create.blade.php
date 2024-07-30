@extends('layouts.admin')

@section('title')
{{$title}}
@endsection

@section('css')
<link href="{{ asset('assets/admin/libs/quill/quill.snow.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/admin/libs/quill/quill.bubble.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="content">

    <!-- Start Content-->
    <div class="container-xxl">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Thêm Danh Mục Sản Phẩm</h4>
            </div>
        </div>

        <!-- start row -->
        <div class="row">
            <div class="col-md-12 col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Thông Tin Danh Mục Sản Phẩm</h5>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <form action="{{route('admins.sanpham.store')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="simpleinput" class="form-label">Tên Sản Phẩm</label>
                                        <input type="text" id="simpleinput" class="form-control" name="ten_san_pham">
                                    </div>
                                    <div class="mb-3">
                                        <label for="simpleinput" class="form-label">Mã Sản Phẩm</label>
                                        <input type="text" id="simpleinput" class="form-control" name="ma_san_pham">
                                    </div>
                                    <div class="mb-3">
                                        <label for="example-disable" class="form-label">Tên Danh Mục</label>
                                        <select class="form-select" id="example-select" name="danh_muc_id">
                                            @foreach($listDanhMuc as $DanhMuc)
                                            <option value="{{$DanhMuc ->id}}">
                                                {{$DanhMuc ->ten_danh_muc}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="simpleinput" class="form-label">Giá Sản Phẩm</label>
                                        <input type="text" id="simpleinput" class="form-control" name="gia_san_pham">
                                    </div>
                                    <div class="mb-3">
                                        <label for="simpleinput" class="form-label">Giá Khuyến Mãi</label>
                                        <input type="text" id="simpleinput" class="form-control" name="gia_khuyen_mai">
                                    </div>
                                    <label for="simpleinput" class="form-label">Tùy Chỉnh Khác</label>
                                    <div class="form-switch mb-2 d-flex justify-content-between">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="is_new" name="is_new" checked="">
                                            <label class="form-check-label" for="is_new">New</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="is_hot" name="is_hot" checked="">
                                            <label class="form-check-label" for="is_hot">Hot</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="is_hot_deal" name="is_hot_deal" checked="">
                                            <label class="form-check-label" for="is_hot_deal">Hot Deal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="is_show_home" name="is_show_home" checked="">
                                            <label class="form-check-label" for="is_show_home">Show Home</label>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="simpleinput" class="form-label">Số lượng</label>
                                        <input type="text" id="simpleinput" class="form-control" name="so_luong">
                                    </div>
                                    <div class="mb-3">
                                        <label for="example-email" class="form-label">Hình Ảnh</label>
                                        <input type="file" id="example-email" name="hinh_anh" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="example-email" class="form-label">Ngày Nhập</label>
                                        <input type="date" id="example-email" name="ngay_nhap" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="example-disable" class="form-label">Trạng thái</label>
                                        <select class="form-select" id="example-select" name="trang_thai">
                                            <option value="0">Ẩn</option>
                                            <option value="1">Hiển Thị</option>
                                        </select>
                                    </div>
                                    <div class="mb-3 input-group">
                                        <span class="input-group-text">Mô Tả Ngắn</span>
                                        <textarea class="form-control" aria-label="Với vùng văn bản" name="mo_ta_ngan"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-success rounded-pill">Thêm</button>
                                </form>
                            </div>
                            <div class="col-lg-8">
                                <div class="mb-3">
                                    <label for="example-disable" class="form-label">Mô Trả Chi Tiết Sản Phẩm</label>
                                    <div id="quill-editor" style="height: 400px;">
                                        <h1>Mô Tả Chi Tiết</h1>

                                    </div>
                                </div>
                                <textarea name="noi_dung" id="noi_dung_content" class="d-none"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('assets/admin/libs/quill/quill.core.js') }}"></script>
<script src="{{ asset('assets/admin/libs/quill/quill.min.js') }}"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    var quill = new Quill("#quill-editor", {
        theme: "snow"
    });

    // Hiển thị lại nội dung cũ
    var old_content=`{!! old('noi_dung') !!}`;
    quill.root.innerHTML=old_content;
    // cập nhật
    quill.on('text-change',function() {
        var HTML = quill.root.innerHTML;
        document.getElementById('noi_dung_content').value =HTML;
    })

});
</script>
@endsection
