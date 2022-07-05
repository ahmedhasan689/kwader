<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeLanguage extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'language_id',
        'level',
    ];

    public $incrementing = false;

    /**
     * Relation
     * With Language ( One To Many )
     */

    // With Language
    public function language()
    {
        return $this->belongsTo(Language::class);
    }
}
