<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancialTransactions extends Model
{
    use HasFactory;

    protected $fillable = [
        'employer_id',
        'employee_id',
        'amount',
        'transaction_number',
    ];

    /**
     * Relation
     * With Employer ( One To Many )
     * With Employee ( One To Many )
     */

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
