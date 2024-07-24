<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    use HasFactory;

    protected $fillable = [
        'profile_id',
        'project_title',
        'project_description',
    ];

    public function personalInformation()
    {
        return $this->belongsTo(PersonalInformation::class, 'profile_id', 'id');
    }
}

