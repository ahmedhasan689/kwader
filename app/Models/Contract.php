<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;

    protected $fillable = [
        'contract_number',
        'status',
        'company_id',
        'total',
        'type',
        'duration',
        'employer_id',
        'employee_id',
    ];

    /**
     * Relation
     * With Company ( One To Many )
     * With Employer ( One To Many )
     * With Employee ( One To Many )
     */

    // With Company
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    // With Employer
    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    // With Employee
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }


}
