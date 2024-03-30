<?php
namespace App\Http\Services\NhanVien;

use App\Models\quyen;
use App\Models\user;
use App\Models\nhanvien;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session; 
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class NhanVienService{
    public function getAll(){
        return nhanvien::with('quyen')->orderByDesc('Id')->paginate(15);
    }
    public function getQuyen(){
        return quyen::orderByDesc('MaQuyen')->paginate(15);
    }

    public function insert($request){
        $check = nhanvien::where('Email','=', $request->email)->first();
        if($check){
            Session::flash('error','Đã tồn tại email này !!');
            return redirect()->back();
        }
        $user = new nhanvien() ;
        $user->HoTen = $request->hoten;
        $user->Password = Hash::make($request->password);
        $user->Email = $request->email;
        $user->NgaySinh = $request->date;
        $user->SDT = $request->sdt;
        $user->CMND = $request->cmnd;
        $user->MaQuyen = $request->quyen;
        $user->Active = $request->active;
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
    public function update($request,$user):bool
    {
        $check = nhanvien::where('Email','=', $request->email)->first();
        if($check){
            Session::flash('error','Đã tồn tại email này !!');
            return false;
        }
        try {
            //dd($request->input());
            $user->HoTen = (string) $request->input('hoten');
            $user->MaQuyen = (int) $request->input('quyen');
            $user->Active = (int) $request->input('active');
            $user->NgaySinh = (string) $request->input('date');
            $user->Email = (string) $request->input('email');
            $user->CMND = (string) $request->input('cmnd');
            $user->SDT = (string) $request->input('sdt');    
            $user->save();   
            //  dd($user);
            Session::flash('success', 'Cập Nhật User thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Cập Nhật User lỗi');
            //\Log::info($err->getMessage());
            return false;
        }

        return  true;
    }

    public function destroy($request){
        
        $id = (int)$request->input('id');
        $user = nhanvien::where('id',$id)->first();
        if($user){
            return nhanvien::where('id',$id)->delete();
        }
        return false;
    }

    public function show()
    {
        return nhanvien::where('active', 1)->orderByDesc('sort_by')->get();
    }
}