<?php

// app/Models/Review.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'user_id', 'reviewer_id', 'rating', 'comment'
    ];

    public function user() // the reviewed user
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function reviewer() // the reviewer
    {
        return $this->belongsTo(User::class, 'reviewer_id');
    }
}

