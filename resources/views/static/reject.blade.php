@extends('layouts.app')

@section('content')
<div class="w-1/5 bg-gray-100 p-6 rounded-l-lg">
@include('layouts.sidebar')
<!-- Main Content -->
<div class="flex-1 p-10">
    <div class="flex justify-center">
        <h2 class="text-2xl font-bold mb-6 text-center">
            Reject friendship
        </h2>
    </div>
    
    <div class="flex items-center">
     <img alt="Profile picture of Vadel Jaidi" class="w-12 h-12 rounded-full" height="50" src="https://storage.googleapis.com/a1aa/image/MP44rGLSSw4lOZA1a7v7I6soA3eIKjWmtDiuQyr5vIi9tWfTA.jpg" width="50"/>
     <div class="ml-4">
      <p class="font-semibold">
       Vadel Jaidi
      </p>
      <p class="text-gray-500">
       Can't talk
      </p>
     </div>
    </div>
   </div>
  </div>
@endsection
