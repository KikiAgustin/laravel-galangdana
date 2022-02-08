<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gallery extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'program_donations_id', 'image'
    ];

    protected $hidden = [];

    public function program_donation()
    {
        return $this->belongsTo(ProgramDonation::class, 'program_donations_id', 'id');
    }
}
