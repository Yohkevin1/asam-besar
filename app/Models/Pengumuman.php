<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pengumuman extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'pengumuman';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'title',
        'post_date',
        'end_date',
        'description',
        'id_kegiatan',
        'img_header',
    ];
}
