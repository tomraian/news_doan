<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\TheLoai;
use App\TinTuc;
use App\LoaiTin;
use App\Comment;
use App\User;

class ChiTietController extends Controller
{
    public function getChiTiet()
    {
        // ok 
        $tongtin = TinTuc::all()->count();
        $tongbl = Comment::all()->count();
        $tonglt = LoaiTin::all()->count();
        $tongtl = TheLoai::all()->pluck('Ten');
        $tongus = User::all()->count();
        
        // tin id 1 là tin Công Giáo 
        $LoaiTincongGiao = LoaiTin::where('idTheLoai', 1)->pluck('id');
        $TinCongGiao = TinTuc::whereIn('idLoaiTin', $LoaiTincongGiao)->count();
        // id 2 là tin Thế Giới 
        $LoaiTinTheGioi = LoaiTin::where('idTheLoai', 2)->pluck('id');
        $TinTheGioi = TinTuc::whereIn('idLoaiTin', $LoaiTinTheGioi)->count();


        // echo "<br>";
        // var_dump($tongtltin);
        
        // $gettl = TheLoai::all()->pluck('id');
        // for($i = 0; $i < count($gettl); $i++)
        // {
        //     $loaitin = LoaiTin::where('idTheLoai', $gettl[$i])->pluck('id');
        //     $tintuc = Tintuc::whereIn('id',$loaitin)->pluck('id')->count();
        //     $mang = array("$tintuc");
        //     // echo "<br>".$tintuc;
        //     // print_r($mang);
        // }
        return view('admin.thongke.chitiet',['tongtin'=>$tongtin,'tongbl'=>$tongbl,'tonglt'=>$tonglt,'tongtl'=>$tongtl,'tongus'=>$tongus,'TinCongGiao'=>$TinCongGiao,'TinTheGioi'=>$TinTheGioi]);
    }
}