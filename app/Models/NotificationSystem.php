<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotificationSystem extends Model
{
    use HasFactory;

    protected $fillable = [
        'notification_name',
        'user_type',
    ];

    public $incrementing = false;


    /**
     * Relation
     * TODO : With User - Many To Many ( M - M )
     */

    public function users()
    {
        return $this->belongsToMany(User::class, 'notification_user');
    }
}
