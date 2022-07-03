<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'name',
        'center_name',
        'specializations',
        'start_date',
        'end_date',
        'certification_url',
        'certification_file',
    ];

    protected $casts = [
        'specializations' => 'json',
    ];

    /**
     * Relations
     * With Employee ( one To Many )
     */

    // With Employee
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
