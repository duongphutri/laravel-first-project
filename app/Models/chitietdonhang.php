<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chitietdonhang extends Model
{
    use HasFactory;

    protected $fillable = [

        'id_donhang',
        'id_mathang',
        'soluong',
        'gia',
        'thanhtien',
    ];
    public function donhang()
    {
        return $this->hasOne(donhang::class, 'id', 'id_donhang');
    }
}
