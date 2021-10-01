@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thêm
                    <small>người dùng</small>
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
                <form action="admin/user/them" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <!-- Nhập tên người dùng -->
                    <div class="form-group">
                        <label>Tên</label>
                        <input class="form-control" name="Name" placeholder="Nhập tên người đùng">
                    </div>
                    <!-- end  -->
                    <!-- nhập email -->
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" name="Email" placeholder="Nhập địa chỉ email">
                    </div>
                    <!-- mật khẩu  -->
                    <div class="form-group">
                        <label>Mật khẩu</label>
                        <input type="password" class="form-control" name="Password">
                    </div>
                    <!-- end  -->
                    <!-- nhập lại mật khẩu  -->
                    <div class="form-group">
                        <label>Nhập lại mật khẩu</label>
                        <input type="password" class="form-control" name="PasswordAgain">
                    </div>
                    <!-- end  -->
                    <!-- phân quyền  -->
                    <div class="form-group">
                        <label>Quyền</label>
                        <label class="radio-inline">
                            <input name="Quyen" value="1" checked="" type="radio">Quản trị viên
                        </label>
                        <label class="radio-inline">
                            <input name="Quyen" value="0" type="radio">Người dùng
                        </label>
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