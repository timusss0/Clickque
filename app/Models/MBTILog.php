<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MBTILog extends Model
{
  
    // Nama tabel yang digunakan (jika berbeda dari default Laravel)
    protected $table = 'mbti_logs';

    // Kolom yang dapat diisi (mass assignable)
    protected $fillable = ['user_id', 'chat_id', 'mbti', 'description'];
}
