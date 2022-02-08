<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Distribution extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'judul', 'penyaluran', 'gambar', 'program_id', 'tanggal_penyaluran'
    ];

    protected $hidden = [];
}
