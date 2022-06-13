<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'avatar',
        'job_title',
        'years_of_experience',
        'skills',
        'bio',
        'date_of_birth',
        'salary',
        'gender',
        'country_id',
        'language_id',
        'specialization',
        'field_id',
    ];

    protected $casts = [
        'skills' => 'json',
        'specialization' => 'json',
    ];

    /**
     * Relations
     * With User ( One To One 1-1 )
     * With Country ( One To Many 1-m )
     * With Language ( One To Many 1-m )
     */

    // With User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // With Country
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    // With Language
    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    // Accessors For avatar
    public function getImageAttribute()
    {
        if (!$this->avatar) {
            return asset('Front_Assets/img/default_avatar.jpg');
        }

        if (stripos($this->avatar, 'http') === 0) {
            return $this->avatar;
        }

        return asset('user_avatar' . '/' . $this->avatar);
    }
}
