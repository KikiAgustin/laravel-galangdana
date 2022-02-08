<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CommentBlog extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id_blogs', 'user_id', 'komentar'
    ];

    protected $hidden = [];

    public function data_user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
