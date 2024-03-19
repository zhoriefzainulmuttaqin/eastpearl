@extends('user.template')

@section('title')
    {{ __('event.title') }}
@endsection
<script src="https://cdn.tailwindcss.com"></script>

<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />

@section('cover')
    <?= url('assets/bg/tentang.png') ?>
@endsection

@section('content')
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-26YC4R3P36"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-26YC4R3P36');
    </script>

    <div class="container-lg mt-5">
        <h1
            class="mb-4 text-3xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-dark">
            Lihat keseruan kami dalam memberikan pelayanan touris melihat <span style="color: #f4b8fc">keindahan Labuan
                Bajo</span>
        </h1>
        <p class="text-lg mb-4 font-normal text-gray-500 lg:text-xl dark:text-gray-400">
            Tour Experts kami selalu siap untuk mengurus perjalan liburan dari awal hingga akhir. Sehingga kamu mendapatkan
            pengalaman unik tak terlupakan selama mengeksplorasi keindahan Labuan Bajo.
        </p>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            @foreach ($galeri as $galleries)
                <div class="grid gap-4">
                    <div>
                        <img class="h-auto max-w-full rounded-lg" src="{{ url('assets/galeri/'. $galleries->image) }}" alt="">
                    </div>
                    <div>
                        <img class="h-auto max-w-full rounded-lg popup-trigger" src="{{ url('assets/bg/padar.png') }}"
                            alt="">
                    </div>
                    <div>
                        <img class="h-auto max-w-full rounded-lg popup-trigger" src="{{ url('assets/bg/padar.png') }}"
                            alt="">
                    </div>
                </div>
            @endforeach

        </div>

        <!-- Popup -->
        <div id="popup-image"
            class="fixed top-0 left-0 w-full h-full z-50 bg-black opacity-0 transition-opacity flex justify-center items-center">
            <div id="popup-content" class="max-w-screen p-10">
                <img id="popup-image-src" class="max-w-full">
            </div>
        </div>
    </div>

    <script>
        // Get references to the popup and popup image
        const popup = document.getElementById('popup-image');
        const popupImage = document.getElementById('popup-image-src');

        // Get all elements that trigger the popup
        const popupTriggers = document.querySelectorAll('.popup-trigger');

        // Loop through each trigger to add event listener
        popupTriggers.forEach(trigger => {
            trigger.addEventListener('click', () => {
                // Change the source of the popup image to the clicked image
                popupImage.src = trigger.src;
                // Show the popup
                popup.classList.add('opacity-100');
                popup.classList.remove('opacity-0');
                // Disable scrolling when the popup is open
                document.body.style.overflow = 'hidden';
            });
        });

        // Add event listener to close popup when clicking outside the image
        popup.addEventListener('click', (event) => {
            // Check if the click was outside the image
            if (event.target === popup) {
                // Hide the popup
                popup.classList.remove('opacity-100');
                popup.classList.add('opacity-0');
                // Enable scrolling when the popup is closed
                document.body.style.overflow = 'auto';
            }
        });
    </script>

    <div class="clearfix mb-5"></div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
@endsection
