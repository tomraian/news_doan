@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thêm
                    <small>slide</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                @if(count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach($errors->all() as $err)
                    {{$err}}<br>
                    @endforeach
                </div>
                @endif
                @if(session('loi'))
                <div class="alert alert-danger">
                    {{session('loi')}}
                </div>
                @endif

                @if(session('thongbao'))
                <div class="alert alert-success">
                    {{session('thongbao')}}
                </div>
                @endif
                <form action="admin/slide/them" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <!-- Nhập tên slide -->
                    <div class="form-group">
                        <label>Nhập tên slide</label>
                        <input class="form-control" name="Ten" placeholder="Nhập tiêu đề slide" />
                    </div>
                    <!-- end  -->
                    <!-- nhập nội dung  -->
                    <div class="form-group">
                        <label>Nhập nội dung slide</label>
                        <input class="form-control" name="NoiDung" placeholder="Nhập nội dung slide" />
                    </div>
                    <!-- nhập liên kết silde -->
                    <div class="form-group">
                        <label>Liên kết</label>
                        <input id="demo" class=" form-control ckeditor" name="link">
                    </div>
                    <!-- nhập hình ảnh -->
                    <div class="form-group">
                        <label>Hình ảnh</label>
                        <input type="file" name="Hinh" id="" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-default">Thêm</button>
                    <button type="reset" class="btn btn-default">Nhập lại</button>
                    <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection
@section('script')
<script>
$(document).ready(function() {
    var idTheLoai = $('#TheLoai').val();
    $.get("admin/ajax/loaitin/" + idTheLoai, function(data) {
        $("#LoaiTin").html(data);
    });
    $("#TheLoai").change(function() {
        var idTheLoai = $(this).val();
        $.get("admin/ajax/loaitin/" + idTheLoai, function(data) {
            $("#LoaiTin").html(data);
        });
    });
});
</script>
@endsection