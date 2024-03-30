<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chuyenxe extends Model
{
    use HasFactory;
    protected $table = "chuyenxe";  
    protected $primaryKey = 'MaChuyenXe';
    protected $fillable = [
        'MaTuyen',
        'NgayXuatPhat',
        'MaNhanVien',
        'MaXe',
        'MaTaiXe',
        'MaNgayLe',
        'DaChay'
    ];
    public $timestamps = false;
    public function tuyenxe()
    {
        return $this->belongsTo(tuyenxe::class,'MaTuyen');
        // return $this->hasOne(tuyenxe::class, 'MaTuyen', 'MaTuyen')
        //     ->withDefault(['TenTuyen' => '']);
    }
    public function xe()
    {
        return $this->hasOne(xe::class, 'MaXe', 'MaXe')
            ->withDefault(['BienSoXe' => '']);
    }

    public function taixe()
    {
        return $this->hasOne(taixe::class, 'MaTaiXe', 'MaTaiXe')
            ->withDefault(['TenTaiXe' => '']);
    }
    public function nhanvien()
    {
        return $this->hasOne(nhanvien::class, 'Id', 'MaNhanVien')
            ->withDefault(['HoTen' => '']);
    }
    public function ngayle()
    {
        return $this->hasOne(ngayle::class, 'Id', 'MaNgayLe')
            ->withDefault(['TenNgayLe' => '']);
    }
}
