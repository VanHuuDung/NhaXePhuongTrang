<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class xacnhan extends Model
{
    use HasFactory;
    protected $table = "xacnhan";  
    protected $primaryKey = 'MaDatVe';
    protected $fillable = [
        'MaNhanVien',
        'ThoiGian',
        'DaNhanTien',
    ];
    public $timestamps = false;
}
