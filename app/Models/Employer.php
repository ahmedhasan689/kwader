<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Employer extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'avatar',
        'date_of_birth',
        'bio',
        'gender',
        'company_id',
        'country_id',
        'language_id',
    ];

    /**
     * Relations
     * With User Model ( One To One )
     * With Company ( One To One 1-1 ) - Reverse Relation
     * With Country ( One To Many 1-m ) - Reverse Relation
     * With Language ( One To Many 1-m ) - Reverse Relation
     */

    // With User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // With Company
    public function company()
    {
        return $this->belongsTo(Company::class);
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
}
