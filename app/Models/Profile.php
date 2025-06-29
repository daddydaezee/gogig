<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'photo', 'phone', 'address', 'bio',
        'social_ig', 'social_fb', 'social_x', 'social_email', 'social_phone',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
