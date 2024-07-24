<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Languages extends Model
{
    use HasFactory;

    protected $fillable = [
        'profile_id',
        'language',
        'language_level',
    ];

    public function personalInformation()
    {
        return $this->belongsTo(PersonalInformation::class, 'profile_id', 'id');
    }
}

