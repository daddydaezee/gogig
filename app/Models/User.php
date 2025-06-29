<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'username', 'email', 'password', 'role', 'email_verified_at'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // RELATIONSHIPS

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function media()
    {
        return $this->hasMany(Media::class);
    }

    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function reviewsGiven()
    {
        return $this->hasMany(\App\Models\Review::class, 'reviewer_id');
    }

    public function receivedReviews() {
        return $this->hasMany(\App\Models\Review::class, 'reviewed_user_id');
    }
}
