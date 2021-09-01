<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class baogia extends Model
{
    use HasFactory;

    protected $fillable = [
        'ten',
        'chungloai',
        'hang',
        'soluong',
        'thongtin',
        'dongia',
        'ghichu',
    ];
}
