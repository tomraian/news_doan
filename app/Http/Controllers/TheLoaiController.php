<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\TheLoai;

class TheLoaiController extends Controller
{
    //
    // hàm lấy danh sách
    public function getDanhSach()
    {
        $theloai = TheLoai::all();
        return view('admin.theloai.danhsach',['theloai'=>$theloai]);
    }
    // hàm để thêm 
    public function getThem()
    {
        // return view('admin.theloai.them');
    }
    public function postThem(Request $request)
    {
        $this->validate($request,
        [
            'Ten'=> 'required|unique:theloai,Ten|min:3|max:50'
        ],
        [
            'Ten.required'=>'Bạn chưa nhập tên thể loại',
            'Ten.unique'=>'Tên thể loại đã tồn tại ',
            'Ten.min'=>'Tên thể loại phải từ 3 đến 50 ký tự',
            'Ten.max'=>'Tên thể loại phải từ 3 đến 50 ký tự',
        ]);
        $theloai = new TheLoai;
        $theloai->Ten = $request->Ten;
        $theloai->TenKhongDau = changeTitle($request->Ten);
        $theloai->save();

        return redirect('admin/theloai/them')->with('thongbao','Thêm thành công');
    }
    // hàm để sửa theo id 
    public function getSua($id)
    {
        $theloai = TheLoai::find($id);
        return view ('admin.theloai.sua', ['theloai'=>$theloai]);
    }
    public function postSua(Request $request, $id)
    {
        $theloai = TheLoai::find($id);
        $this->validate($request,
        [
            'Ten'=> 'required|unique:theloai,Ten|min:3|max:50'
        ],
        [
            'Ten.required'=>'Bạn chưa nhập tên thể loại',
            'Ten.unique'=>'Tên thể loại đã tồn tại ',
            'Ten.min'=>'Tên thể loại phải từ 3 đến 50 ký tự',
            'Ten.max'=>'Tên thể loại phải từ 3 đến 50 ký tự',
        ]);
        $theloai->Ten = $request->Ten;
        $theloai->TenKhongDau = changeTitle($request->Ten);
        $theloai->save();
        return redirect('admin/theloai/sua/'.$id)->with('thongbao','Sửa thành công');
        
    }
    // hàm để xóa theo id 
    public function getXoa($id)
    {
        $theloai = TheLoai::find($id);
        $theloai->delete();
        return redirect('admin/theloai/danhsach')->with('thongbao','Xóa thành công');
    }
}