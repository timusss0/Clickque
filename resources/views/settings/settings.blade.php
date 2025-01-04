@extends('layouts.app')

@section('content')
<div class="w-1/5 bg-gray-100 p-6 rounded-l-lg">
@include('layouts.sidebar')
<!-- Main Content -->
   <!-- Main Content -->
   <div class="w-3/4 p-10">
    <div class="flex justify-center">
        <h2 class="text-2xl font-bold mb-6 text-center">
            Setting
        </h2>
    </div>
   
    <ul>
        <li class="flex justify-between items-center mb-6">
            <div>
                <a href="{{ route('settings.account') }}" class="hover:text-purple-500">
                <h3 class="text-lg font-semibold">Account information</h3>
                <p class="text-gray-600">View account information such as your phone number and MBTI</p>
                </a>
            </div>
            <i class="fas fa-chevron-right text-gray-400"></i>
        </li>
        <li class="flex justify-between items-center mb-6" >
                <a href="{{ route('settings.change_eml') }}" class="hover:text-blue-500">
            <div>
                <h3 class="text-lg font-semibold">Change email</h3>
                <p class="text-gray-600">Change your email anytime</p>
            </div>
        </a>
            <i class="fas fa-chevron-right text-gray-400"></i>
        </li>
        <li class="flex justify-between items-center mb-6" >
            <a href="{{ route('settings.changePassword') }}" class="hover:text-purple-500">
            <div>
                <h3 class="text-lg font-semibold">Change password</h3>
                <p class="text-gray-600">You can change your password once every 6 months</p>
            </div>
        </a>
            <i class="fas fa-chevron-right text-gray-400"></i>
        </li>
     
        <li class="flex justify-between items-center mb-6">
            <a href="{{ route('deleteAccount') }}" class="hover:text-purple-500">
            <div>
                <h3 class="text-lg font-semibold">Delete account</h3>
                <p class="text-gray-600">You can delete your account</p>
            </div>
        </a>
            <i class="fas fa-chevron-right text-gray-400"></i>
        </li>
    </ul>
</div>
</div>
@endsection