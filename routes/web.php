<?php

use App\Http\Controllers\Admin\ChuyenxeController;
use App\Http\Controllers\Admin\NhanVien\NhanVienController;
use App\Http\Controllers\Admin\NhanVien\LoginController;
use App\Http\Controllers\Admin\NhanVien\RegisterController;
use App\Http\Controllers\Admin\DatVeController;
use App\Http\Controllers\Admin\LoaiXeController;
use App\Http\Controllers\Admin\NgayLeController;
use App\Http\Controllers\Admin\TaiXeController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Admin\TuyenXeController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\LoginController as ControllersLoginController;
use App\Http\Controllers\RegisterController as ControllersRegisterController;
use App\Http\Controllers\Admin\XeController;
use Illuminate\Foundation\Bootstrap\RegisterProviders;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;

Route::get('/admin/nhanvien/login',[LoginController::class,'index'])->name('login');
Route::post('/admin/nhanvien/login/store',[LoginController::class,'store']);
Route::get('/admin/nhanvien/register',[RegisterController::class,'index'])->name('register');
Route::post('/admin/nhanvien/register/store',[RegisterController::class,'store']);
Route::get('/admin/nhanvien/logout',[LoginController::class,'logout'])->name('logout');

Route::get('/login',[ControllersLoginController::class,'index'])->name('login_khachhang');
Route::post('/login/store',[ControllersLoginController::class,'store']);
Route::get('register',[ControllersRegisterController::class,'index'])->name('register_khachhang');
Route::post('register/store',[ControllersRegisterController::class,'store']);
Route::get('/logout',[ControllersLoginController::class,'logout'])->name('logout_khachhang');

Route::get('/search', [MainController::class, 'search'])->name('search');
Route::get('/search_index', [MainController::class, 'search_index'])->name('search_index');
Route::get('trangchu/{MaTuyen}',[MainController::class ,'ChuyenXeThuocTuyen']); 
Route::get('trangchu',[MainController::class ,'index'])->name('trangchu'); 
Route::get('chuyenxetheotuyen/{MaChuyenXe}',[MainController::class ,'laySoGhe'])->name('dsghe');
Route::post('/datGhe/{maChuyenXe}', [MainController::class ,'datGhe']) -> name('datGhe');
Route::get('/danh-sach-hoa-don', [MainController::class, 'hoadon'])->name('danh_sach_hoa_don');

#GioHang
Route::post('add-cart', [CartController::class, 'index']);
Route::get('carts', [CartController::class, 'show']);
Route::post('update-cart', [CartController::class, 'update']);
Route::get('carts/delete/{id}', [CartController::class, 'remove']);
Route::post('carts', [CartController::class, 'addCart']);
#ThanhToan
Route::post('payment', [CartController::class, 'payment']);


Route::get('/form', [EmailController::class, 'showForm'])->name('form');
Route::post('/process-form', [EmailController::class, 'processForm']);
Route::get('/verify-otp', [EmailController::class, 'showOtpForm']);
Route::post('/verify-otp', [EmailController::class, 'verifyOtp']);

Route::middleware(['IsLoggedIn'])->group(function(){
    Route::prefix('admin')->group(function(){
            // Route::get('/',[MainController::class,'index'])->name('admin');
            // Route::get('main',[MainController::class,'index']);

            #ChuyenXe
            Route::prefix('chuyenxe')->group(function(){
                Route::get('chuyenxe/{MaChuyenXe}',[ChuyenxeController::class ,'show']); 
                Route::get('chuyenxe',[ChuyenxeController::class ,'index'])->name('chuyenxe'); 
                Route::get('addchuyenxe',[ChuyenxeController::class ,'create']); 
                Route::post('addchuyenxe',[ChuyenxeController::class ,'store']);
                Route::post('updateStatus', [ChuyenxeController::class, 'updateStatus'])->name('updateStatus'); 
                Route::get('editchuyenxe/{MaChuyenXe}',[ChuyenxeController::class,'edit']);
                Route::post('editchuyenxe/{MaChuyenXe}',[ChuyenxeController::class,'update']);
                Route::delete('destroy',[ChuyenxeController::class,'destroy']);
            });

            #Xe
            Route::prefix('xe')->group(function(){
                Route::get('add',[XeController::class,'create']);
                Route::post('add',[XeController::class,'store']);
                Route::get('list',[XeController::class,'index']);
                Route::get('edit/{xe}',[XeController::class,'show']);
                Route::post('edit/{xe}',[XeController::class,'update']);
                Route::delete('destroy',[XeController::class,'destroy']);
            });

            #Upload
            // Route::post('upload/services', [\App\Http\Controllers\Admin\UploadController::class,'store']);

            #UserAdmin
            Route::prefix('nhanvien')->group(function(){
                Route::get('add',[NhanVienController::class,'create']);
                Route::post('add',[NhanVienController::class,'store']);
                Route::get('list',[NhanVienController::class,'index'])->name('nhanvien');
                Route::get('edit/{user}',[NhanVienController::class,'show']);
                Route::post('edit/{user}',[NhanVienController::class,'update']);
                Route::delete('destroy',[NhanVienController::class,'destroy']);
            });

            #VeXe
            Route::prefix('datve')->group(function(){
                Route::get('datve/{MaDatVe}',[DatVeController::class ,'show']); 
                Route::get('datve',[DatVeController::class ,'index'])->name('ve'); 
                Route::get('xacnhan/{MaDatVe}',[DatVeController::class ,'xacnhan']);
                Route::get('savexacnhan/{MaDatVe}',[DatVeController::class,'savexacnhan']);
            });
            
            #tuyenxe
            Route::prefix('tuyenxe')->group(function(){
                Route::get('add', [TuyenXeController::class, 'create']);
                Route::post('add', [TuyenXeController::class, 'store']);
                Route::get('list',[TuyenXeController::class,'index']);
                Route::get('edit/{tuyenxe}',[TuyenXeController::class,'show']);
                Route::post('edit/{tuyenxe}',[TuyenXeController::class,'update']);
                Route::delete('destroy',[TuyenXeController::class,'destroy']);
            });

            #loaixe
            Route::prefix('loaixe')->group(function(){
                Route::get('add', [LoaiXeController::class, 'create']);
                Route::post('add', [LoaiXeController::class, 'store']);
                Route::get('list',[LoaiXeController::class,'index']);
                Route::get('edit/{loaixe}',[LoaiXeController::class,'show']);
                Route::post('edit/{loaixe}',[LoaiXeController::class,'update']);
                Route::delete('destroy',[LoaiXeController::class,'destroy']);
            });
            #taixe
            Route::prefix('taixe')->group(function(){
                Route::get('add', [TaiXeController::class, 'create']);
                Route::post('add', [TaiXeController::class, 'store']);
                Route::get('list',[TaiXeController::class,'index']);
                Route::get('edit/{taixe}',[TaiXeController::class,'show']);
                Route::post('edit/{taixe}',[TaiXeController::class,'update']);
                Route::delete('destroy',[TaiXeController::class,'destroy']);
            });
            #ngayle
            Route::prefix('ngayle')->group(function(){
                Route::get('add', [NgayLeController::class, 'create']);
                Route::post('add', [NgayLeController::class, 'store']);
                Route::get('list',[NgayLeController::class,'index']);
                Route::get('edit/{ngayle}',[NgayLeController::class,'show']);
                Route::post('edit/{ngayle}',[NgayLeController::class,'update']);
                Route::delete('destroy',[NgayLeController::class,'destroy']);
            });

    });
});
Route::get('/', [App\Http\Controllers\MainController::class, 'index'])->name('main');;