<?php

namespace App\Http\Services\LoaiXe;

use App\Models\loaixe;
use Illuminate\Support\Facades\Session;

class LoaiXeService{
    public function getAll()
    {
        return loaixe::orderByDesc('MaLoaiXe')->paginate(15);
    }

    public function insert($request)
    {
        $check = loaixe::where('SoCho', $request->SoCho)->first();
        if ($check) 
        {
            Session::flash('error','Đã có loại xe này rồi');
            return redirect()->back();
        }

        $loaixe = new loaixe();
        $loaixe -> SoCho = $request -> SoCho;

        $res = $loaixe -> save();

        if ($res) {
            Session::flash('success', 'Thêm thành công');
        } else {
            Session::flash('error', 'Đã xảy ra lỗi');
        }

        return redirect()->back();
    }

    public function update($loaixe, $request) : bool
    {
        $check = loaixe::where('SoCho', $request->SoCho)->first();
        if ($check) 
        {
            Session::flash('error','Đã có loại xe này rồi');
            return false;
        }

        try {
            $loaixe -> SoCho = (string)$request -> input('SoCho');

            Session::flash('success', 'Cập nhật xe thành công!');
        } catch (\Exception $err) {
            Session::flash('error', 'Cập nhật lỗi');
            return false;
        }
        return true;
    }

    public function destroy($request)
    {
        $MaLoaiXe = (int)$request->input('id');
        $loaixe = loaixe::where('MaLoaiXe',$MaLoaiXe)->first();
        if($loaixe){
            return loaixe::where('MaLoaiXe',$MaLoaiXe)->delete();
        }
        return false;
    }

    public function show()
    {
        return loaixe::where('Active', 1)->orderByDesc('sort_by')->get();
    }
}