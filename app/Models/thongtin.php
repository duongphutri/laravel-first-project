<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class thongtin extends Model
{
    use HasFactory;
    protected $fillable = [

        'size',
        'dungluong',
        'mau',
        'soluong',
        'chitiet',
    ];
}
