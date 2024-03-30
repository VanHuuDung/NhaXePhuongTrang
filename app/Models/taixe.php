<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class taixe extends Model
{
    use HasFactory;
    protected $table = "taixe";  
    protected $primaryKey = 'MaTaiXe';
    protected $fillable = [
        'TenTaiXe',
        'NgaySinh',
        'CMND',
        'SDT',
        'Active'
    ];
    public $timestamps = false;
}
