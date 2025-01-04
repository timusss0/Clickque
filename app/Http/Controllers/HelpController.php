<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelpController extends Controller
{
    public function help(){
        return view('help.help');
    }

    public function storeFeedback(Request $request)
    {
        // Validasi input (opsional)
        $request->validate([
            'feedback' => 'required|string|max:255',
        ]);

        // Ambil data feedback
        $feedback = $request->input('feedback');

        // Simpan ke database (contoh)
        // \App\Models\Feedback::create(['feedback' => $feedback]);

        // Kirim respons JSON
        return response()->json([
            'message' => 'Feedback received',
            'feedback' => $feedback,
        ]);
    }
}
