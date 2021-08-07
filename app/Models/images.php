<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class images extends Model
{
    use HasFactory;

    protected $fillable = [

        'file_nm',
        'file_cd',
        'file_origin',
        'imageable_id',
        'imageable_object',
        'file_type',
        'created_by',
        'order',
        'size',
    ];
    public function imagelable()
    {
        return $this->morphTo(__FUNCTION__, 'imageable_object', 'imageable_id');
    }
}
