<?php

namespace App\Http\Services\TaiXe;


use App\Models\taixe;
use Illuminate\Support\Facades\Session;

class TaiXeService
{
    // Lấy tất cả Tuyến Xe
    public function getAll()
    {
        return taixe::orderByDesc('MaTaiXe')->paginate(15);
    }
    public function insert($request)
    {
        $taixe = new taixe();
        $taixe->TenTaiXe = (string)$request->input('TenTaiXe');
        $taixe->NgaySinh = (string)$request->input('NgaySinh');
        $taixe->CMND = (string)$request->input('CMND');
        $taixe->SDT = (string)$request->input('SDT');
        $taixe->Active = 1;

        $res = $taixe->save();

        if ($res) {
            Session::flash('success', 'Thêm thành công');
        } else {
            Session::flash('error', 'Đã xảy ra lỗi');
        }

        return redirect()->back();
    }

    // Cập nhật Tuyến Xe
    public function update($taixe, $request): bool
    {
        try {
            $taixe->TenTaiXe = (string)$request->input('TenTaiXe');
            $taixe->NgaySinh = (string)$request->input('NgaySinh');
            $taixe->CMND = (string)$request->input('CMND');
            $taixe->SDT = (string)$request->input('SDT');
            $taixe->Active = (string)$request->input('Active');

            $taixe->save();

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
        $tuyenXe = taixe::where('MaTaiXe', $MaTuyen)->first();
        if ($tuyenXe) {
            return taixe::where('MaTaiXe', $MaTuyen)->delete();
        }
        return false;
    }
}