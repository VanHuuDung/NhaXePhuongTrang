<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class loaixe extends Model
{
    protected $table = "loaixe";
    protected $primaryKey = 'MaLoaiXe';
    protected $fillable = [
        "MaLoaiXe",
        "SoCho"
    ];
    use HasFactory;
}
