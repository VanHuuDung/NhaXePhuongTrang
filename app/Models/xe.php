<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class xe extends Model
{
    use HasFactory;
    protected $table = "xe";  
    protected $primaryKey = 'MaXe';
    protected $fillable = [
        'TenXe',
        'BienSoXe',
        'HinhAnh',
        'MaLoaiXe',
        'MaTheLoai'
    ];
    public function loaixe()
    {
        return $this->hasOne(loaixe::class, 'MaLoaiXe', 'MaLoaiXe')
            ->withDefault(['SoCho' => '']);
    }
    public function theloai()
    {
        return $this->hasOne(theloai::class, 'MaTheLoai', 'MaTheLoai')
            ->withDefault(['TenTheLoai' => '']);
    }
}
