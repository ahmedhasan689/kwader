<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'language_name',
    ];

    /**
     * Relation
     * With Employer ( One To Many 1-m )
     * With User ( One To Many 1-m )
     */

    // With Employer
    public function employer()
    {
        return $this->hasOne(Employer::class);
    }

    // With Employee
    public function employee()
    {
        return $this->hasOne(Employee::class);
    }

    // With User
    public function user()
    {
        return $this->hasOne(User::class);
    }
}
