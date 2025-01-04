@extends('layouts.app')

@section('content')
<div class="w-1/6 bg-gray-100 p-6 rounded-l-lg">
@include('layouts.sidebar')


        <!-- Main Content -->
        <div class="flex-1 p-8 mt-5">
          
        <!-- Tampilkan daftar jam per hari -->
        @if (isset($dailyHoursWithNow['Now']))
        <p>Now : {{ implode(', ', $dailyHoursWithNow['Now']) }} hours</p>
    @endif
    
        
            <div style="width: 80%; margin: auto;">
                <canvas id="dailyChart"></canvas>
            </div>
            <div class="ml-36 mt-5">
                <ul>
                    <li class="flex items-center justify-between mb-4 mr-36">
                        <a href="{{ route('interaction') }}" >
                        <span>Frequent interaction</span>
                        </a>
                        <i class="fas fa-chevron-right text-gray-400 mr-36"></i>
                    </li>
                    <li class="flex items-center justify-between mb-4 mr-36">
                        <a href="{{ route('rarely_interaction') }}">
                        <span>Rarely interaction</span>
                        </a>
                        <i class="fas fa-chevron-right text-gray-400 mr-36"></i>
                    </li>
                    <li class="flex items-center justify-between mr-36">
                        <a href="{{ route('reject') }}" >
                        <span>Reject friendship</span>
                        </a>
                        <i class="fas fa-chevron-right text-gray-400 mr-36"></i>
                    </li>
                </ul>
            </div>
            {{-- <div class="ml-36 mt-5">
                <ul>
                    <li class="flex items-center justify-between mb-4 mr-36">
                        <a href="{{ route('interaction') }}" ></a>
                        <span>Frequent interaction</span>
                        <i class="fas fa-chevron-right text-gray-400 mr-36"></i>
                    </li>
                    <li class="flex items-center justify-between mb-4 mr-36">
                        <a href="{{ route('rarely_interaction') }}"></a>
                        <span>Rarely interaction</span>
                        <i class="fas fa-chevron-right text-gray-400 mr-36"></i>
                    </li>
                    <li class="flex items-center justify-between mr-36">
                        <a href="{{ route('reject') }}" ></a>
                        <span>Reject friendship</span>
                        <i class="fas fa-chevron-right text-gray-400 mr-36"></i>
                    </li>
                </ul>
            </div> --}}
        </div>
    </div>
    <script>
        // Data untuk Chart.js
        const labels = @json(array_keys($dailyHoursWithNow));
        const data = @json(array_map('array_sum', $dailyHoursWithNow)); // Total jam untuk setiap hari
    
        // Konfigurasi Chart.js
        const ctx = document.getElementById('dailyChart').getContext('2d');
        const dailyChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Daily Hours',
                    data: data,
                    backgroundColor: labels.map(label => label === 'Now' ? 'rgba(75, 192, 192, 0.6)' : 'rgba(255, 99, 132, 0.6)'),
                    borderColor: labels.map(label => label === 'Now' ? 'rgba(75, 192, 192, 1)' : 'rgba(255, 99, 132, 1)'),
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    
@endsection
