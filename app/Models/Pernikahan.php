<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pernikahan extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'pernikahan';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'id',
        'title',
        'post_date',
        'end_date',
        'description',
        'foto',
        'status'
    ];

    protected $casts = [
        'id' => 'string',
    ];
}
