<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\TheLoai;
use App\TinTuc;
use App\LoaiTin;
use App\Comment;

class TinTucController extends Controller
{
    //
    // hàm lấy danh sách
    public function getDanhSach()
    {
        $tintuc = TinTuc::all();
        return view('admin.tintuc.danhsach',['tintuc'=>$tintuc]);
    }
    // hàm lấy danh sách bình luận
    public function getDsBinhLuan($id)
    {
        $theloai = TheLoai::all();
        $loaitin = LoaiTin::all();
        $tintuc = TinTuc::find($id);
        return view ('admin.tintuc.dsbinhluan', ['tintuc'=>$tintuc,'theloai'=>$theloai,'loaitin'=>$loaitin]);
    }
    // hàm get để thêm 
    public function getThem()
    {   
        $theloai = TheLoai::all();
        $loaitin = LoaiTin::all();
        return view('admin.tintuc.them',['theloai'=>$theloai,'loaitin'=>$loaitin]);
    }
    // hàm post để thêm 
    public function postThem(Request $request)
    {
        $this->validate($request,
        [
            'LoaiTin'=> 'required',
            'TieuDe'=> 'required|unique:tintuc,TieuDe|min:3',
            'TacGia'=> 'required',
            'NoiDung'=> 'required',
            'TomTat'=> 'required',

        ],
        [
            'LoaiTin.required'=>'Bạn chưa chọn loại tin',
            'TieuDe.required'=>'Bạn chưa nhập tiêu đề',
            'Ten.unique'=>'Tên tiêu đề đã tồn tại ',
            'TieuDe.min'=>'Tên tin tức phải từ 3 ký tự trở lên',
            'TacGia.required'=>'Bạn chưa nhập tên tác giả',
            'NoiDung.required'=>'Bạn chưa nhập nội dung',
            'TomTat.required'=>'Bạn chưa nhập tóm tắt',
        ]);
        $tintuc = new TinTuc;
        $tintuc->TieuDe = $request->TieuDe;
        $tintuc->TieuDeKhongDau = changeTitle($request->TieuDe);
        $tintuc->idLoaiTin = $request->LoaiTin;
        $tintuc->TacGia = $request->TacGia;
        $tintuc->NoiDung = $request->NoiDung;
        $tintuc->TomTat = $request->TomTat;
        $tintuc -> NoiBat = ($request -> NoiBat) == 0 ? 0 :1;
        if($request->hasFile('Hinh'))
        {
            $file = $request->file('Hinh');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg' && $duoi != 'gif' )
            {
                return redirect('admin/tintuc/them')->with('loi','Chỉ được nhập file ảnh có đuôi mở rộng là jpg,png,jpeg,gif');
            }
            $name = $file->getClientOriginalName();
            $Hinh = Str::random(5)."_".$name;
            while(file_exists("upload/tintuc/".$Hinh))
            {
                $Hinh = Str::random(5)."_".$name;
            }
            $file->move("upload/tintuc",$Hinh);
            $tintuc->Hinh = $Hinh;
        }
        else{
            $tintuc->Hinh ="";
        }
        $tintuc->save();

        return redirect('admin/tintuc/them')->with('thongbao','Thêm thành công');
    }
    // hàm get để sửa theo id 
    public function getSua($id)
    {
        $theloai = TheLoai::all();
        $loaitin = LoaiTin::all();
        $tintuc = TinTuc::find($id);
        return view ('admin.tintuc.sua', ['tintuc'=>$tintuc,'theloai'=>$theloai,'loaitin'=>$loaitin]);
    }
    // hàm post để sửa theo id 
    public function postSua(Request $request,$id)
    {
        $tintuc = TinTuc::find($id);
        $this->validate($request,
        [
            'LoaiTin'=> 'required',
            'TieuDe'=> 'required|min:3',
            'TacGia'=> 'required',
            'NoiDung'=> 'required',
            'TomTat'=> 'required',

        ],
        [
            'LoaiTin.required'=>'Bạn chưa chọn loại tin',
            'TieuDe.required'=>'Bạn chưa nhập tiêu đề',
            'TieuDe.min'=>'Tên tin tức phải từ 3 ký tự trở lên',
            'TacGia.required'=>'Bạn chưa nhập tóm tắt',
            'NoiDung.required'=>'Bạn chưa nhập nội dung',
            'TomTat.required'=>'Bạn chưa nhập tóm tắt',
        ]);
        $tintuc->TieuDe = $request->TieuDe;
        $tintuc->TieuDeKhongDau = changeTitle($request->TieuDe);
        $tintuc->idLoaiTin = $request->LoaiTin;
        $tintuc->TacGia = $request->TacGia;
        $tintuc->NoiDung = $request->NoiDung;
        $tintuc->TomTat = $request->TomTat;
        $tintuc -> NoiBat = ($request -> NoiBat) == 0 ? 0 :1;
        if($request->hasFile('Hinh'))
        {
            $file = $request->file('Hinh');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg'  && $duoi != 'gif')
            {
                return redirect('admin/tintuc/them')->with('loi','Chỉ được nhập file ảnh có đuôi mở rộng là jpg,png,jpeg,gif');
            }
            $name = $file->getClientOriginalName();
            $Hinh = Str::random(5)."_".$name;
            while(file_exists("upload/tintuc/".$Hinh))
            {
                $Hinh = Str::random(5)."_".$name;
            }
            $file->move("upload/tintuc",$Hinh);
            unlink("upload/tintuc/".$tintuc->Hinh);
            $tintuc->Hinh = $Hinh;
        }
        $tintuc->save();
        return redirect('admin/tintuc/sua/'.$id)->with('thongbao','Sửa thành công');
    }
    // hàm để xóa theo id 
    public function getXoa($id)
    {
        $tintuc = TinTuc::find($id);
        $tintuc->delete();
        return redirect('admin/tintuc/danhsach')->with('thongbao','Xóa thành công');
    }
}