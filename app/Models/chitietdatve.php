<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chitietdatve extends Model
{
    use HasFactory;
    protected $table = "chitietdatve";  
    protected $primaryKey = 'Id';
    protected $fillable = [
        'MaDatVe',
        'MaChuyenXe',
        'MaGhe',
    ];
    public $timestamps = false;

}