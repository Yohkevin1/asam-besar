<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'profile';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'title',
        'description',
        'img_header',
        'status'
    ];
}
