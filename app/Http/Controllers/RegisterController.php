<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\khachhang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    public function index(){    
        return view('register',[
           'title'=>'Đăng Ký Một Người Dùng Mới '
       ]);
   }

   public function store(Request $request)
   {
        $this->validate($request,[
            'email'=>'required|email:filter',
            'password'=>'required|',
            'hoten'=>'required|'
        ]);
        $check = khachhang::where('Email','=', $request->email)->first();
        if($check){
            Session::flash('error','Đã tồn tại email này !!');
            return redirect()->back();
        }
        // dd($request->input());
        $user = new khachhang() ;
        $user->TenKhachHang = $request->hoten;
        $user->Password = Hash::make($request->password);
        $user->Email = $request->email;
        $user->Active = 1;
        $res=$user->save();
        if($res){
            Session::flash('success','Đăng Ký Thành Công!!');
            return redirect()->back();
        }
        else{
            Session::flash('error','Đã Xảy ra Lỗi !!');
            return redirect()->back();
        }
    }   
}
