<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Slide;
use App\TheLoai;
use App\LoaiTin;
use App\TinTuc;
use App\User;
class PagesController extends Controller
{
    //

    function __construct(Request $request)
    {
        $tukhoa = $request->tukhoa;
        $tintuc = TinTuc::all();
        $theloai = TheLoai::all();
        $loaitin = Loaitin::all();
        $slide = Slide::orderBy('id', 'desc')->take(6)->get();
        $tinnoibat = TinTuc::orderBy('created_at', 'desc')->where('NoiBat',1)->take(4)->get();
        view()->share('slide', $slide); 
        view()->share('tintuc', $tintuc); 
        view()->share('loaitin', $loaitin); 
        view()->share('slide', $slide); 
        view()->share('theloai', $theloai); 
        view()->share('tinnoibat', $tinnoibat); 
        view()->share('tukhoa', $tukhoa); 
        
    }
    function trangchu()
    {
        return view('pages.trangchu');
    }
    function lienhe()
    {
        return view('pages.lienhe');
    }

    function the($id)
    {   
        $loaitin = LoaiTin::find($id);
        $tintuc = TinTuc::where('idLoaiTin', $id)->paginate(4);
        $tim = LoaiTin::where('id', $id)->value('idTheLoai');
        $tieude = LoaiTin::where('id', $id)->value('Ten');
        $ten = TheLoai::where('id', $tim)->value('Ten');
        return view('pages.the',['tintuc'=>$tintuc,'ten'=>$ten,'tieude'=>$tieude]);
    }

    function theloai($id)
    {   
        $theloai = TheLoai::find($id);
        $loaitin = LoaiTin::where('idTheLoai', $id)->pluck('id');
        $ten = $theloai = TheLoai::where('id',$id)->value('Ten');
        $tintuc = TinTuc::whereIn('idLoaiTin', $loaitin)->paginate(5);
        return view('pages.theloai',['tintuc'=>$tintuc,'ten'=>$ten]);
    }

    function tintuc($id)
    {    
        $tintuc = TinTuc::find($id);
        $tinlienquan = TinTuc::where('idLoaiTin',$tintuc->idLoaiTin)->take(4)->get();
        return view('pages.tintuc',['tintuc'=>$tintuc,'tinlienquan'=>$tinlienquan]);
    }

    function getDangnhap()
    {
        return view('pages.dangnhap');
    }
    function postDangnhap(Request $request)
    {
        $this->validate($request,
        [
            'email'=> 'required',
            'password'=> 'required|min:6|max:50',
        ],
        [   
            'email.required'=>'Bạn chưa nhập địa chỉ email',
            'password.required'=>'Bạn chưa nhập địa chỉ email',
            'password.min'=>'Mật khẩu phải lớn hơn 6 ký tự',
            'password.max'=>'Mật khẩu ít hơn 32 ký tự',
        ]);
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password]))
        {
            return redirect('trangchu')->with('thongbao','Đăng nhập thành công');
        }
        else{
            return redirect('dangnhap')->with('thongbao','Đăng nhập không thành công');
        }
    }

    function getDangky()
    {
        return view('pages.dangky');
    }
    function postDangky(Request $request)
    {
        $this->validate($request,
        [
            'Name'=> 'required|min:3',
            'Email'=> 'required|email|unique:users,email',
            'Password'=> 'required|min:6|max:32',
            'PasswordAgain'=> 'required|same:Password'
        ],
        [
            'Name.required'=>'Bạn chưa nhập tên',
            'Name.min'=>'Tên phaỉ từ 3 ký tự trở lên',
            'Email.required'=>'Bạn chưa nhập email',
            'Email.email'=>'Email định dạng không hợp lệ',
            'Email.unique'=>'Email đã được sử dụng',
            'Password.required'=>'Bạn chưa nhập mật khẩu',
            'Password.min'=>'Mật khẩu phải từ 6 ký tự trở lên',
            'Password.max'=>'Mật khẩu phải ít hơn 32 ký tự',
            'PasswordAgain.required'=>'Bạn chưa nhập lại mật khẩu',
            'PasswordAgain.same'=>'Mật khẩu nhập lại không đúng',
        ]);
        $user = new User;
        $user->name = $request->Name;
        $user->email = $request->Email;
        $user->password = bcrypt($request->Password);
        $user->quyen = 0;
        $user->save();
        return redirect('dangky')->with('thongbao','Đăng ký thành công');
    }

    function getThongtin()
    {
        return view('pages.thongtin');
    }
    function postThongtin(Request $request)
    {
        $this->validate($request,
        [
            'Name'=> 'required',
        ],
        [
            'Name.required'=>'Bạn chưa nhập tên',
        ]);
        $user = Auth::user();
        $user->name = $request->Name;
        if(isset($request->changePassword))
        {
            $this->validate($request,
            [
                'Password'=> 'required|min:6|max:32',
                'PasswordAgain'=> 'required|same:Password'
            ],
            [
                'Password.required'=>'Bạn chưa nhập mật khẩu',
                'Password.min'=>'Mật khẩu phải từ 6 ký tự trở lên',
                'Password.max'=>'Mật khẩu phải ít hơn 32 ký tự',
                'PasswordAgain.required'=>'Bạn chưa nhập lại mật khẩu',
                'PasswordAgain.same'=>'Mật khẩu nhập lại không đúng',
            ]);
        $user->password = bcrypt($request->Password);

        }
        $user->save();
        return redirect('thongtin/'.$request->Name)->with('thongbao','Sửa thành công');
    }
    
    function getDangxuat()
    {
        Auth::logout();
        return redirect('trangchu')->with('thongbao','Đăng xuất thành công');
    }

    function timkiem(Request $request){
        $tukhoa = $request->tukhoa;
        $tintuc = TinTuc::where('TieuDe','like',"%$tukhoa%")->orwhere('TomTat','like',"%$tukhoa%")->orwhere('NoiDung','like',"%$tukhoa%")->take(30)->paginate(5)->appends(['tukhoa' => $tukhoa]);;
        return view('pages.timkiem',['tintuc'=>$tintuc]);
        
    }

    function quydinh()
    {
        return view('pages.quydinh');
    }
}