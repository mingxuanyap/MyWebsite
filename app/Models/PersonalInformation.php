<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalInformation extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'full_name',
        'age',
        'profile_title',
        'about_me',
        'image_path',
    ];

    public function contactInformation()
    {
        return $this->hasOne(ContactInformation::class, 'profile_id', 'id');
    }

    public function education()
    {
        return $this->hasMany(Education::class, 'profile_id', 'id');
    }

    public function experience()
    {
        return $this->hasMany(Experience::class, 'profile_id', 'id');
    }

    public function projects()
    {
        return $this->hasMany(Projects::class, 'profile_id', 'id');
    }

    public function skills()
    {
        return $this->hasMany(Skills::class, 'profile_id', 'id');
    }

    public function languages()
    {
        return $this->hasMany(Languages::class, 'profile_id', 'id');
    }
}
