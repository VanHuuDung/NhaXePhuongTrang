<?php
namespace App\Http\Services\Xe;

use App\Models\xe;
use App\Models\loaixe;
use Illuminate\Support\Facades\Session;

class XeService
{
    //Lấy tất cả xe
    public function getAll()
    {
        return xe::with('loaixe')->orderByDesc('MaXe')->paginate(15);
    }

    public function getLoaiXe()
    {
        return loaixe::orderByDesc('MaLoaiXe')->paginate(15);
    }

    //Lấy chi tiết 1 xe
    public function findById($id)
    {
        return xe::findOrFail($id); 
    }

    //Thêm mới xe
    public function insert($request)
    {
        $check = xe::where('BienSoXe', $request->BienSoXe)->first();
        if ($check) 
        {
            Session::flash('error','Biển số xe đã tồn tại!');
            return redirect()->back();
        }

        $xe = new xe();
        $xe->TenXe = $request->TenXe;
        $xe->BienSoXe = $request->BienSoXe;
        $xe->MaLoaiXe = $request->MaLoaiXe;
        $xe->Active = $request->Active;

        $res = $xe->save();   
        
        if($res)
        {
            Session::flash('success','Thêm thành công');
            return redirect()->back();
        }
        else
        {
            Session::flash('error','Đã xảy ra lỗi');
        }
    }


    //Cập nhật xe
    public function update($xe, $request):bool
    {
        $check = xe::where('BienSoXe', $request->BienSoXe)->first();
        if ($check) 
        {
            Session::flash('error','Biển số xe đã tồn tại!');
            return redirect()->back();
        }

        try 
        {
            $xe->TenXe = (string)$request->input('TenXe');
            $xe->BienSoXe = (string)$request->input('BienSoXe');
            $xe->MaLoaiXe = (string)$request->input('MaLoaiXe');
            $xe->Active = (string)$request->input('Active');

            $xe->save();
            
            Session::flash('success','Cập nhật xe thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Cập nhật lỗi');
            return false;
        }
        return true;
    }

    //Xóa xe
    public function destroy($request)
    {
        $MaXe = (int)$request->input('id');
        $xe = xe::where('MaXe',$MaXe)->first();
        if($xe){
            return xe::where('MaXe',$MaXe)->delete();
        }
        return false;
    }

    public function show()
    {
        return xe::where('Active', 1)->orderByDesc('sort_by')->get();
    }
}