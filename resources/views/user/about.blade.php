@extends('user.template')

@section('title')
    {{ __('event.title') }}
@endsection


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
        <!-- component -->
        <h5
            class="mb-2 text-center font-sans text-4xl font-semibold leading-snug tracking-normal text-blue-gray-900 antialiased">
            Tentang Kami
        </h5>
        <div class=" flex w-200 flex-row rounded-xl bg-white bg-clip-border text-gray-700 shadow-md">
            <div class=" mx-4 -mt-6 overflow-hidden rounded-xl bg-clip-border text-white shadow-lg shadow-blue-gray-500/40">
                <img src="https://indonesiajuara.asia/wp-content/uploads/2022/05/IndonesiaJuara-Trip-355x280-1-300x237.jpeg"
                    style="width: 350rem !important; height: 20rem;" alt="img-blur-shadow" layout="fill" />
            </div>
            <div class="p-6">
                <div>

                </div>
                <p class="block font-sans text-base font-light leading-relaxed text-inherit antialiased">
                    Eastpearl merupakan Tour Operator yang menjalankan langsung aktivitas tour dengan konsep
                    berpetualang di wisata alam Indonesia. Berpengalaman lebih dari 7 tahun dengan review Tour Terbaik di
                    TripAdvisor, kami menyediakan paket wisata Open Trip dan Private Trip—termasuk sewa kapal Phinisi.
                    Destinasi wisata pilihan kami adalah Labuan Bajo, Sumba, Nusa Penida, Raja Ampat, dan Derawan. Dengan
                    tim Guide Lokal yang memiliki pengetahuan daerah yang lengkap dan pelayanan dari hati, IndonesiaJuara
                    memastikan setiap wisatawan yang berlibur bersama IndonesiaJuara akan mendapatkan pengalaman terbaiknya!
                    Kami juga menjamin harga terbaik, tanpa hidden fee. Informasi biaya setiap paket trip ditampilkan
                    sedetail mungkin dan akan diperjelas lagi saat berkomunikasi via WhatsApp agar kamu bisa merencanakan
                    budget liburan dengan tepat.
                </p>
            </div>
        </div>

        <h5
            class="mb-4 mt-6 text-center font-sans text-4xl font-semibold leading-snug tracking-normal text-blue-gray-900 antialiased">
            – Kantor Kami –
        </h5>
        <div class=" flex w-200 flex-row rounded-xl bg-white bg-clip-border text-gray-700 shadow-md">
            <div class="p-6">
                <h5
                    class="mb-4 font-sans text-3xl font-semibold leading-snug tracking-normal text-blue-gray-900 antialiased">
                    Office
                </h5>
                <p class="block font-sans text-base font-light leading-relaxed text-inherit antialiased">
                <div class="flex-row">
                    <i class=' uil-map-marker' style="font-size: 34px; color:black;"></i>
                    <span class="ml-4">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quam eveniet quae labore.
                        Accusantium
                        placeat eius cum nobi</span>
                </div>
                <div class="mt-4">
                    <a href="{{ getOption('fb_link') }}" target="_blank" class="h1">
                        <i class='uil-facebook-f'></i>
                    </a>
                    <a href="https://www.instagram.com/visitcirebon.id?igshid=ODA1NTc5OTg5Nw==" target="_blank"
                        class="h1">
                        <i class='uil-instagram'></i>
                    </a>
                    <a href="https://www.tiktok.com/@visit.cirebon.id?_t=8iKVr2u4Z6e&_r=1" target="_blank" class="h1">
                        <i class='fa-brands fa-tiktok'></i>
                    </a>
                    <a href="https://youtube.com/@VisitCirebonId?si=AS4mL5Y_ehCoyXBE" target="_blank" class="h1">
                        <i class='uil-youtube'></i>
                    </a>
                </div>
                </p>
            </div>
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126744.84204366946!2d107.610112!3d-6.9173248!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e64c5e8866e5%3A0x37be7ac9d575f7ed!2sGedung%20Sate!5e0!3m2!1sid!2sid!4v1708265667925!5m2!1sid!2sid"
                width="400" height="auto" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

        <h5
            class="mb-4 mt-6 text-center font-sans text-4xl font-semibold leading-snug tracking-normal text-blue-gray-900 antialiased">
            – Galeri –
        </h5>
        <div class=" flex w-200 flex-row rounded-xl bg-white bg-clip-border text-gray-700 shadow-md">
            <div class="p-6">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <div class="grid gap-4">
                        <div>
                            <img class="h-auto max-w-full rounded-lg" src="{{ url('assets/bg/padar.png') }}" alt="">
                        </div>
                        <!-- Add event listener to trigger popup -->
                        <div>
                            <img class="h-auto max-w-full rounded-lg popup-trigger" src="{{ url('assets/bg/padar.png') }}"
                                alt="">
                        </div>
                        <div>
                            <img class="h-auto max-w-full rounded-lg popup-trigger" src="{{ url('assets/bg/padar.png') }}"
                                alt="">
                        </div>
                    </div>
                    <div class="grid gap-4">
                        <div>
                            <img class="cursor-pointer h-auto  max-w-full rounded-lg popup-trigger"
                                src="{{ url('assets/bg/padar.png') }}" alt="">
                        </div>
                        <div>
                            <img class="cursor-pointer h-auto  max-w-full rounded-lg popup-trigger"
                                src="{{ url('assets/bg/padar.png') }}" alt="">
                        </div>
                        <div>
                            <img class="cursor-pointer h-auto  max-w-full rounded-lg popup-trigger"
                                src="{{ url('assets/bg/padar.png') }}" alt="">
                        </div>
                    </div>
                    <div class="grid gap-4">
                        <div>
                            <img class="cursor-pointer h-auto  max-w-full rounded-lg popup-trigger"
                                src="{{ url('assets/bg/padar.png') }}" alt="">
                        </div>
                        <div>
                            <img class="cursor-pointer h-auto  max-w-full rounded-lg popup-trigger"
                                src="{{ url('assets/bg/padar.png') }}" alt="">
                        </div>
                        <div>
                            <img class="cursor-pointer h-auto  max-w-full rounded-lg popup-trigger"
                                src="{{ url('assets/bg/padar.png') }}" alt="">
                        </div>
                    </div>
                    <div class="grid gap-4">
                        <div>
                            <img class="cursor-pointer h-auto  max-w-full rounded-lg popup-trigger"
                                src="{{ url('assets/bg/padar.png') }}" alt="">
                        </div>
                        <div>
                            <img class="cursor-pointer h-auto  max-w-full rounded-lg popup-trigger"
                                src="{{ url('assets/bg/padar.png') }}" alt="">
                        </div>
                        <div>
                            <img class="cursor-pointer h-auto  max-w-full rounded-lg popup-trigger"
                                src="{{ url('assets/bg/padar.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- stylesheet -->
        <link rel="stylesheet" href="https://unpkg.com/@material-tailwind/html@latest/styles/material-tailwind.css" />

        <!-- Ripple Effect -->
        <!-- from cdn -->
        <script src="https://unpkg.com/@material-tailwind/html@latest/scripts/ripple.js"></script>
    </div>
    <div class="clearfix mb-5"></div>
@endsection
