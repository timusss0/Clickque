<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    protected $table = 'chats';

    /**
     * Kolom-kolom yang dapat diisi melalui mass assignment.
     */
    protected $fillable = [
        'user_id',
        'selected_mbti',
        'partner_id',
    ];

       /**
     * Relasi ke model User untuk user yang memulai chat.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Relasi ke model User untuk partner dalam chat.
     */
    public function partner()
    {
        return $this->belongsTo(User::class, 'partner_id');
    }
}
