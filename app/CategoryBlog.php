<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryBlog extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'blog_id', 'kategori'
    ];

    protected $hidden = [];
}
