<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'company_email',
        'website',
        'fax_number',
        'phone_number',
    ];

    /**
     * Relation
     * With Company ( 1 - 1 Relation )
     */

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
