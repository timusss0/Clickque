@extends('layouts.app')

@section('content')
<div class="w-1/5 bg-gray-100 p-6 rounded-l-lg">
@include('layouts.sidebar')
   <!-- Main Content -->
   <div class="flex-1 p-10 flex justify-center items-center">
    <div class="bg-white p-10 rounded-lg shadow-lg text-center">
     <img alt="Illustration of a person holding a box with a cross mark" class="mx-auto mb-6" height="100" src="https://storage.googleapis.com/a1aa/image/4tkgbx6UYe0OcCBDQFPSjJaKCGvvdwAFW2fMQLPtnHPw9mfnA.jpg" width="100"/>
     <h2 class="text-xl font-bold mb-4">
      Are you sure you want to say goodbye?
     </h2>
     <p class="mb-2">
      We're sad to see you go!
     </p>
     <p class="mb-4">
      If you delete your account, all your data will be wiped. Are you absolutely sure you want to proceed?
     </p>
     <div class="flex justify-center space-x-4">
      <!-- Button to stay -->
      <button onclick="window.history.back();" class="bg-blue-500 text-white px-6 py-2 rounded-lg shadow">
       I'll stay!
      </button>
      
      <form action="{{ route('user.delete', auth()->user()->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <label for="password">Masukkan Kata Sandi:</label>
        <input type="password" name="password" id="password" required>
        <button type="submit">Hapus Akun</button>
    </form>
    
     </div>
    </div>
   </div>
@endsection
