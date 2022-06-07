<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'employer_id',
        'company_name',
        'legal_status',
        'visual_identity',
        'company_email',
        'registration_number',
        'website',
        'address',
        'postal',
        'fax_number',
        'country_id',
    ];

    /**
     * Relations
     * With Employer ( One To One 1-1 )
     * With Contact ( One To One 1-1)
     * with Country (One To One 1-1)
     */

    // With Employer
    public function employer()
    {
        return $this->hasOne(Employer::class);
    }

    public function contact()
    {
        return $this->hasOne(Contact::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

}
