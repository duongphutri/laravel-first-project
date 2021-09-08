<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thongtin extends Model
{

    protected $fillable = [
        'size',
        'dungluong',
        'mau',
        // 'soluong',
        'chitiet',
    ];
    use HasFactory;

    public function mathangs()
    {
        return $this->hasMany(mathang::class, 'id_thongtin', 'id');
    }
}
