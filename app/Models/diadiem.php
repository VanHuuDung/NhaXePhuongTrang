<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class diadiem extends Model
{
    use HasFactory;
    protected $table = "diadiem";  
    protected $primaryKey = 'MaDiaDiem';
    protected $fillable = [
        'TenDiaDiem',
    ];
    public $timestamps = false;
    
}