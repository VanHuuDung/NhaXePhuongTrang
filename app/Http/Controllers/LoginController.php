<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\khachhang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index(){    
         return view('login',[
            'title'=>'Đăng Nhập Hệ Thống'
        ]);
    }
    public function store(Request $request){
        $this->validate($request,[
             'email'=>'required|email:filter',
             'password'=>'required|'
        ]); 
       $user = khachhang::where('Email','=', $request->email)->first();
       //dd($user);
       if($user){
            if(Hash::check($request->password, $user->Password)){
                $request->session()->put('loginId_khachhang', $user);
                return redirect()->route('main');
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
        if(Session::has('loginId_khachhang')){
            Session::pull('loginId_khachhang');
            return redirect()->route('login_khachhang');
        }
        else{
            Session::flash('error','bạn chưa đăng nhập lấy gì đăng xuất ?');
            return redirect()->back();
        }
   }
}