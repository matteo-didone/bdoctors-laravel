<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Carbon\Carbon;
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
        'name',
        'email',
        'password',
        'slug',
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
        'password' => 'hashed',
    ];


    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function userDetail()
    {
        return $this->hasOne(UserDetail::class);
    }

    public function specialties()
    {
        return $this->belongsToMany(Specialty::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function sponsorships()
    {
        return $this->belongsToMany(Sponsorship::class)
            ->withPivot('sponsorship_start_date', 'sponsorship_end_date');
    }

    public function activeSponsorships()
    {
        $now = Carbon::now();

        return $this->belongsToMany(Sponsorship::class)
            ->withPivot('sponsorship_start_date', 'sponsorship_end_date')
            ->wherePivot('sponsorship_start_date', '<=', $now)
            ->wherePivot('sponsorship_end_date', '>=', $now);
    }
}
