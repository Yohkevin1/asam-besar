<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sakramen extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'sakramen';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'title',
        'description',
        'img_header',
        'status'
    ];
}
