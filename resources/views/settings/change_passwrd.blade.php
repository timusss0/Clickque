@extends('layouts.app')

@section('content')
<div class="w-1/5 bg-gray-100 p-6 rounded-l-lg">
@include('layouts.sidebar')



 <!-- Main Content -->
 <div class="flex-1 p-10 bg-gray-100">
            @if (session('success'))
        <div class="bg-green-500 text-white p-2 rounded-lg mb-4">
            {{ session('success') }}
        </div>
        @endif  
    <h2 class="text-2xl font-semibold text-gray-800 mb-6 text-center">Change Password</h2>
    <form action="{{ route('settings.changePassword') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md ">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700">New Password</label>
            <input 
                type="password" 
                name="password" 
                class="w-full mt-2 p-2 border border-gray-300 rounded-lg bg-gray-100" 
                required>
            @error('password')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="mb-4">
            <label class="block text-gray-700">Confirm New Password</label>
            <input 
                type="password" 
                name="password_confirmation" 
                class="w-full mt-2 p-2 border border-gray-300 rounded-lg bg-gray-100" 
                required>
            @error('password_confirmation')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        
        <button 
            type="submit" 
            class="w-full bg-blue-200 text-blue-800 py-2 rounded-lg font-semibold hover:bg-blue-300">
            Save
        </button>
    </form>
    
</div>
</div>

@endsection