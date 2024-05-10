<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Renungan extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'renungan';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'id',
        'title',
        'date',
        'description',
        'img_header',
        'status'
    ];

    protected $casts = [
        'id' => 'string',
    ];
}
