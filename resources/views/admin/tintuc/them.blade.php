    @extends('admin.layout.index')
    @section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Thêm
                        <small>tin tức</small>
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
                    <form action="admin/tintuc/them" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <!-- chọn thể loại  -->
                        <div class="form-group">
                            <label>Thể loại</label>
                            <select class="form-control" name="TheLoai" id="TheLoai">
                                @foreach($theloai as $tl)
                                <option value="{{$tl->id}}">{{$tl->Ten}}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- end  -->
                        <!-- chọn loại tin  -->
                        <div class="form-group">
                            <label>Loại tin</label>
                            <select class="form-control" name="LoaiTin" id=LoaiTin>
                                @foreach($loaitin as $lt)
                                <option value="{{$lt->id}}">{{$lt->Ten}}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- end  -->
                        <!-- Nhập tiêu đề -->
                        <div class="form-group">
                            <label>Nhập tiêu đề</label>
                            <input class="form-control" name="TieuDe" placeholder="Nhập tiêu đề bài viết" />
                        </div>
                        <!-- end  -->
                        <!-- nhập tác gỉa  -->
                        <div class="form-group">
                            <label>Tác giả</label>
                            <input name="TacGia" class="form-control"></input>
                        </div>
                        <!-- nhập tóm tắt -->
                        <div class="form-group">
                            <label>Tóm tắt</label>
                            <input class="form-control" name="TomTat"></input>
                        </div>
                        <!-- nhập nội dung -->
                        <div class="form-group">
                            <label>Nội dung</label>
                            <textarea class=" form-control ckeditor" name="NoiDung"></textarea>
                        </div>
                        <!-- nhập hình ảnh -->
                        <div class="form-group">
                            <label>Hình ảnh</label>
                            <input type="file" name="Hinh" id="" class="form-control">
                        </div>
                        <!-- nổi bật  -->
                        <div class="form-group">
                            <label>Nổi bật </label>
                            <label class="radio-inline">
                                <input name="NoiBat" value="1" checked="" type="radio">Có
                            </label>
                            <label class="radio-inline">
                                <input name="NoiBat" value="0" type="radio">Không
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