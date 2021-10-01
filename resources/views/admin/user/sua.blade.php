@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sửa thông tin
                    <small>"{{$user->name}}"</small>
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
                @if(session('thongbao'))
                <div class="alert alert-success">
                    {{session('thongbao')}}
                </div>
                @endif
                <form action="admin/user/sua/{{$user->id}}" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <!-- Nhập tên người dùng -->
                    <div class="form-group">
                        <label>Tên mới</label>
                        <input class="form-control" name="Name" value="{{$user->name}}"
                            placeholder="Nhập tên người đùng mới">
                    </div>
                    <!-- end  -->
                    <!-- nhập email -->
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" name="Email" value="{{$user->email}}" readonly>
                    </div>
                    <!-- đổi mật khẩu  -->
                    <div class="form-group">
                        <h4>Đổi mật khẩu</h4>
                        <label class="switch">
                            <input type="checkbox" name="changePassword">
                            <span class="slider round"></span>
                        </label>
                    </div>
                    <!-- mật khẩu  -->
                    <div class="form-group">
                        <label>Mật khẩu mới</label>
                        <input type="password" class="form-control password" name="Password" disabled>
                    </div>
                    <!-- end  -->
                    <!-- nhập lại mật khẩu  -->
                    <div class="form-group">
                        <label>Nhập lại mật khẩu mới</label>
                        <input type="password" class="form-control password" name="PasswordAgain" disabled>
                    </div>
                    <!-- end  -->
                    <!-- phân quyền  -->
                    <div class="form-group">
                        <label>Phân quyền </label>
                        <label class="radio-inline">
                            <input name="Quyen" value="1" checked="" @if($user->quyen == 1)
                            {{"checked"}}
                            @endif
                            type="radio">Quản trị viên
                        </label>
                        <label class="radio-inline">
                            <input name="Quyen" value="0" @if($user->quyen== 0)
                            {{"checked"}}
                            @endif
                            type="radio">Người dùng
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
// switch toggle button
$(function() {
    $(".switch input").on("click", function() {
        $(this).parent().toggleClass("active");
    });
    $(".switch input").change(function() {
        if ($(this).is(":checked")) {
            $(".password").removeAttr('disabled');
        } else {
            $(".password").attr('disabled', '');
        }
    });
});
</script>
@endsection