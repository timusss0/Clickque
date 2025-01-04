<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\MBTILog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    public function getChatMBTI($chatId)
    {
        // Validasi input (contoh validasi: chatId harus berupa angka)
        if (!is_numeric($chatId)) {
            return response()->json(['message' => 'Invalid chat ID'], 400);
        }
    
        // Ambil data MBTI terakhir berdasarkan chatId
        $mbtiLog = MBTILog::where('chat_id', $chatId)->latest()->first();
    
        if ($mbtiLog) {
            return response()->json([
                'mbti' => $mbtiLog->mbti,
                'description' => $mbtiLog->description,
            ]);
        }
    
        return response()->json(['message' => 'No MBTI data found'], 404);
    }
    public function index()
    {
        $userId = Auth::id();
    
        $mbtiLog = MBTILog::where('user_id', $userId)->latest()->first();
    
        $mbti = $mbtiLog->mbti ?? 'Unknown';
        $description = $mbtiLog->description ?? 'No description available';
    
        return view('dashboard.index', compact('mbti', 'description'));
    }

}
