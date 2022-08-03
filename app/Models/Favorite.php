<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;

    protected $fillable = [
        'existing_id',
        'favoriteable_id',
        'favoriteable_type',
    ];

    protected $table = 'favorites';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function employees()
    {
        return $this->morphedByMany(Employee::class, 'favorites');
    }

    public function jobs()
    {
        return $this->morphedByMany(Job::class, 'favorites');
    }
}
