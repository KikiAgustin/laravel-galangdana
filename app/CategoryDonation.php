<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryDonation extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id', 'nama_kategori'
    ];

    protected $hidden = [];
}
