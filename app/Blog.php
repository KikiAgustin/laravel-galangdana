<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'judul', 'slug', 'kategori', 'lengkap', 'gambar', 'penulis', 'singkat', 'dilihat'
    ];

    protected $hidden = [];

    public function category()
    {
        return $this->belongsTo(CategoryBlog::class, 'kategori', 'id');
    }
}
