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
    <h2 class="text-2xl font-semibold text-gray-800 mb-6 text-center">Account information</h2>
    <form action="{{ route('account.update') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md ">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700">Email</label>
            <input 
                type="email" 
                name="email" 
                value="{{ old('email', $user->email) }}" 
                class="w-full mt-2 p-2 border border-gray-200 rounded-lg bg-gray-200 text-gray-500" 
                readonly>
        </div>        
        <div class="mb-4">
            <label class="block text-gray-700">Phone number</label>
            <input 
            type="number" 
            name="phone_number" 
            value="{{ old('phone_number', $user->phone_number) }}" 
            class="w-full mt-2 p-2 border border-gray-300 rounded-lg bg-gray-100" 
            required>
        @error('username')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Username</label>
            <input 
                type="text" 
                name="username" 
                value="{{ old('username', $user->username) }}" 
                class="w-full mt-2 p-2 border border-gray-300 rounded-lg bg-gray-100" 
                placeholder="timus" required>
            @error('username')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Date of birth</label>
            <div class="relative">
                <input 
                type="date" 
                name="birth_date" 
                value="{{ old('username', $user->birth_date) }}" 
                class="w-full mt-2 p-2 border border-gray-300 rounded-lg bg-gray-100" 
                 required>
            @error('username')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
            </div>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">MBTI</label>
            <select 
                id="mbti_type" 
                name="mbti_type" 
                class="w-full mt-2 p-2 border border-gray-300 rounded-lg bg-gray-100">
                <option value="ISTJ" {{ old('mbti_type', $user->mbti_type) == 'ISTJ' ? 'selected' : '' }}>ISTJ</option>
                <option value="ISFJ" {{ old('mbti_type', $user->mbti_type) == 'ISFJ' ? 'selected' : '' }}>ISFJ</option>
                <option value="INFJ" {{ old('mbti_type', $user->mbti_type) == 'INFJ' ? 'selected' : '' }}>INFJ</option>
                <option value="INTJ" {{ old('mbti_type', $user->mbti_type) == 'INTJ' ? 'selected' : '' }}>INTJ</option>
                <option value="ISTP" {{ old('mbti_type', $user->mbti_type) == 'ISTP' ? 'selected' : '' }}>ISTP</option>
                <option value="ISFP" {{ old('mbti_type', $user->mbti_type) == 'ISFP' ? 'selected' : '' }}>ISFP</option>
                <option value="INFP" {{ old('mbti_type', $user->mbti_type) == 'INFP' ? 'selected' : '' }}>INFP</option>
                <option value="INTP" {{ old('mbti_type', $user->mbti_type) == 'INTP' ? 'selected' : '' }}>INTP</option>
                <option value="ESTP" {{ old('mbti_type', $user->mbti_type) == 'ESTP' ? 'selected' : '' }}>ESTP</option>
                <option value="ESFP" {{ old('mbti_type', $user->mbti_type) == 'ESFP' ? 'selected' : '' }}>ESFP</option>
                <option value="ENFP" {{ old('mbti_type', $user->mbti_type) == 'ENFP' ? 'selected' : '' }}>ENFP</option>
                <option value="ENTP" {{ old('mbti_type', $user->mbti_type) == 'ENTP' ? 'selected' : '' }}>ENTP</option>
                <option value="ESTJ" {{ old('mbti_type', $user->mbti_type) == 'ESTJ' ? 'selected' : '' }}>ESTJ</option>
                <option value="ESFJ" {{ old('mbti_type', $user->mbti_type) == 'ESFJ' ? 'selected' : '' }}>ESFJ</option>
                <option value="ENFJ" {{ old('mbti_type', $user->mbti_type) == 'ENFJ' ? 'selected' : '' }}>ENFJ</option>
                <option value="ENTJ" {{ old('mbti_type', $user->mbti_type) == 'ENTJ' ? 'selected' : '' }}>ENTJ</option>
            </select>
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