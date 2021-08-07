<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mathang extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_product',
        // 'id_category',
        'name',
        'gia',
        'is_sale',
        'is_hot',
        'is_new',
        'is_show',
    ];
    public function image_mathang()
    {
        return $this->morphOne(images::class, 'imageable', 'imageable_object', 'imageable_id');
    }
    public function products()
    {
        return $this->hasOne(Product::class, 'id', 'id_product');
    }
}
