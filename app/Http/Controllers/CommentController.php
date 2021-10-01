<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Comment;
use App\TinTuc;

class CommentController extends Controller
{
    // hàm để xóa theo id 
    public function getXoa($id,$idTinTuc)
    {
        $comment = Comment::find($id);
        $comment->delete ();
        return redirect('admin/tintuc/dsbinhluan/'.$idTinTuc)->with('thongbao','Xóa bình luận thành công');
    }

    public function postComment($id, Request $request)
    {
        $idTinTuc = $id;
        $this->validate($request,
        [
            'NoiDung'=> 'required',

        ],
        [
            'NoiDung.required'=>'Bạn chưa nhập nội dung',
        ]);
        $comment = new Comment;
        $tintuc = TinTuc::find($id);
        $comment->idTinTuc = $idTinTuc;
        $comment->idUser = Auth::user()->id;
        $comment->NoiDung = $request->NoiDung;
        $comment->save();
        return redirect("tintuc/$id/".$tintuc->TieuDeKhongDau.".html")->with('thongbao','Bình luận thành công');
    }
}