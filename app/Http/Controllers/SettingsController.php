<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class SettingsController extends Controller
{
    public function settings()
    {
        return view('settings.settings');
    }

    public function account()
    {
        $user = Auth::user(); 
        return view('settings.account',compact('user'));
    }

      // Proses pembaruan data pengguna
    // Metode untuk menangani update data account
    public function updateAccount(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email,' . auth()->id(),
            'username' => 'required|string|max:255',
            'mbti_type' => 'required|string|max:4',
            'phone_number' => 'nullable|string|max:15',
            'birth_date' => 'nullable|date',
        ]);
    
        $user = auth()->user();  // Mengambil user yang sedang login
        $user->update([
            'email' => $request->email,
            'username' => $request->username,
            'mbti_type' => $request->mbti_type,
            'phone_number' => $request->phone_number,
            'birth_date' => $request->birth_date,
        ]);
    
        return redirect()->route('settings.account')->with('success', 'Account updated successfully!');
    }

    public function change_eml()
    {
        $user = Auth::user(); 
        return view('settings.change_eml',compact('user'));
    }

    public function updateEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email,' . auth()->id(),
        ]);
    
        $user = auth()->user();
        $user->email = $request->email;
        $user->save();
    
    
        return redirect()->route('settings.change_eml')->with('success', 'Account updated successfully!');
    }

    public function change_psswrd()
    {
        $user = Auth::user(); 
        return view('settings.change_passwrd',compact('user'));
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'password' => 'nullable|string|min:8|confirmed',
        ]);
    
        $user = auth()->user();
    
        if ($request->password) {
            // Hanya hash password jika input tidak kosong
            $user->password = Hash::make($request->password);
            $user->save();
    
            return redirect()->route('settings.changePassword')->with('success', 'Password updated successfully!');
        }
    
        return redirect()->route('settings.changePassword')->with('info', 'No changes were made.');
    }

    public function languange()
    {
        return view('settings.languange');
    }

    public function changeLanguage(Request $request)
    {
        $request->validate([
            'language' => 'required|in:en,id,de,fr,es', // Daftar kode bahasa yang valid
        ]);

        session(['language' => $request->language]); // Simpan ke session

        return redirect()->back(); // Kembali ke halaman sebelumnya
    }

    public function delete()
    {
        return view('settings.delete');
    }

    public function deleteUser(Request $request, $id)
    {
        // Validasi kata sandi
        $request->validate([
            'password' => 'required',
        ]);
    
        if (!Hash::check($request->password, auth()->user()->password)) {
            return back()->withErrors(['password' => 'Kata sandi tidak cocok.']);
        }
    
        $user = User::find($id);
    
        if ($user) {
            // Hapus file avatar
            if ($user->avatar_path) {
                Storage::delete($user->avatar_path);
            }
    
            // Hapus data terkait
            $user->posts()->delete();
            $user->comments()->delete();
    
            // Hapus akun
            $user->delete();
            dd($request->all(), $id);

    
            auth()->logout();
            return redirect('/')->with('status', 'Akun Anda berhasil dihapus.');
            
    }
    
    }
}
