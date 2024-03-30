<?php

namespace App\Http\Controllers\Admin\NhanVien;

use App\Http\Controllers\Controller;
use App\Models\nhanvien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index(){    
         return view('admin.nhanvien.login',[
            'title'=>'Đăng Nhập Hệ Thống'
        ]);
    }
    public function store(Request $request){
        $this->validate($request,[
             'email'=>'required|email:filter',
             'password'=>'required|'
        ]);
       $user = nhanvien::where('Email','=', $request->email)->first();
    //    dd($user);
       if($user){
            if(Hash::check($request->password, $user->Password)){
                $request->session()->put('loginId', $user);
                return redirect()->route('nhanvien');
            }
            else{
                Session::flash('error', 'email hoặc mật khẩu không chính xác');
                return redirect()->back();
            }
        }
        else
        {
            Session::flash('error', 'chưa có tài khoản này trong dữ liệu , vui lòng đăng ký');
            return redirect()->back();
        }
    }
    public function logout(){    
        if(Session::has('loginId')){
            Session::pull('loginId');
            return redirect()->route('trangchu');
        }
        else{
            Session::flash('error','bạn chưa đăng nhập không thể đăng xuất ?');
            return redirect()->back();
        }
   }
}