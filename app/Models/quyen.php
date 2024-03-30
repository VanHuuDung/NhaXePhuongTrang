<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class quyen extends Model
{
    use HasFactory;

    protected $table = "quyen";  
    protected $primaryKey = 'MaQuyen';
    protected $fillable = [
        'TenQuyen',
    ];
    public $timestamps = false;
}
