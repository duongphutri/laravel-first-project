<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class donhang extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_mathang',
        'nguoimua',
        'ngaymua',
        'tongtien',
        'trangthai',
    ];
    public function image_mathang()
    {
        return $this->morphOne(images::class, 'imageable', 'imageable_object', 'imageable_id');
    }
    public function chitietdonhang()
    {
        return $this->hasMany(chitietdonhang::class, 'id_donhang', 'id');
    }
    public function mathangs()
    {
        return $this->hasOne(mathang::class, 'id', 'id_mathang');
    }
    
}
