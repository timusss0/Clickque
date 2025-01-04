@extends('layouts.app')

@section('content')
<div class="w-1/6 bg-gray-100 p-6 rounded-l-lg">
@include('layouts.sidebar')
<!-- Main Content -->
   <div class="w-3/4 p-6">
      <div class="flex justify-center">
         <h2 class="text-2xl font-bold mb-6 text-center">
            Rarely interaction
         </h2>
     </div>
   
    <div class="space-y-4">
     <div class="flex items-center">
      <img alt="Profile picture of Lucinta Luna" class="w-10 h-10 rounded-full mr-4" height="40" src="https://storage.googleapis.com/a1aa/image/PLtJwTzZkGb8HB2pexcLo456LT2yIWXCIJ8hcyxC6zK0rWfTA.jpg" width="40"/>
      <div>
       <p class="font-semibold">
        Lucinta Luna
       </p>
       <p class="text-gray-500 text-sm">
        Battery about to die
       </p>
      </div>
     </div>
     <div class="flex items-center">
      <img alt="Profile picture of Bayu Smash" class="w-10 h-10 rounded-full mr-4" height="40" src="https://storage.googleapis.com/a1aa/image/ghn3Flu8S4qiDV3ZlSWozefgmzEGXn9YjfZtmfti9mGkeq1fE.jpg" width="40"/>
      <div>
       <p class="font-semibold">
        Bayu Smash
       </p>
       <p class="text-gray-500 text-sm">
        At the gym
       </p>
      </div>
     </div>
    </div>
   </div>
  </div>
  @endsection