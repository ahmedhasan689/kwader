<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeletionReasons extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'reasons',
        'explain',
        'contact',
    ];

    protected $casts = [
        'reasons' => 'json',
    ];

    /**
     * Relation
     * With User ( One TO Many )
     */

    // With User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
