<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeSkills extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'specialization_id',
        'skills',
        'description',
    ];

    protected $casts = [
        'skills' => 'json',
    ];

    /**
     * Relation
     * With Specialization [ One To Many ]
     */

    // With Specialization
    public function specialization()
    {
        return $this->belongsTo(Specialization::class);
    }
}
