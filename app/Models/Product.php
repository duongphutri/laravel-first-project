<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category_id',
        'created_by',
        'is_show',
        // 'image',

    ];

    public function category()
    {
        return $this->hasOne(categories::class, 'id', 'category_id');
    }
    public function mathangs()
    {
        return $this->hasMany(mathang::class, 'id_product', 'id');
    }
    public function image_product()
    {
        return $this->morphOne(images::class, 'imageable', 'imageable_object', 'imageable_id');
    }
}
