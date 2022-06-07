<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'email_verified_at',
        'phone_number',
        'phone_verified_at',
        'password',
        'user_type',
        'oauth_id',
        'oauth_type',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Relations
     * With Country ( One To Many 1-m )
     * With Language ( One To Many 1-m )
     */

    // With Country
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    // With Language
    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    // With User
    public function employee()
    {
        return $this->hasOne(Employee::class);
    }
}
