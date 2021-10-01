<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\TheLoai;

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/dangnhap', 'UserController@getLoginAdmin');
Route::post('admin/dangnhap', 'UserController@postLoginAdmin');
Route::get('admin/dangxuat','UserController@getLogoutAdmin');

Route::group(['prefix'=>'admin', 'middleware'=>'adminLogin'],function(){
    Route::prefix('thongke')->group(function () {
        Route::get('chitiet', 'ChiTietController@getChiTiet');
    });
    // the loai 
    Route::prefix('theloai')->group(function () {
        Route::get('danhsach', 'TheLoaiController@getDanhSach');
        // sua the loai 
        Route::get('sua/{id}', 'TheLoaiController@getSua');
        Route::post('sua/{id}', 'TheLoaiController@postSua');
        // them the loai 
        Route::get('them','TheLoaiController@getThem');
        Route::post('them','TheLoaiController@postThem');
        // xoa the loai 
        Route::get('xoa/{id}','TheLoaiController@getXoa');

    });
    // menu 
    Route::prefix('menu')->group(function () {
        Route::get('danhsach', 'MenuController@getDanhSach');
        // sua the loai 
        Route::get('sua/{id}', 'MenuController@getSua');
        Route::post('sua/{id}', 'MenuController@postSua');
        // them the loai 
        Route::get('them','MenuController@getThem');
        Route::post('them','MenuController@postThem');
        // xoa the loai 
        Route::get('xoa/{id}','MenuController@getXoa');

    });
    // // loai tin 
    Route::prefix('loaitin')->group(function () {
        Route::get('danhsach', 'LoaiTinController@getDanhSach');
        // sua loai tin
        Route::get('sua/{id}', 'LoaiTinController@getSua');
        Route::post('sua/{id}', 'LoaiTinController@postSua');
        // them loai tin
        Route::get('them','LoaiTinController@getThem');
        Route::post('them','LoaiTinController@postThem');
        // xoa loai tin
        Route::get('xoa/{id}','LoaiTinController@getXoa');
    });
    // tin tuc 
    Route::prefix('tintuc')->group(function () {
        Route::get('danhsach', 'TinTucController@getDanhSach');

        Route::get('dsbinhluan/{id}', 'TinTucController@getDsBinhLuan');
        // Sửa loại tin 
        Route::get('sua/{id}', 'TinTucController@getSua');
        Route::post('sua/{id}', 'TinTucController@postSua');
        // thêm loại tin 
        Route::get('them', 'TinTucController@getThem');
        Route::post('them', 'TinTucController@postThem');
        // xoa tin tức theo id
        Route::get('xoa/{id}','TinTucController@getXoa');
    });
    // comment 
    Route::prefix('comment')->group(function () {
        // xoa tin tức theo id
        Route::get('xoa/{id}/{idTinTuc}','CommentController@getXoa');
    });
    // user
    Route::prefix('slide')->group(function () {
        Route::get('danhsach', 'SlideController@getDanhSach');

        // Sửa slide
        Route::get('sua/{id}', 'SlideController@getSua');
        Route::post('sua/{id}', 'SlideController@postSua');
        // thêm slide
        Route::get('them', 'SlideController@getThem');
        Route::post('them', 'SlideController@postThem');
        // xoa tin tức theo id
        Route::get('xoa/{id}','SlideController@getXoa');
    });
    // user
    Route::prefix('user')->group(function () {
        Route::get('danhsach', 'UserController@getDanhSach');

        // Sửa user
        Route::get('sua/{id}', 'UserController@getSua');
        Route::post('sua/{id}', 'UserController@postSua');
        // thêm user
        Route::get('them', 'UserController@getThem');
        Route::post('them', 'UserController@postThem');
        // xoa tin tức theo id
        Route::get('xoa/{id}','UserController@getXoa');
    });
    
    Route::group(['prefix'=>'ajax'],function (){
        Route::get('loaitin/{idTheLoai}','AjaxController@getLoaiTin');
    });
});


Route::get('trangchu','PagesController@trangchu');
Route::get('quydinh','PagesController@quydinh');
Route::get('lienhe','PagesController@lienhe');

Route::get('the/{id}/{TenKhongDau}.html','PagesController@the');

Route::get('theloai/{id}/{TenKhongDau}.html','PagesController@theloai');

Route::get('tintuc/{id}/{TieuDeKhongDau}.html','PagesController@tintuc');
Route::get('tintuc/{id}/{TieuDeKhongDau}.html','PagesController@tintuc');

Route::get('dangnhap','PagesController@getDangnhap');
Route::post('dangnhap','PagesController@postDangnhap');

Route::get('dangky','PagesController@getDangky');
Route::post('dangky','PagesController@postDangky');

Route::get('thongtin/{Ten}','PagesController@getThongtin');
Route::post('thongtin/{Ten}','PagesController@postThongtin');

Route::get('dangxuat','PagesController@getDangxuat');

Route::post('comment/{id}','CommentController@postComment');


Route::get('timkiem','PagesController@timkiem');