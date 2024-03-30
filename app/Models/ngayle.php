<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ngayle extends Model
{
    use HasFactory;
    protected $table = "ngayle";  
    protected $primaryKey = 'Id';
    protected $fillable = [
        'Ngay',
        'TenNgayLe',
        'GiaTang'
    ];
    public $timestamps = false;

}
