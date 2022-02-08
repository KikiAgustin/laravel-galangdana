<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'tentang', 'tujuan', 'visi', 'misi'
    ];

    protected $hidden = [];

    public function program_donation()
    {
        return $this->belongsTo(ProgramDonation::class, 'program_donations_id', 'id');
    }
}
