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

      <!-- Success Alert -->
      @if (session('success'))
      <div class="bg-green-100 border border-green-400 text-green-700 p-4 rounded-lg mb-4">
          <p>{{ session('success') }}</p>
      </div>
  @endif
    <form class="space-y-4" method="POST" action="{{ route('help.submit') }}">
        @csrf
        <div>
            <label class="block text-gray-700">Reason for contacting <span class="text-red-500">*</span></label>
            <input name="reason" class="w-full p-2 border border-gray-300 rounded-lg" type="text" required />
        </div>
        <div>
            <label class="block text-gray-700">Description <span class="text-red-500">*</span></label>
            <textarea name="description" class="w-full p-2 border border-gray-300 rounded-lg" rows="4" required></textarea>
        </div>
        <div>
            <button class="w-full bg-blue-500 text-white p-2 rounded-lg" type="submit">Send</button>
        </div>
    </form>
    
</div>
</div>
@endsection
