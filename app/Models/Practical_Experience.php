<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Practical_Experience extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'job_title',
        'company_name',
        'specializations',
        'start_date',
        'end_date',
        'description',
        'country_id',
    ];

    protected $casts = [
        'specializations' => 'json',
    ];

    /**
     * Relations
     * With Employee ( One To Many 1-m )
     * With Country ( One To Many 1-m )
     */

    // With Employee
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    // With Country
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
