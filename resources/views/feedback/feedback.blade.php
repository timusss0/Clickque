@extends('layouts.app')
@section('content')
<div class="w-1/5 bg-gray-100 p-6 rounded-l-lg">
@include('layouts.sidebar')

        
<div class="w-3/4 p-10">
    <h2 class="text-2xl font-bold mb-4">We would like your feedback to improve our web</h2>
    <p class="text-gray-600 mb-6">What is your opinion of this web?</p>
    <div class="flex justify-center space-x-6 mb-6">
        <i id="smile" class="far fa-smile text-4xl text-gray-400 cursor-pointer"></i>
        <i id="laugh" class="far fa-laugh text-4xl text-blue-500 cursor-pointer"></i>
        <i id="meh" class="far fa-meh text-4xl text-gray-400 cursor-pointer"></i>
        <i id="frown" class="far fa-frown text-4xl text-gray-400 cursor-pointer"></i>
        <i id="surprise" class="far fa-surprise text-4xl text-gray-400 cursor-pointer"></i>
    </div>    
    <p class="text-gray-600 mb-4">Do you have any thoughts you’d like to share?</p>
    <textarea class="w-full p-4 border border-gray-300 rounded-lg mb-4" rows="4" placeholder="Write your message here"></textarea>
    <button class="bg-blue-500 text-white px-6 py-2 rounded-lg shadow">Send</button>
</div>
</div>

<script>
    // Pilih semua emoji
    const emojis = document.querySelectorAll('.flex i');

    // Tambahkan event listener untuk klik
    emojis.forEach(emoji => {
        emoji.addEventListener('click', () => {
            // Hapus highlight dari semua emoji
            emojis.forEach(e => e.classList.remove('text-blue-500'));
            emojis.forEach(e => e.classList.add('text-gray-400'));
            
            // Highlight emoji yang diklik
            emoji.classList.remove('text-gray-400');
            emoji.classList.add('text-blue-500');

            // Kirim feedback ke server atau simpan dalam variabel
            const feedback = emoji.id;
            console.log('Feedback selected:', feedback);

            // Contoh: Kirim data ke server menggunakan fetch
            fetch('/feedback', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ feedback: feedback })
            })
            .then(response => response.json())
            .then(data => {
                console.log('Feedback submitted:', data);
            })
            .catch(error => {
                console.error('Error submitting feedback:', error);
            });
        });
    });
</script>

@endsection