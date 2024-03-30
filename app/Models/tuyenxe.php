<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tuyenxe extends Model
{
    use HasFactory;

    protected $table = "tuyenxe";  
    protected $primaryKey = 'MaTuyen';
    protected $fillable = [
        'TenTuyen',
        'DiemXuatPhat',
        'DiemDen',
        'TongThoiGian',
        'Gia'
    ];
    public $timestamps = false;
    public function chuyenxes()
    {
        return $this->hasMany(chuyenxe::class, 'MaTuyen');
    }
}