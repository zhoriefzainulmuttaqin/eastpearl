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
                    IndonesiaJuara Trip merupakan Tour Operator yang menjalankan langsung aktivitas tour dengan konsep
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
            class="mb-2 mt-6 text-center font-sans text-4xl font-semibold leading-snug tracking-normal text-blue-gray-900 antialiased">
            – Kantor Kami –
        </h5>
        <div class=" flex w-200 flex-row rounded-xl bg-white bg-clip-border text-gray-700 shadow-md">
            <div class="p-6">
                <h5
                    class="mb-2 font-sans text-3xl font-semibold leading-snug tracking-normal text-blue-gray-900 antialiased">
                    Office
                </h5>
                <p class="block font-sans text-base font-light leading-relaxed text-inherit antialiased">
                    IndonesiaJuara Trip merupakan Tour Operator yang menjalankan langsung aktivitas tour dengan konsep
                    berpetualang di wisata alam Indonesia. Berpengalaman lebih dari 7 tahun dengan review Tour Terbaik di
                    TripAdvisor, kami menyediakan paket wisata Open Trip dan Private Trip—termasuk sewa kapal Phinisi.
                    Destinasi wisata pilihan kami adalah Labuan Bajo, Sumba, Nusa Penida, Raja Ampat, dan Derawan. Dengan
                    tim Guide Lokal yang memiliki pengetahuan daerah yang lengkap dan pelayanan dari hati, IndonesiaJuara
                    memastikan setiap wisatawan yang berlibur bersama IndonesiaJuara akan mendapatkan pengalaman terbaiknya!
                </p>
            </div>
            <div class=" mx-4 -mt-6 overflow-hidden rounded-xl bg-clip-border text-white shadow-lg shadow-blue-gray-500/40">
                <img src="https://indonesiajuara.asia/wp-content/uploads/2022/05/IndonesiaJuara-Trip-355x280-1-300x237.jpeg"
                    style="width: 350rem !important; height: 20rem;" alt="img-blur-shadow" layout="fill" />
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
