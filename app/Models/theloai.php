<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class theloai extends Model
{
    protected $table = "theloai";
    protected $fillable = [
        "MaTheLoai",
        "TenTheLoai"
    ];
    use HasFactory;
}