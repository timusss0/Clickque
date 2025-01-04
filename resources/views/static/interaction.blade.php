@extends('layouts.app')

@section('content')
<div class="w-1/6 bg-gray-100 p-6 rounded-l-lg">
@include('layouts.sidebar')
 <!-- Main Content -->
 <div class="w-3/4 p-6">
  <div class="flex justify-center">
    <h2 class="text-2xl font-bold mb-6 text-center">
      Frequent interaction
    </h2>
</div>
    <div class="flex items-center mb-4">
     <img alt="Profile picture of Loli Twice" class="w-10 h-10 rounded-full mr-4" height="40" src="https://storage.googleapis.com/a1aa/image/DZA8ZpHGSCb1EVJiZWxlyfyG6UHveLIJtlUsUEzSMgp9zrenA.jpg" width="40"/>
     <div>
      <p class="font-bold">
       Loli Twice
      </p>
      <p class="text-gray-500">
       In a meeting
      </p>
     </div>
    </div>
    <div class="flex items-center">
     <img alt="Profile picture of Marfuah Jeans" class="w-10 h-10 rounded-full mr-4" height="40" src="https://storage.googleapis.com/a1aa/image/x3l06sR3drpcGFmQEMh0b3ZTQe5gW6yEwX3ZIveCZNH7zrenA.jpg" width="40"/>
     <div>
      <p class="font-bold">
       Marfuah Jeans
      </p>
      <p class="text-gray-500">
       Urgent calls only
      </p>
     </div>
    </div>
   </div>
  </div>
@endsection