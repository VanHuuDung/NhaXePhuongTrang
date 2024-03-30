<?php
namespace App\Http\Services\DatVe;

use App\Models\datve;
use App\Models\xacnhan;
use DateTime;
use DateTimeZone;
use Exception;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Support\Facades\Session; 
use Illuminate\Support\Str;
class DatVeService{
    public function getAll(){
        return datve::with('tinhtrang')->with('khachhang')->orderByDesc('MaDatVe')->paginate(15);
    }
    public function insertxacnhan($MaDatVe){
        try{
            $id_nhanvien = session("loginId")->Id;
            $xacnhan = new xacnhan() ;
            $xacnhan->MaDatVe = $MaDatVe;
            $xacnhan->MaNhanVien =$id_nhanvien ;
            $xacnhan->ThoiGian = new DateTime('now', new DateTimeZone('Asia/Ho_Chi_Minh'));
            $xacnhan->DaNhanTien = 1 ;
            $xacnhan->save();
            return true;
        }catch(\Exception $e){
            return false;
        }
        
    }
}