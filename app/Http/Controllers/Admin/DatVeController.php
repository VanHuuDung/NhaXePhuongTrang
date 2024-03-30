<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\DatVe\DatVeService;
use App\Models\chitietdatve;
use App\Models\datve;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DatVeController extends Controller
{
    protected $datveservice;
    public function __construct(DatVeService $datveservice)
    {
        $this->datveservice = $datveservice;
    }

    public function index()
    {
        return view('admin.datve.datve',[  
           'title'=>'Danh sách vé xe',
           'vexe'=> $this->datveservice->getAll()
        ]);
    }

    public function show($MaDatVe)
    {
        $chitietdatve = chitietdatve::join('chuyenxe', 'chitietdatve.MaChuyenXe', '=', 'chuyenxe.MaChuyenXe')
        ->join('tuyenxe', 'chuyenxe.MaTuyen', '=', 'tuyenxe.MaTuyen')
        ->where('chitietdatve.MaDatVe', $MaDatVe)
        ->select('chitietdatve.*', 'tuyenxe.TenTuyen as Tuyen')
        ->get();
        
        return view('admin.chitietdatve.chitietdatve', [
            'title'=>'Chi tiết vé xe'
        ],compact('chitietdatve'));
    }
    public function xacnhan($MaDatVe)
    {
        $vedat = datve::where('MaDatVe','=', $MaDatVe)->with('khachhang')->first();
        $chitietdatves = chitietdatve::join('chuyenxe', 'chitietdatve.MaChuyenXe', '=', 'chuyenxe.MaChuyenXe')
        ->join('tuyenxe', 'chuyenxe.MaTuyen', '=', 'tuyenxe.MaTuyen')
        ->join('xe', 'chuyenxe.MaXe', '=', 'xe.MaXe')   
        ->where('chitietdatve.MaDatVe', $MaDatVe)
        ->select('chitietdatve.*', 'tuyenxe.TenTuyen as Tuyen','tuyenxe.Gia as Gia' , 'xe.BienSoXe as BienSoXe', 'chuyenxe.*')
        ->get();

        return view('admin.datve.xacnhan',[  
           'title'=>'Xác Nhận Vé Xe',
           'vedat'=> $vedat,
           'chitietdatves' => $chitietdatves
        ]);
    }
    public function savexacnhan($MaDatVe)
    {
        $result = $this->datveservice->insertxacnhan($MaDatVe);
        $vedat = datve::where('MaDatVe','=', $MaDatVe)->with('khachhang')->first();
        $chitietdatves = chitietdatve::join('chuyenxe', 'chitietdatve.MaChuyenXe', '=', 'chuyenxe.MaChuyenXe')
        ->join('tuyenxe', 'chuyenxe.MaTuyen', '=', 'tuyenxe.MaTuyen')
        ->join('xe', 'chuyenxe.MaXe', '=', 'xe.MaXe')   
        ->where('chitietdatve.MaDatVe', $MaDatVe)
        ->select('chitietdatve.*', 'tuyenxe.TenTuyen as Tuyen','tuyenxe.Gia as Gia' , 'xe.BienSoXe as BienSoXe', 'chuyenxe.*')
        ->get();

      
        if($result===true){
           Session::flash('success','Xác Nhận Thành Công!');
           return view('admin.datve.hoadon',[  
            'title'=>'In Hoá Đơn',
            'vedat'=> $vedat,
            'chitietdatves' => $chitietdatves
         ]);
           //return redirect()->route('ve');
        }
        else
        {
            Session::flash('error','Đã Xảy ra Lỗi !!');
            return redirect()->back();
        }
    }
}
