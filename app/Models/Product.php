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
        'image',

    ];

    public function category()
    {
        return $this->hasOne(categories::class, 'id', 'category_id');
    }
}
