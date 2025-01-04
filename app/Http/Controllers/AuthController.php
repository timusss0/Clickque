<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
     // Tampilkan halaman login
     public function loginView()
     {
         return view('auth.login');
     }


    // Proses login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
    
        if (Auth::attempt($credentials)) {
            $user = Auth::user(); // Mendapatkan pengguna yang sedang login
    
            // Periksa apakah mbti_type null atau kosong
            if (!empty($user->mbti_type)) {
                return redirect()->route('dashboard.index'); // Arahkan ke dashboard
            }
    
            return redirect()->route('mbti'); // Arahkan ke halaman MBTI
        }
    
        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ]);
    }
    

    // Tampilkan halaman sign-up
    public function signupView()
    {
        return view('auth.signup');
    }

    // Proses sign-up
    public function signup(Request $request)
{
    $validated = $request->validate([
        'username' => 'required|unique:users,username',
        'email' => 'required|email|unique:users,email',
        'phone_number' => 'nullable|numeric',
        'birth_date' => 'nullable|date',
        'password' => 'required|string|min:8',
    ]);

    // Proses penyimpanan data ke database
    User::create([
        'username' => $validated['username'],
        'email' => $validated['email'],
        'phone_number' => $validated['phone_number'],
        'birth_date' => $validated['birth_date'],
        'password' => bcrypt($validated['password']),
    ]);

    return redirect()->route('login')->with('success', 'Account created successfully');
}

    // Logout
        public function logoutView(){
            return view('auth.logout');
        }

        public function logout()
        {
            Auth::logout(); // Logout the user
            return redirect('/'); // Redirect to login page
        }
    
        
}
