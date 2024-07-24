<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skills extends Model
{
    use HasFactory;

    protected $fillable = [
        'profile_id',
        'skill_name',
        'skill_percentage',
    ];

    public function personalInformation()
    {
        return $this->belongsTo(PersonalInformation::class, 'profile_id', 'id');
    }
}

