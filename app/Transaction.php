<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id', 'program_donations_id', 'nama_lengkap', 'email', 'jumlah_donasi', 'status_transaksi', 'doa', 'samarkan', 'kategori_program', 'invoice'
    ];

    protected $hidden = [];

    public function program_donation()
    {
        return $this->belongsTo(ProgramDonation::class, 'program_donations_id', 'id');
    }

    public function category_program()
    {
        return $this->belongsTo(CategoryDonation::class, 'kategori_program', 'id');
    }
}
