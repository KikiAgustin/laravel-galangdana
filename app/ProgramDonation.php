<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProgramDonation extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id', 'judul', 'slug', 'kategori', 'dibutuhkan', 'terkumpul', 'detail', 'pengirim'
    ];

    protected $hidden = [];

    public function galleries()
    {
        return $this->hasMany(Gallery::class, 'program_donations_id', 'id');
    }

    public function transaction()
    {
        return $this->hasMany(Transaction::class, 'program_donations_id', 'id')->where('status_transaksi', 'SUCCESS');
    }

    public function category()
    {
        return $this->belongsTo(CategoryDonation::class, 'kategori', 'id');
    }

    public function data_distribution()
    {
        return $this->belongsTo(Distribution::class, 'id', 'program_id');
    }
}
