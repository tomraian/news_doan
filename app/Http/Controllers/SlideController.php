<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Slide;

class SlideController extends Controller
{
    //
    // hàm lấy danh sách
    public function getDanhSach()
    {
        $slide = Slide::all();
        return view('admin.slide.danhsach',['slide'=>$slide]);
    }
    // hàm get thêm 
    public function getThem()
    {   
        $slide = Slide::all();
        return view('admin.slide.them',['slide'=>$slide]);
    }
    // hàm post thêm 
    public function postThem(Request $request)
    {
        $this->validate($request,
        [
            'Ten'=> 'required',
            'NoiDung'=> 'required',
        ],
        [
            'Ten.required'=>'Bạn chưa nhập tên slide',
            'NoiDung.required'=>'Bạn chưa nhập nội dung slide',
        ]);
        $slide = new Slide;
        $slide->Ten = $request->Ten;
        $slide->NoiDung = $request->NoiDung;
        if($request->has('link'))
            $slide->link = $request->link;
            
            if($request->hasFile('Hinh'))
        {
            $file = $request->file('Hinh');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg' && $duoi != 'gif' & $duoi != 'webp')
            {
                return redirect('admin/slide/them')->with('loi','Chỉ được nhập file ảnh có đuôi mở rộng là jpg,png,jpeg,gif,webp');
            }
            $name = $file->getClientOriginalName();
            $Hinh = Str::random(5)."_".$name;
            while(file_exists("upload/slide/".$Hinh))
            {
                $Hinh = Str::random(5)."_".$name;
            }
            $file->move("upload/slide",$Hinh);
            $slide->Hinh = $Hinh;
        }
        else{
            $slide->Hinh ="";
        }
        $slide->save();

        return redirect('admin/slide/them')->with('thongbao','Thêm thành công');
    }
    // // hàm get sửa theo id 
    public function getSua($id)
    {
        $slide = Slide::find($id);
        return view ('admin/slide/sua', ['slide'=>$slide]);
    }
    // hàm post sửa theo id
    public function postSua(Request $request,$id)
    {
        $slide = Slide::find($id);
        $this->validate($request,
        [
            'Ten'=> 'required',
            'NoiDung'=> 'required',
        ],
        [
            'Ten.required'=>'Bạn chưa nhập tên slide',
            'NoiDung.required'=>'Bạn chưa nhập nội dung slide',
        ]);
        $slide = Slide::find($id);
        $slide->Ten = $request->Ten;
        $slide->NoiDung = $request->NoiDung;
        if($request->hasFile('Hinh'))
        {
            $file = $request->file('Hinh');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg'  && $duoi != 'gif' && $duoi != 'webp')
            {
                return redirect('admin/slide/them')->with('loi','Chỉ được nhập file ảnh có đuôi mở rộng là jpg,png,jpeg,gif,webp');
            }
            $name = $file->getClientOriginalName();
            $Hinh = Str::random(5)."_".$name;
            while(file_exists("upload/slide/".$Hinh))
            {
                $Hinh = Str::random(5)."_".$name;
            }
            $file->move("upload/slide",$Hinh);
            unlink("upload/slide/".$slide->Hinh);
            $slide->Hinh = $Hinh;
        }
        $slide->save();
        return redirect('admin/slide/sua/'.$id)->with('thongbao','Sửa thành công');
    }
    // // hàm để xóa theo id 
    public function getXoa($id)
    {
        $slide = Slide::find($id);
        $slide->delete();
        return redirect('admin/slide/danhsach')->with('thongbao','Xóa thành công');
    }
}