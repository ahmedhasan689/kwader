<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'legal_status',
        'visual_identity',
        'registration_number',
        'website',
        'address',
        'postal',
    ];

    /**
     * Relations
     * With Employer ( One To One 1-1 )
     */

    // With Employer
    public function employer()
    {
        return $this->hasOne(Employer::class);
    }

}
