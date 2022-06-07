<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'country_name'
    ];

    /**
     * Relation
     * With Employer ( One To Many 1-m )
     * With User ( One To Many 1-m )
     * With Company
     */

    // With Employer
    public function employer()
    {
        return $this->hasOne(Employer::class);
    }

    // With User
    public function user()
    {
        return $this->hasOne(User::class);
    }

    // With Company
    public function company()
    {
        return $this->hasOne(Company::class);
    }
}
