<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Comment;

class UserController extends Controller
{
    //
    // hàm lấy danh sách
    public function getDanhSach()
    {
        $user = User::all();
        return view('admin.user.danhsach',['user'=>$user]);
    }
    // hàm get thêm 
    public function getThem()
    {   
        return view('admin.user.them');
    }
    // hàm post thêm 
    public function postThem(Request $request)
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
        $user->quyen = $request->Quyen;
        $user->save();

        return redirect('admin/user/them')->with('thongbao','Thêm thành công');
    }
    // // hàm get sửa theo id 
    public function getSua($id)
    {
        $user = User::find($id);
        return view ('admin/user/sua', ['user'=>$user]);
    }
    // hàm post sửa theo id
    public function postSua(Request $request,$id)
    {
        $this->validate($request,
        [
            'Name'=> 'required',
        ],
        [
            'Name.required'=>'Bạn chưa nhập tên',
        ]);
        $user = User::find($id);
        $user->name = $request->Name;
        $user->quyen = $request->Quyen;
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
        return redirect('admin/user/sua/'.$id)->with('thongbao','Sửa thành công');
    }
    // // hàm để xóa theo id 
    public function getXoa($id)
    {
        $user = User::find($id);
        $comment = Comment::where('idUser',$id);
        $comment->delete();
        $user->delete();
        return redirect('admin/user/danhsach')->with('thongbao','Xóa tài khoản thành công');
    }
    public function getLoginAdmin()
    {
        return view('admin.login');
    }
    public function postLoginAdmin(Request $request)
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
            return redirect('admin/thongke/chitiet');
        }
        else{
            return redirect('admin/dangnhap')->with('thongbao','Đăng nhập không thành công');
        }
    }
    public function getLogoutAdmin(){
        Auth::logout();
        return redirect('admin/dangnhap')->with('thongbaodx','Đăng xuất thành công');
    }
}