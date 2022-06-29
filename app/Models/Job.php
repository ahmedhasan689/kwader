<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'job_title',
        'description',
        'years_of_experience',
        'job_system',
        'specialization',
        'languages',
        'skills',
        'salary',
        'status',
        'employee_applicants',
        'employer_id',
        'country_id',
        'field_id',
    ];

    // Insert These Columns As Array Into DB
    protected $casts = [
        'specialization' => 'json',
        'languages' => 'json',
        'employee_applicants' => 'json',
        'skills' => 'json',
    ];

    /**
     * Relations
     * With Employer - One To Many ( One Employer Has Many Jobs )
     * With Country - One To Many ( One Country Has Many Jobs )
     * With Field - One To Many ( One Field Has Many Jobs )
     */

    // With Employer
    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    // With Country
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    // With Field
    public function field()
    {
        return $this->belongsTo(Field::class);
    }
}
