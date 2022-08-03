<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Existing extends Model
{
    use HasFactory;

    protected $fillable = [
        'existing_name',
        'type',
        'employer_id',
        'employee_id',
    ];
}
