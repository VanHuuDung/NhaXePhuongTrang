<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class datve extends Model
{
    use HasFactory;
    protected $table = "datve";  
    protected $primaryKey = 'MaDatVe';
    protected $fillable = [
        'MaKhachHang',
        'NgayDat',
        'TongTien',
    ];
    public $timestamps = false;
    public function khachhang()
    {
        return $this->hasOne(khachhang::class, 'MaKhachHang', 'MaKhachHang')
            ->withDefault(['HoTen' => '']);
    }
    public function tinhtrang()
    {
        return $this->hasOne(xacnhan::class, 'MaDatVe', 'MaDatVe')
            ->withDefault(['DaNhanTien' => '']);    
    }
}