@extends('layouts.app')

@section('content')
<div class="w-1/5 bg-gray-100 p-6 rounded-l-lg">
@include('layouts.sidebar')

  <!-- Main Content -->
  <div class="flex-1 p-8">
    <div class="bg-blue-100 p-4 rounded-lg mb-8">
        <div class="flex justify-between items-center">
            <!-- Left Image -->
            <img alt="Illustration of people with question marks" class="w-1/3" src="{{ asset('img/H1.png') }}" />
            
            <!-- Text Content -->
            <div class="text-center mx-4">
                <h2 class="text-4xl font-bold">Help center</h2>
                <p class="text-gray-600">Let us know how we may help you?</p>
            </div>

            <!-- Right Image -->
            <img alt="Illustration of people with question marks" class="w-1/3" src="{{ asset('img/H2.png') }}" />
        </div>
    </div>

    <form class="space-y-4">
        <div>
            <label class="block text-gray-700">Reason for contacting <span class="text-red-500">*</span></label>
            <input class="w-full p-2 border border-gray-300 rounded-lg" type="text" />
        </div>
        <div>
            <label class="block text-gray-700">Description <span class="text-red-500">*</span></label>
            <input class="w-full p-2 border border-gray-300 rounded-lg" type="text" />
        </div>
        <div>
            <button class="w-full bg-blue-500 text-white p-2 rounded-lg" type="submit">Send</button>
        </div>
    </form>
</div>
</div>
@endsection
