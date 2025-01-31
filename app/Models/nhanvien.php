<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nhanvien extends Model
{
    use HasFactory;
    protected $table = "nhanvien";  
    protected $primaryKey = 'Id';
    protected $fillable = [
        'HoTen',
        'Password',
        'NgaySinh',
        'SDT',
        'CMND',
        'Email',
        'MaQuyen',
        'Active'
    ];
    public $timestamps = false;
    public function quyen()
    {
        return $this->hasOne(quyen::class, 'MaQuyen', 'MaQuyen')
            ->withDefault(['TenQuyen' => '']);
    }
}
