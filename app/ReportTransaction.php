<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReportTransaction extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id', 'program_id', 'tanggal_transaksi', 'nama_transaksi', 'jumlah'
    ];

    protected $hidden = [];
}
