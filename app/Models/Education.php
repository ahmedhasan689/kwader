<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'enterprise_name',
        'diploma_name',
        'start_date',
        'end_date',
        'specializations',
        'description',
        'certification_url',
        'certification_file',
    ];

    protected $casts = [
        'specializations' => 'json',
    ];

    /**
     * Relation
     * With Employee ( One To Many )
     */

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

}
