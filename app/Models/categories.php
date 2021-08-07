<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use League\CommonMark\Inline\Element\Image;

class categories extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }
    public function image_category()
    {
        return $this->morphOne(images::class, 'imageable', 'imageable_object', 'imageable_id');
    }
}
