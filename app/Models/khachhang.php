<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class khachhang extends Model
{
    use HasFactory;
    protected $table = "khachhang";  
    protected $primaryKey = 'MaKhachHang';
    protected $fillable = [
        'TenKhachHang',
        'Email',
        'Password',
        'Active',
    ];
    public $timestamps = false;
}