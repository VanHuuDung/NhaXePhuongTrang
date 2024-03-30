<?php

namespace App\Http\Controllers;

use App\Http\Requests\Xe\CreateFormRequest;
use App\Models\chitietdatve;
use App\Models\chuyenxe;
use App\Models\datve;
use App\Models\diadiem;
use App\Models\khachhang;
use DateTime;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use App\Models\tuyenxe;
use DateTimeZone;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class MainController extends Controller
{
    public function index (){
        $tuyenHCM = tuyenxe::join('diadiem as d1', 'tuyenxe.DiemXuatPhat', '=', 'd1.MaDiaDiem')
        ->join('diadiem as d2', 'tuyenxe.DiemDen', '=', 'd2.MaDiaDiem')
        ->where('d1.tendiadiem', '=', 'TP.HCM')
        ->select('MaTuyen', 'TenTuyen', 'd1.TenDiaDiem as XuatPhat', 'd2.TenDiaDiem as Den', 'TongThoiGian', 'Gia')
        ->limit(3)
        ->get();

        $tuyenVT = tuyenxe::join('diadiem as d1', 'tuyenxe.DiemXuatPhat', '=', 'd1.MaDiaDiem')
        ->join('diadiem as d2', 'tuyenxe.DiemDen', '=', 'd2.MaDiaDiem')
        ->where('d1.tendiadiem', '=', 'Vũng Tàu')
        ->select('MaTuyen', 'TenTuyen', 'd1.TenDiaDiem as XuatPhat', 'd2.TenDiaDiem as Den', 'TongThoiGian', 'Gia')
        ->limit(3)
        ->get();

        $tuyenDL = tuyenxe::join('diadiem as d1', 'tuyenxe.DiemXuatPhat', '=', 'd1.MaDiaDiem')
        ->join('diadiem as d2', 'tuyenxe.DiemDen', '=', 'd2.MaDiaDiem')
        ->where('d1.tendiadiem', '=', 'Đà Lạt')
        ->select('MaTuyen', 'TenTuyen', 'd1.TenDiaDiem as XuatPhat', 'd2.TenDiaDiem as Den', 'TongThoiGian', 'Gia')
        ->limit(3)
        ->get();

        $diemxuatphat = diadiem::orderBy('TenDiaDiem', 'asc')->get();
        $diemden = diadiem::orderBy('TenDiaDiem', 'desc')->get();

        return view('trangchu', [
            'title' => 'Web bán vé xe Phương Trang',
            'tuyenHCM' => $tuyenHCM,
            'tuyenVT' => $tuyenVT,
            'tuyenDL' => $tuyenDL,
            'diemxuatphat' => $diemxuatphat,
            'diemden' => $diemden,
        ]);
    }

    public function ChuyenXeThuocTuyen($MaTuyen)
    {
        $date = Carbon::now();
        $date->setTimezone('Asia/Ho_Chi_Minh');
        $today = $date->copy()->toDateString();
        $tuyenxe = tuyenxe::find($MaTuyen);
        $from = $tuyenxe->DiemXuatPhat;
        $to = $tuyenxe->DiemDen;

        // $tuyen = chuyenxe::join('tuyenxe', 'chuyenxe.MaTuyen', '=', 'tuyenxe.MaTuyen')
        // ->join('diadiem as d1', 'tuyenxe.DiemXuatPhat', '=', 'd1.MaDiaDiem')
        // ->join('diadiem as d2', 'tuyenxe.DiemDen', '=', 'd2.MaDiaDiem')
        // ->join('ngayle', 'chuyenxe.MaNgayLe', '=', 'ngayle.Id')
        // ->join('taixe', 'chuyenxe.MaTaiXe', '=', 'taixe.MaTaiXe')
        // ->join('xe', 'chuyenxe.MaXe', '=', 'xe.MaXe')
        // ->join('loaixe', 'xe.MaLoaiXe', '=', 'loaixe.MaLoaiXe')
        // ->join('theloai', 'xe.MaTheLoai', '=', 'theloai.MaTheLoai')
        // ->join('chitietdatve', 'chuyenxe.MaChuyenXe', '=', 'chitietdatve.MaChuyenXe')
        // ->where('chuyenxe.MaTuyen', $MaTuyen)
        // ->whereRaw("NgayXuatPhat > ?",[$date])
        // ->whereDate('NgayXuatPhat', $date)
        // ->select('chuyenxe.*', 'd1.TenDiaDiem as XuatPhat', 'd2.TenDiaDiem as Den', 'TongThoiGian', 'Gia', 'GiaTang', 'TenTaiXe', 'BienSoXe','loaixe.SoCho',DB::raw('COUNT(MaGhe) as ghe'), 'TenTheLoai')
        // ->groupBy('chuyenxe.MaChuyenXe')
        // ->get();
        $tuyen = chuyenxe::join('tuyenxe', 'chuyenxe.MaTuyen', '=', 'tuyenxe.MaTuyen')
        ->join('diadiem as d1', 'tuyenxe.DiemXuatPhat', '=', 'd1.MaDiaDiem')
        ->join('diadiem as d2', 'tuyenxe.DiemDen', '=', 'd2.MaDiaDiem')
        ->join('ngayle', 'chuyenxe.MaNgayLe', '=', 'ngayle.Id')
        ->join('taixe', 'chuyenxe.MaTaiXe', '=', 'taixe.MaTaiXe')
        ->join('xe', 'chuyenxe.MaXe', '=', 'xe.MaXe')
        ->join('loaixe', 'xe.MaLoaiXe', '=', 'loaixe.MaLoaiXe')
        ->join('theloai', 'xe.MaTheLoai', '=', 'theloai.MaTheLoai')
        ->where('chuyenxe.MaTuyen', $MaTuyen)
        ->whereRaw("NgayXuatPhat > ?",[$date])
        ->whereDate('NgayXuatPhat', $date)
        ->select('chuyenxe.*', 'd1.TenDiaDiem as XuatPhat', 'd2.TenDiaDiem as Den', 'TongThoiGian', 'Gia', 'GiaTang', 'TenTaiXe', 'BienSoXe','loaixe.SoCho', 'TenTheLoai')
        ->addSelect(['ghe' => chitietdatve::selectRaw('COUNT(MaGhe)')->whereColumn('chuyenxe.MaChuyenXe', 'chitietdatve.MaChuyenXe')])
        ->groupBy('chuyenxe.MaChuyenXe')
        ->orderBy('chuyenxe.NgayXuatPhat', 'asc')
        ->paginate(5);


        $diemxuatphat = diadiem::orderBy('TenDiaDiem', 'asc')->get();
        $diemden = diadiem::orderBy('TenDiaDiem', 'desc')->get();

        $d = tuyenxe::where('tuyenxe.MaTuyen', $MaTuyen)
        ->get();
        // $a = $diemxuatphat->merge($diemden);

        return view('chuyenxetheotuyen', [
            'title'=>'Tuyến Xe',
            'tuyen' => $tuyen,
            'diemxuatphat' => $diemxuatphat,
            'diemden' => $diemden,
            'd' => $d,
            'today' => $today,
            'from' => $from,
            'to' => $to
        ]);
    }


    public function search(Request $request)
    {
        $from = $request->input('from');
        $to = $request->input('to');
        $date = $request->input('date');
        $now = Carbon::now();
        $now->setTimezone('Asia/Ho_Chi_Minh');

        $search_chuyen = ChuyenXe::join('tuyenxe', 'chuyenxe.MaTuyen', '=', 'tuyenxe.MaTuyen')
        ->join('diadiem as d1', 'tuyenxe.DiemXuatPhat', '=', 'd1.MaDiaDiem')
        ->join('diadiem as d2', 'tuyenxe.DiemDen', '=', 'd2.MaDiaDiem')
        ->join('ngayle', 'chuyenxe.MaNgayLe', '=', 'ngayle.Id')
        ->join('taixe', 'chuyenxe.MaTaiXe', '=', 'taixe.MaTaiXe')
        ->join('xe', 'chuyenxe.MaXe', '=', 'xe.MaXe')
        ->join('loaixe', 'xe.MaLoaiXe', '=', 'loaixe.MaLoaiXe')
        ->join('theloai', 'xe.MaTheLoai', '=', 'theloai.MaTheLoai')
        // ->join('chitietdatve', 'chuyenxe.MaChuyenXe', '=', 'chitietdatve.MaChuyenXe')
        ->where('d1.MaDiaDiem', $from)
        ->where('d2.MaDiaDiem', $to)
        ->whereDate('NgayXuatPhat', $date)
        ->whereRaw("NgayXuatPhat > ?",[$now])
        ->when(request()->has('thoi_gian_xuatphat'), function ($query) {
            $thoiGianXuatPhat = request()->input('thoi_gian_xuatphat', []);
    
            $query->where(function ($subquery) use ($thoiGianXuatPhat) {
                foreach ($thoiGianXuatPhat as $thoiGian) {
                    if ($thoiGian === 'sang_som') {
                        $subquery->orWhere(function ($orSubquery) {
                            $orSubquery->whereRaw("TIME(NgayXuatPhat) >= '00:00:00'")
                                ->whereRaw("TIME(NgayXuatPhat) < '06:00:00'");
                        });
                    } elseif ($thoiGian === 'buoi_sang') {
                        $subquery->orWhere(function ($orSubquery) {
                            $orSubquery->whereRaw("TIME(NgayXuatPhat) >= '06:00:00'")
                                ->whereRaw("TIME(NgayXuatPhat) < '12:00:00'");
                        });
                    } elseif ($thoiGian === 'buoi_chieu') {
                        $subquery->orWhere(function ($orSubquery) {
                            $orSubquery->whereRaw("TIME(NgayXuatPhat) >= '12:00:00'")
                                ->whereRaw("TIME(NgayXuatPhat) < '18:00:00'");
                        });
                    } elseif ($thoiGian === 'buoi_toi') {
                        $subquery->orWhere(function ($orSubquery) {
                            $orSubquery->whereRaw("TIME(NgayXuatPhat) >= '18:00:00'")
                                ->whereRaw("TIME(NgayXuatPhat) < '24:00:00'");
                        });
                    }
                }
            });
        })
        ->select('chuyenxe.*', 'd1.TenDiaDiem as XuatPhat', 'd2.TenDiaDiem as Den', 'TongThoiGian', 'Gia', 'GiaTang', 'TenTaiXe', 'BienSoXe','loaixe.SoCho', 'TenTheLoai')
        ->addSelect(['ghe' => chitietdatve::selectRaw('COUNT(MaGhe)')->whereColumn('chuyenxe.MaChuyenXe', 'chitietdatve.MaChuyenXe')])
        ->groupBy('chuyenxe.MaChuyenXe')
        ->orderBy('chuyenxe.NgayXuatPhat', 'asc')
        ->paginate(5);
        $diemxuatphat = diadiem::orderBy('TenDiaDiem', 'asc')->get();
        $diemden = diadiem::orderBy('TenDiaDiem', 'desc')->get();

        
        return view('chuyenxetheotuyen', [
            'title'=>'Tuyến Xe',
            'tuyen' => $search_chuyen,
            'diemxuatphat' => $diemxuatphat,
            'diemden' => $diemden,
            'today' => $date,
            'from' => $from,
            'to' => $to
        ]);
    }

    public function search_index(Request $request)
    {
        $from = $request->input('from');
        $to = $request->input('to');
        $date = $request->input('date');
        $now = Carbon::now();
        $now->setTimezone('Asia/Ho_Chi_Minh');

        $search_chuyen = ChuyenXe::join('tuyenxe', 'chuyenxe.MaTuyen', '=', 'tuyenxe.MaTuyen')
        ->join('diadiem as d1', 'tuyenxe.DiemXuatPhat', '=', 'd1.MaDiaDiem')
        ->join('diadiem as d2', 'tuyenxe.DiemDen', '=', 'd2.MaDiaDiem')
        ->join('ngayle', 'chuyenxe.MaNgayLe', '=', 'ngayle.Id')
        ->join('taixe', 'chuyenxe.MaTaiXe', '=', 'taixe.MaTaiXe')
        ->join('xe', 'chuyenxe.MaXe', '=', 'xe.MaXe')
        ->join('loaixe', 'xe.MaLoaiXe', '=', 'loaixe.MaLoaiXe')
        ->join('theloai', 'xe.MaTheLoai', '=', 'theloai.MaTheLoai')
        // ->join('chitietdatve', 'chuyenxe.MaChuyenXe', '=', 'chitietdatve.MaChuyenXe')
        ->where('d1.MaDiaDiem', $from)
        ->where('d2.MaDiaDiem', $to)
        ->whereDate('NgayXuatPhat', $date)
        ->whereRaw("NgayXuatPhat > ?",[$now])
        // ->select('chuyenxe.*', 'd1.TenDiaDiem as XuatPhat', 'd2.TenDiaDiem as Den', 'TongThoiGian', 'Gia', 'GiaTang', 'TenTaiXe', 'BienSoXe', 'loaixe.SoCho', DB::raw('COUNT(MaGhe) as ghe'), 'TenTheLoai')
        ->select('chuyenxe.*', 'd1.TenDiaDiem as XuatPhat', 'd2.TenDiaDiem as Den', 'TongThoiGian', 'Gia', 'GiaTang', 'TenTaiXe', 'BienSoXe','loaixe.SoCho', 'TenTheLoai')
        ->addSelect(['ghe' => chitietdatve::selectRaw('COUNT(MaGhe)')->whereColumn('chuyenxe.MaChuyenXe', 'chitietdatve.MaChuyenXe')])
        ->groupBy('chuyenxe.MaChuyenXe')
        ->orderBy('chuyenxe.NgayXuatPhat', 'asc')
        ->paginate(5);
        $diemxuatphat = diadiem::orderBy('TenDiaDiem', 'asc')->get();
        $diemden = diadiem::orderBy('TenDiaDiem', 'desc')->get();
        
        return view('chuyenxetheotuyen', [
            'title'=>'Tuyến Xe',
            'tuyen' => $search_chuyen,
            'diemxuatphat' => $diemxuatphat,
            'diemden' => $diemden,
            'today' => $date,
            'from' => $from,
            'to' => $to
        ]);
    }

    public function laySoGhe($MaChuyenXe) {
        $chuyenXes = ChuyenXe::join('xe', 'chuyenxe.MaXe', '=', 'xe.MaXe')
        ->join('loaixe', 'xe.MaLoaiXe', '=', 'loaixe.MaLoaiXe')
        ->select('chuyenxe.*', 'loaixe.SoCho as SoCho')
        ->where('chuyenxe.MaChuyenXe', $MaChuyenXe)
        ->get();

        $datVe = ChiTietDatVe::join('chuyenxe', 'chitietdatve.MaChuyenXe', '=', 'chuyenxe.MaChuyenXe')
        ->where('chuyenxe.MaChuyenXe', $MaChuyenXe)
        ->pluck('MaGhe')->toArray();
        
        return view('ghengoi', [
            'chuyenXes' => $chuyenXes,
            'datVe' => $datVe,
            'maChuyenXe' => $MaChuyenXe,
            'carts' => Session::get('carts')
        ]);

    }

    public function datGhe(Request $request, $maChuyenXe){
        $gheDaDat = $request -> input('selected_seats');
        //Lấy mã khách hàng từ khách hàng hiện tại đang đăng nhập
        $maKhachHang = 1;
        //tạo vé
        $newVe = new datve();
        $newVe -> NgayDat = new DateTime('now', new DateTimeZone('Asia/Ho_Chi_Minh'));
        $newVe -> MaKhachHang = $maKhachHang;
        //tổng tiền sau khi thực hiện thêm chitietdatve
        $newVe -> TongTien = 0;
        $newVe -> save();

        $maDatVe = $newVe -> MaDatVe;

        //thêm chitietdatve
        foreach($gheDaDat as $soGhe)
        {
            $chitietdatve = new chitietdatve();
            $chitietdatve -> MaChuyenXe = $maChuyenXe;
            $chitietdatve -> MaDatVe = $maDatVe;
            $chitietdatve -> MaGhe = $soGhe;
            $chitietdatve -> save();
        }
        return $this -> laySoGhe($maChuyenXe);
    }

    public function hoadon(Request $request)
    {
        // Kiểm tra xem khách hàng đã đăng nhập hay chưa
        if ($request->session()->has('loginId_khachhang')) {
            // Lấy thông tin khách hàng từ session
            $khachHang = $request->session()->get('loginId_khachhang');

            // Lấy danh sách hóa đơn của khách hàng
            $datVeList = DatVe::where('MaKhachHang', $khachHang->MaKhachHang)->get();

            return view('danh_sach_hoa_don', [
                'datVeList' => $datVeList,
                'khachhang' => $khachHang->MaKhachHang
            ]);

        } else {
            // Khách hàng chưa đăng nhập, bạn có thể chuyển hướng hoặc thực hiện hành động khác
            return redirect()->route('login_khachhang');
        }
    }
}
