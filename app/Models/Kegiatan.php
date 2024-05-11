<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kegiatan extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'kegiatan';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'id',
        'title',
        'location',
        'date',
        'description',
        'img_header',
        'status',
    ];

    protected $casts = [
        'id' => 'string',
    ];

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class, 'id_kegiatan', 'id');
    }
}
