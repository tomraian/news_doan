<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\TheLoai;
use App\LoaiTin;

class LoaiTinController extends Controller
{
    //
    // hàm lấy danh sách
    public function getDanhSach()
    {
        $loaitin = LoaiTin::all();
        return view('admin.loaitin.danhsach',['loaitin'=>$loaitin]);
    }
    // hàm để thêm 
    public function getThem()
    {   
        $theloai = TheLoai::all();
        return view('admin.loaitin.them',['theloai'=>$theloai]);
    }
    public function postThem(Request $request)
    {
        $this->validate($request,
        [
            'Ten'=> 'required|unique:loaitin,Ten|min:3|max:50',
            'TheLoai'=> 'required'
        ],
        [
            'Ten.required'=>'Bạn chưa nhập tên loại tin',
            'TheLoai.required'=>'Bạn chưa chọn thể loại',
            'Ten.unique'=>'Tên loại tin đã tồn tại ',
            'Ten.min'=>'Tên loại tin phải từ 3 đến 50 ký tự',
            'Ten.max'=>'Tên loại tin phải từ 3 đến 50 ký tự',
        ]);
        $loaitin = new LoaiTin;
        $loaitin->Ten = $request->Ten;
        $loaitin->TenKhongDau = changeTitle($request->Ten);
        $loaitin->idTheLoai = $request->TheLoai;
        $loaitin->save();

        return redirect('admin/loaitin/them')->with('thongbao','Thêm thành công');
    }
    // hàm để sửa theo id 
    public function getSua($id)
    {
        $theloai = TheLoai::all();
        $loaitin = LoaiTin::find($id);
        return view ('admin.loaitin.sua', ['loaitin'=>$loaitin,'theloai'=>$theloai]);
    }
    public function postSua(Request $request, $id)
    {   
        $loaitin = LoaiTin::find($id);
        $this->validate($request,
        [
            'Ten'=> 'required|min:3|max:50'
        ],
        [
            'Ten.required'=>'Bạn chưa nhập tên loại tin',
            'Ten.min'=>'Tên loại tin phải từ 3 đến 50 ký tự',
            'Ten.max'=>'Tên loại tin phải từ 3 đến 50 ký tự',
        ]);
        $loaitin->Ten = $request->Ten;
        $loaitin->TenKhongDau = changeTitle($request->Ten);
        $loaitin->idTheLoai = ($request->TheLoai);
        $loaitin->save();
        return redirect('admin/loaitin/sua/'.$id)->with('thongbao','Sửa thành công');
        
    }
    // hàm để xóa theo id 
    public function getXoa($id)
    {
        $loaitin = LoaiTin::find($id);
        $loaitin->delete();
        return redirect('admin/loaitin/danhsach')->with('thongbao','Xóa thành công');
    }
}