<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IMG_Collection extends Model
{
    use HasFactory;

    protected $table = "img_collection";

    protected $fillable = [
        'id'
    ];

    protected $casts = [
        'id' => 'string'
    ];
}
