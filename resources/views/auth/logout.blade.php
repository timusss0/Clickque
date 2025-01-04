@extends('layouts.app')

@section('content')
<div class="w-1/5 bg-gray-100 p-6 rounded-l-lg">
    @include('layouts.sidebar')

    <!-- Main Content -->
    <div class="flex-1 flex items-center justify-center p-6">
        <div class="bg-white p-10 rounded-3xl shadow-lg w-full max-w-4xl">
            <h2 class="text-3xl font-bold mb-4 text-center">
                Are you sure you want to say log out?
            </h2>
            <p class="text-center mb-6">
                You can re-join whenever you want. Please feel free to come back again.
            </p>
            <div class="flex justify-center mb-6">
                <img alt="Illustration of a person standing next to a large question mark" height="200" 
                     src="https://storage.googleapis.com/a1aa/image/wSnVl2wlRcYyCZIe4wRmO1EG4PNPGStDwGdLpRHhLE3ah5fTA.jpg" 
                     width="100"/>
            </div>
            <div class="flex justify-between">
                <!-- Button to cancel logout -->
                <button class="bg-blue-100 text-blue-500 py-2 px-4 rounded-lg shadow" onclick="window.history.back()">
                    No, not yet
                </button>

                <!-- Form to log out -->
                <form action="{{ route('logout') }}" method="GET">
                    @csrf
                    <button type="submit" class="bg-blue-100 text-blue-500 py-2 px-4 rounded-lg shadow">
                        Yes, I'm sure
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
