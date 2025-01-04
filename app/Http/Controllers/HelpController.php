<?php

namespace App\Http\Controllers;

use App\Models\HelpRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function submit(Request $request)
    {
        // Validasi data input
        $validatedData = $request->validate([
            'reason' => 'required|string|max:255',
            'description' => 'required|string',
        ]);
    
        // Simpan data ke database
        DB::table('help_requests')->insert([
            'reason' => $validatedData['reason'],
            'description' => $validatedData['description'],
            'created_at' => now(),
        ]);
    
        // Set flash message
        return redirect()->back()->with('success', 'Thank you! Your request has been submitted.');
    }
    
}
