@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sửa slide
                    <small>"{{$slide->Ten}}"</small>
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
                <form action="admin/slide/sua/{{$slide->id}}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <!-- Nhập tên slide -->
                    <div class="form-group">
                        <label>Nhập tên slide mới</label>
                        <input class="form-control" name="Ten" value="{{$slide->Ten}}"
                            placeholder="Nhập tiêu đề slide mới">
                    </div>
                    <!-- end  -->
                    <!-- nhập nội dung  -->
                    <div class="form-group">
                        <label>Nhập nội dung slide mới</label>
                        <textarea name="NoiDung" id="demo" cols="30" rows="10" class="ckeditor form-control"
                            class="form-control">
                         {{$slide->NoiDung}}</textarea>
                    </div>
                    <!-- nhập liên kết silde -->
                    <div class=" form-group">
                        <label>Nhập liên kết mới</label>
                        <input class=" form-control" value="{{$slide->link}}" name="link">
                    </div>
                    <!-- nhập hình ảnh -->
                    <div class="form-group">
                        <img src="upload/slide/{{$slide->Hinh}}" alt="" style="width:100%;">
                        <br>
                        <br>
                        <label>Chọn hình ảnh mới</label>
                        <input type="file" name="Hinh" id="" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-default">Sửa</button>
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