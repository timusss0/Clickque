<?php

namespace App\Http\Controllers;
use App\Models\Chat;
use App\Models\MBTILog;
use App\Models\Message;
use App\Events\MessageSent;
use App\Events\PartnerFound;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class MBTICOntroller extends Controller
{

    // Array untuk deskripsi kepanjangan MBTI
    private $mbtiDescriptions = [
        'ISTJ' => 'Introvert, Sensing, Thinking, Judging',
        'ISFJ' => 'Introvert, Sensing, Feeling, Judging',
        'INFJ' => 'Introvert, Intuition, Feeling, Judging',
        'INTJ' => 'Introvert, Intuition, Thinking, Judging',
        'ISTP' => 'Introvert, Sensing, Thinking, Perceiving',
        'ISFP' => 'Introvert, Sensing, Feeling, Perceiving',
        'INFP' => 'Introvert, Intuition, Feeling, Perceiving',
        'INTP' => 'Introvert, Intuition, Thinking, Perceiving',
        'ESTP' => 'Extrovert, Sensing, Thinking, Perceiving',
        'ESFP' => 'Extrovert, Sensing, Feeling, Perceiving',
        'ENFP' => 'Extrovert, Intuition, Feeling, Perceiving',
        'ENTP' => 'Extrovert, Intuition, Thinking, Perceiving',
        'ESTJ' => 'Extrovert, Sensing, Thinking, Judging',
        'ESFJ' => 'Extrovert, Sensing, Feeling, Judging',
        'ENFJ' => 'Extrovert, Intuition, Feeling, Judging',
        'ENTJ' => 'Extrovert, Intuition, Thinking, Judging',
    ];

    public function showInputForm()
    {
        return view('mbti.input');
    }

    public function saveMBTI(Request $request)
    {
        // Validasi input
        $request->validate([
            'mbti_type' => 'required|in:ISTJ,ISFJ,INFJ,INTJ,ISTP,ISFP,INFP,INTP,ESTP,ESFP,ENFP,ENTP,ESTJ,ESFJ,ENFJ,ENTJ',
        ]);
        
        // Mendapatkan tipe MBTI dari input dan mengubahnya menjadi uppercase
        $mbtiResult = strtoupper($request->input('mbti_type'));
    
        // Simpan tipe MBTI ke tabel mbti_logs
        $userId = auth()->id(); // Pastikan user login, atau sesuaikan dengan session ID jika anonim
        MBTILog::create([
            'user_id' => $userId,
            'mbti' => $mbtiResult,
            'description' => $request->input('description', null), // Deskripsi opsional
        ]);
    
        // Mapping MBTI ke pasangan yang cocok
        $compatibilityMap = [
            'ISTJ' => ['ISFJ', 'ENTJ'],
            'ISFJ' => ['ISTJ', 'ENFJ'],
            'INFJ' => ['ENTP', 'INTP'],
            'INTJ' => ['ENTP', 'ENFP'],
            'ISTP' => ['ESTP', 'ENTP'],
            'ISFP' => ['ISTP', 'ESFJ'],
            'INFP' => ['ENFP', 'INFJ'],
            'INTP' => ['ENTP', 'INFP'],
            'ESTP' => ['ISTP', 'ENFP'],
            'ESFP' => ['ESTP', 'ENTP'],
            'ENFP' => ['INFP', 'ENTJ'],
            'ENTP' => ['INTJ', 'ENTP'],
            'ESTJ' => ['ESFJ', 'ENTJ'],
            'ESFJ' => ['ESTJ', 'ENFJ'],
            'ENFJ' => ['INFJ', 'ENFP'],
            'ENTJ' => ['ENFP', 'ESTJ'],
        ];
        $compatibles = $compatibilityMap[$mbtiResult] ?? [];
    
        // Menambahkan deskripsi kompatibilitas
        $mbtiDescriptions = [
            'ISTJ' => 'Introverted, Sensing, Thinking, Judging',
            'ISFJ' => 'Introverted, Sensing, Feeling, Judging',
            'INFJ' => 'Introverted, Intuition, Feeling, Judging',
            'INTJ' => 'Introverted, Intuition, Thinking, Judging',
            'ISTP' => 'Introverted, Sensing, Thinking, Perceiving',
            'ISFP' => 'Introverted, Sensing, Feeling, Perceiving',
            'INFP' => 'Introverted, Intuition, Feeling, Perceiving',
            'INTP' => 'Introverted, Intuition, Thinking, Perceiving',
            'ESTP' => 'Extroverted, Sensing, Thinking, Perceiving',
            'ESFP' => 'Extroverted, Sensing, Feeling, Perceiving',
            'ENFP' => 'Extroverted, Intuition, Feeling, Perceiving',
            'ENTP' => 'Extroverted, Intuition, Thinking, Perceiving',
            'ESTJ' => 'Extroverted, Sensing, Thinking, Judging',
            'ESFJ' => 'Extroverted, Sensing, Feeling, Judging',
            'ENFJ' => 'Extroverted, Intuition, Feeling, Judging',
            'ENTJ' => 'Extroverted, Intuition, Thinking, Judging',
        ];
        $compatiblesWithDescriptions = [];
        foreach ($compatibles as $compatible) {
            $compatiblesWithDescriptions[$compatible] = $mbtiDescriptions[$compatible] ?? 'Description not available.';
        }
    
        // Kirim data ke view untuk menampilkan hasil
        return view('mbti.result-form', [
            'mbtiResult' => $mbtiResult,
            'compatibles' => $compatibles,
            'compatiblesWithDescriptions' => $compatiblesWithDescriptions,
        ]);
    }
    
public function anonymousChat($mbti)
{
    $mbtiDescriptions = [
        'ISTJ' => 'Introverted, Sensing, Thinking, Judging',
        'ISFJ' => 'Introverted, Sensing, Feeling, Judging',
        'INFJ' => 'Introverted, Intuition, Feeling, Judging',
        'INTJ' => 'Introverted, Intuition, Thinking, Judging',
        'ISTP' => 'Introverted, Sensing, Thinking, Perceiving',
        'ISFP' => 'Introverted, Sensing, Feeling, Perceiving',
        'INFP' => 'Introverted, Intuition, Feeling, Perceiving',
        'INTP' => 'Introverted, Intuition, Thinking, Perceiving',
        'ESTP' => 'Extroverted, Sensing, Thinking, Perceiving',
        'ESFP' => 'Extroverted, Sensing, Feeling, Perceiving',
        'ENFP' => 'Extroverted, Intuition, Feeling, Perceiving',
        'ENTP' => 'Extroverted, Intuition, Thinking, Perceiving',
        'ESTJ' => 'Extroverted, Sensing, Thinking, Judging',
        'ESFJ' => 'Extroverted, Sensing, Feeling, Judging',
        'ENFJ' => 'Extroverted, Intuition, Feeling, Judging',
        'ENTJ' => 'Extroverted, Intuition, Thinking, Judging',
    ];
    
    // Get the description for the given MBTI type
    $description = $mbtiDescriptions[$mbti] ?? 'Description not available';

    // Pass both the MBTI type and description to the view
    return view('anonymous-chat', compact('mbti', 'description'));
}

public function findPartner($mbti)
{
    $mbtiDescriptions = [
        'ISTJ' => 'Introverted, Sensing, Thinking, Judging',
        'ISFJ' => 'Introverted, Sensing, Feeling, Judging',
        'INFJ' => 'Introverted, Intuition, Feeling, Judging',
        'INTJ' => 'Introverted, Intuition, Thinking, Judging',
        'ISTP' => 'Introverted, Sensing, Thinking, Perceiving',
        'ISFP' => 'Introverted, Sensing, Feeling, Perceiving',
        'INFP' => 'Introverted, Intuition, Feeling, Perceiving',
        'INTP' => 'Introverted, Intuition, Thinking, Perceiving',
        'ESTP' => 'Extroverted, Sensing, Thinking, Perceiving',
        'ESFP' => 'Extroverted, Sensing, Feeling, Perceiving',
        'ENFP' => 'Extroverted, Intuition, Feeling, Perceiving',
        'ENTP' => 'Extroverted, Intuition, Thinking, Perceiving',
        'ESTJ' => 'Extroverted, Sensing, Thinking, Judging',
        'ESFJ' => 'Extroverted, Sensing, Feeling, Judging',
        'ENFJ' => 'Extroverted, Intuition, Feeling, Judging',
        'ENTJ' => 'Extroverted, Intuition, Thinking, Judging',
    ];

    $description = $mbtiDescriptions[$mbti] ?? 'Description not available';

    return view('partner.find-a-partner', compact('mbti', 'description'));
}

// public function startChat(Request $request)
// {
//     // Validasi input
//     $validatedData = $request->validate([
//         'selected_mbti' => 'required|string',
//         'partner_id' => 'required|integer|exists:users,id',
//     ]);

//     // Simpan data ke tabel chats
//     $chat = Chat::create([
//         'user_id' => auth()->id(), // ID pengguna yang memulai chat
//         'selected_mbti' => $validatedData['selected_mbti'],
//         'partner_id' => $validatedData['partner_id'],
//     ]);

//     // Redirect ke halaman sukses atau dashboard
//     return redirect()->route('dashboard')->with('success', 'Chat started successfully!');
// }


// public function sendMessage(Request $request)
// {
//     $message = $request->input('message');

//     // Simpan pesan ke database (opsional)
//     $user = auth()->user();
//     Message::create([
//         'user_id' => $user->id,
//         'message' => $message,
//     ]);

    
//     // Broadcast event
//     broadcast(new MessageSent($user, $message))->toOthers();

//     return response()->json(['success' => true]);
// }

}
        // // Kirim pesan menggunakan event Pusher (broadcast)
        // $message = "Partner Found!";
        // foreach ($compatibles as $compatible) {
        //     // Broadcast pesan ke teman yang cocok
        //     broadcast(new PartnerFound(auth()->user(), $message, $compatible)); // Pastikan event ini sudah dibuat
        // }

        // Mengirim respons JSON
        // return response()->json(['success' => true]);

    // public function showChat($mbti)
    // {
    //     $mbti = strtoupper($mbti);
    //     $mbtiDescription = $this->mbtiDescriptions[$mbti] ?? 'Description not available.';
    //     return view('mbti.chat', compact('mbti','mbtiDescription'));
    // }

    
