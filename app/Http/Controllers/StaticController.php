<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticController extends Controller
{
    public function static()
    {
        // Data jam per hari (contoh data untuk setiap hari)
        $dailyHours = [
          
            'Friday' => [6],
            'Saturday' => [7],
            'Sunday' => [8],
            'Monday' => [6],
            'Tuesday' => [7],
            'Wednesday' => [12],
            'Thursday' => [12],
        ];
    
        // Tentukan hari sekarang berdasarkan format hari (e.g., "Thursday")
        $currentDay = date('l'); // Mendapatkan nama hari saat ini
        $dailyHoursWithNow = [];
    
        // Tambahkan "Now" sebagai label untuk hari ini
        foreach ($dailyHours as $day => $hours) {
            $label = ($day === $currentDay) ? 'Now' : $day; // Ubah label jika sesuai hari
            $dailyHoursWithNow[$label] = $hours;
        }
    
        // Kirim data ke view
        return view('static.static', compact('dailyHoursWithNow'));
    }

    public function interaction(){
        return view('static.interaction');
    }
    
    public function rarely_interaction(){
        return view('static.rarely_interaction');
    }

    public function reject(){
        return view('static.reject');
    }
    

}
