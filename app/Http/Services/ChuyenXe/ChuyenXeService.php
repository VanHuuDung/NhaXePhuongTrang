<?php
namespace App\Http\Services\ChuyenXe;

use App\Models\chuyenxe;
use App\Models\ngayle;
use App\Models\taixe;
use App\Models\tuyenxe;
use App\Models\user;
use Illuminate\Support\Facades\DB;
use App\Models\xe;
use Exception;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Support\Facades\Session; 
use Illuminate\Support\Str;
use Carbon\Carbon;
class ChuyenXeService{
    public function getAll(){
        return chuyenxe::with('tuyenxe')->orderByDesc('MaChuyenXe')->paginate(15);
    }



    public function getTuyenXe()
    {
        return tuyenxe::get();
    }
    public function getXe()
    {
        return xe::get();
    }
    public function getTaiXe(){
        return taixe::get();
    }


    public function getNgayLe(){
        return ngayle::get();
    }


    public function create($request){
        $matuyen = (int) $request->input('MaTuyen');
        $tg = DB::select(DB::raw('SELECT TongThoiGian FROM tuyenxe WHERE MaTuyen = ?'),
        [$matuyen]);
        $gio = 0;
        foreach($tg as $t){
            $gio = $t->TongThoiGian;
        }
        $ngay = (string) $request->input('NgayXuatPhat');
        $ngayxp =  Carbon::parse($ngay);
        $ngayd = $ngayxp->copy()->addMinutes($gio*60);
        $maxe =(int) $request->input('Maxe');
        $mataixe =(int) $request->input('MaTaiXe');
        

        $kt = DB::select(DB::raw('SELECT * FROM chuyenxe WHERE NgayXuatPhat >= ? and NgayXuatPhat <= ? AND (MaXe = ? OR MaTaiXe = ?)'),
        [$ngayxp, $ngayd, $maxe, $mataixe]);

        // $kt = DB::select(DB::raw('SELECT * FROM chuyenxe WHERE NgayXuatPhat BETWEEN ? and ? and NgayXuatPhat BETWEEN ? and ? AND (MaXe = ? OR MaTaiXe = ?)'),
        // [$ngayxp, $ngayd, $ngayxp, $ngayd, $maxe, $mataixe]);
        // dd($ngay, $ngayxp, $ngayd, $maxe, $mataixe, $kt, $tg);
        if(!$kt){
            try{
                return chuyenxe::create([
                    'MaTuyen' => (int) $request->input('MaTuyen'),
                    'NgayXuatPhat' => (string) $request->input('NgayXuatPhat'),
                    'MaNhanVien' => session("loginId")->Id,
                    'MaXe' => (int) $request->input('Maxe'),
                    'MaTaiXe' => (int) $request->input('MaTaiXe'),
                    'MaNgayLe' => (double) $request->input('MaNgayLe')
                ]);
                Session::flash('success', 'Thêm chuyến xe thành công');
            } catch(Exception $ex){
                 Session::flash('error', $ex->getMessage());
                 return false;
            }
            return true;
        }else{
            
            return redirect()->back()->with('error', 'Chuyến xe này đã trùng lịch');
        }

    }

    

    public function update($chuyenxe, $request): bool
    {
        $matuyen = (int) $request->input('MaTuyen');
        $tg = DB::select(DB::raw('SELECT TongThoiGian FROM tuyenxe WHERE MaTuyen = ?'),
        [$matuyen]);
        $gio = 0;
        foreach($tg as $t){
            $gio = $t->TongThoiGian;
        }
        $ngay = (string) $request->input('NgayXuatPhat');
        $ngayxp =  Carbon::parse($ngay);
        $ngayd = $ngayxp->copy()->addMinutes($gio*60);
        $maxe =(int) $request->input('Maxe');
        $mataixe =(int) $request->input('MaTaiXe');
        

        $kt = DB::select(DB::raw('SELECT * FROM chuyenxe WHERE NgayXuatPhat >= ? and NgayXuatPhat <= ? AND (MaXe = ? OR MaTaiXe = ?)'),
        [$ngayxp, $ngayd, $maxe, $mataixe]);
        // dd($ngay, $ngayxp, $ngayd, $maxe, $mataixe, $kt, $tg);
        if(!$kt){
            try {
                $chuyenxe->MaTuyen = (int) $request->input('MaTuyen');
                $chuyenxe->NgayXuatPhat = (string) $request->input('NgayXuatPhat');
                $chuyenxe->MaNhanVien = session("loginId")->Id;
                $chuyenxe->MaXe = (int) $request->input('Maxe');
                $chuyenxe->MaTaiXe = (int) $request->input('MaTaiXe');
                $chuyenxe->MaNgayLe = (double) $request->input('MaNgayLe');
                $chuyenxe->save();
                Session::flash('success', 'Cập nhậtchuyến thành công');
            } catch (\Exception $err) {
                Session::flash('error', 'Cập nhật lỗi');
                return false;
            }
            return true;
        }else{
            
            return false;
        }

    }

    public function destroy( $request)
    {
        $MaChuyenXe = (int)$request->input('MaChuyenXe');
        $chuyen = chuyenxe::where('MaChuyenXe', $MaChuyenXe)->first();
        if ($chuyen) {
            return chuyenxe::where('MaChuyenXe', $MaChuyenXe)->delete();
        }
        return false;
    }



}