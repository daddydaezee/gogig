<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Media extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'file_path', 'type', 'caption',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
