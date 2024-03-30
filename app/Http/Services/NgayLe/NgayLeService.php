<?php

namespace App\Http\Services\NgayLe;

use App\Models\ngayle;
use App\Models\taixe;
use Brick\Math\BigNumber;
use Illuminate\Support\Facades\Session;

class NgayLeService
{
    // Lấy tất cả Tuyến Xe
    public function getAll()
    {
        return ngayle::orderByDesc('Id')->paginate(15);
    }
    public function insert($request)
    {
        $ngayle = new ngayle();
        $ngayle->Ngay = (string)$request->input('Ngay');
        $ngayle->TenNgayLe = (string)$request->input('TenNgayLe');
        $ngayle->GiaTang = (string)$request->input('GiaTang');
        $res = $ngayle->save();

        if ($res) {
            Session::flash('success', 'Thêm thành công');
        } else {
            Session::flash('error', 'Đã xảy ra lỗi');
        }

        return redirect()->back();
    }

    // Cập nhật Tuyến Xe
    public function update($ngayle, $request): bool
    {
        try {
            $ngayle->Ngay = (string)$request->input('Ngay');
            $ngayle->TenNgayLe = (string)$request->input('TenNgayLe');
            $ngayle->GiaTang = (string)$request->input('GiaTang');
            $ngayle->save();
            Session::flash('success', 'Cập nhật tài xế thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Cập nhật lỗi');
            return false;
        }

        return true;
    }

    public function destroy($request)
    {
        $MaTuyen = (int)$request->input('id');
        $tuyenXe = ngayle::where('Id', $MaTuyen)->first();
        if ($tuyenXe) {
            return ngayle::where('Id', $MaTuyen)->delete();
        }
        return false;
    }
}