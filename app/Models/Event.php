<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'organizer_id', 'name', 'location', 'description',
        'start_date', 'end_date', 'start_time', 'end_time', 'poster', 'status',
    ];

    public function organizer()
    {
        return $this->belongsTo(User::class, 'organizer_id');
    }

    public function applications()
    {
        return $this->hasMany(Application::class);
    }
}
