<?php

namespace App\Http\Services\tuyenXe;

use App\Models\diadiem;
use App\Models\tuyenXe;
use Illuminate\Support\Facades\Session;

class TuyenXeService
{
    // Lấy tất cả Tuyến Xe
    public function getAll()
    {
        return tuyenXe::orderByDesc('MaTuyen')->paginate(15);
    }

    //lấy địa điểm
    public function getDiaDiem()
    {
        return diadiem::orderByDesc('MaDiaDiem')->paginate(15);
    }

    // Lấy chi tiết của một Tuyến Xe
    public function findById($id)
    {
        return tuyenXe::findOrFail($id);
    }
    

    // Thêm mới Tuyến Xe
    public function insert($request)
    {
        // Kiểm tra điểm đến và điểm xuất phát không trùng nhau
        if ($request->DiemDen == $request->DiemXuatPhat) {
            Session::flash('error', 'Điểm đến và điểm xuất phát không được giống nhau!');
            return redirect()->back();
        }

        $tuyenXe = new TuyenXe();
        $tuyenXe->TenTuyen = $request->TenTuyen;
        $tuyenXe->DiemXuatPhat = $request->DiemXuatPhat;
        $tuyenXe->DiemDen = $request->DiemDen;
        $tuyenXe->TongThoiGian = $request->TongThoiGian;
        $tuyenXe->Gia = $request->Gia;
        $tuyenXe->Active = $request->Active;

        $res = $tuyenXe->save();

        if ($res) {
            Session::flash('success', 'Thêm thành công');
        } else {
            Session::flash('error', 'Đã xảy ra lỗi');
        }

        return redirect()->back();
    }

    // Cập nhật Tuyến Xe
    public function update($tuyenXe, $request): bool
    {
        // Kiểm tra điểm đến và điểm xuất phát không trùng nhau
        if ($request->DiemDen == $request->DiemXuatPhat) {
            Session::flash('error', 'Điểm đến và điểm xuất phát không được giống nhau!');
            return false;
        }

        try {
            $tuyenXe->TenTuyen = (string)$request->input('TenTuyen');
            $tuyenXe->DiemXuatPhat = (string)$request->input('DiemXuatPhat');
            $tuyenXe->DiemDen = (string)$request->input('DiemDen');
            $tuyenXe->TongThoiGian = (string)$request->input('TongThoiGian');
            $tuyenXe->Gia = (string)$request->input('Gia');
            $tuyenXe->Active = (string)$request->input('Active');

            $tuyenXe->save();

            Session::flash('success', 'Cập nhật tuyến xe thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Cập nhật lỗi');
            return false;
        }

        return true;
    }

    public function destroy($request)
    {
        $MaTuyen = (int)$request->input('id');
        $tuyenXe = TuyenXe::where('MaTuyen', $MaTuyen)->first();
        if ($tuyenXe) {
            return TuyenXe::where('MaTuyen', $MaTuyen)->delete();
        }
        return false;
    }
}