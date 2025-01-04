<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'mbti',
        'message',
        'user_id', // Changed from 'user' to 'user_id' for relationship consistency
    ];

    // Relationship: A message belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
