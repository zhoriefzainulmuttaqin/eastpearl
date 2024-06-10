@extends('user.template')

@section('title')
    Services
@endsection
<script src="https://cdn.tailwindcss.com"></script>

<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />

@section('cover')
    <?= url('assets/bg/tentang.jpg') ?>
@endsection

@section('content')
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-BV3NGNRL2G"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-BV3NGNRL2G');
    </script>
    <div class="container-lg mt-5">
        <h1
            class="mb-4 text-3xl font-extrabold leading-none tracking-tight text-gray-900 md:text-4xl lg:text-6xl dark:text-white">
            {{ __('layanan.liburan') }} <span class="" style="color: #ba1918">
                @if (App::isLocale('id'))
                    {{ __('layanan.paket') }} {{ $category->name }}
                @elseif(App::isLocale('en'))
                    {{ $category->name_en }}
                @else
                    {{ $category->name_mandarin }}
                @endif
                @if (App::isLocale('id'))
                    {{ $about->company_name }}
                @elseif(App::isLocale('en'))
                    {{ $about->company_name }} {{ __('layanan.paket') }}
                @else
                @endif
        </h1>
        <p class="text-lg mb-4 font-normal text-gray-500 lg:text-xl dark:text-gray-400"> {{ __('layanan.text_liburan') }}
        </p>
        <!-- component -->
        <div class="d-none d-lg-block">

            <div class="grid grid-cols-3 md:grid-cols-3 gap-3 flex-wrap ">
                @foreach ($services as $layanan)
                    <div
                        class="relative flex w-full max-w-[26rem] flex-col rounded-xl bg-white bg-clip-border text-gray-700 shadow-lg">
                        <div
                            class="relative mx-4 mt-4 overflow-hidden rounded-xl bg-blue-gray-500 bg-clip-border text-white shadow-lg shadow-blue-gray-500/40">
                            <img src="{{ url("/assets/services/$layanan->image") }}" alt="{{ $layanan->slug }}"
                                style="width: 100%; height: 15rem;" />
                            <div
                                class="to-bg-black-10 absolute inset-0 h-full w-full bg-gradient-to-tr from-transparent via-transparent to-black/60">
                            </div>
                            <button
                                class="!absolute top-4 right-4 h-8 max-h-[32px] w-8 max-w-[32px] select-none rounded-full text-center align-middle font-sans text-xs font-medium uppercase text-red-500 transition-all hover:bg-red-500/10 active:bg-red-500/30 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                type="button" data-ripple-dark="true">
                                <span class="absolute top-1/2 left-1/2 -translate-y-1/2 -translate-x-1/2 transform">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        aria-hidden="true" class="h-6 w-6">
                                        <path
                                            d="M11.645 20.91l-.007-.003-.022-.012a15.247 15.247 0 01-.383-.218 25.18 25.18 0 01-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0112 5.052 5.5 5.5 0 0116.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 01-4.244 3.17 15.247 15.247 0 01-.383.219l-.022.012-.007.004-.003.001a.752.752 0 01-.704 0l-.003-.001z">
                                        </path>
                                    </svg>
                                </span>
                            </button>
                        </div>
                        <div class="p-6">
                            <div class="flex items-center justify-center mb-2" style="text-align: center;">
                                <h5
                                    class="mb-2 block font-sans text-xl font-medium leading-snug tracking-normal text-blue-gray-900 antialiased">
                                    @if (App::isLocale('id'))
                                        <div class="d-flex flex-col">

                                            <span>
                                                {{ $layanan->name }}

                                            </span>
                                            <span class="text-red-500">
                                                {{ $layanan->durasi }}
                                            </span>
                                            <span class="text-red-500">
                                                IDR {{ number_format($layanan->price, 0, ',', '.') }}

                                            </span>
                                        </div>
                                    @elseif(App::isLocale('en'))
                                        <div class="d-flex flex-col">

                                            <span>
                                                {{ $layanan->name_en }}

                                            </span>
                                            <span class="text-red-500">
                                                {{ $layanan->durasi }}
                                            </span>
                                            <span class="text-red-500">
                                                IDR {{ number_format($layanan->price, 0, ',', '.') }}

                                            </span>
                                        </div>
                                    @else
                                        <div class="d-flex flex-col">

                                            <span>
                                                {{ $layanan->name_mandarin }}

                                            </span>
                                            <span class="text-red-500">
                                                {{ $layanan->durasi }}
                                            </span>
                                            <span class="text-red-500">
                                                IDR {{ number_format($layanan->price, 0, ',', '.') }}

                                            </span>
                                        </div>
                                    @endif
                                </h5>

                            </div>
                            <p class="block font-sans text-base font-light leading-relaxed text-gray-700 antialiased">
                                @if (App::isLocale('id'))
                                    {!! nl2br(
                                        strlen($layanan->short_desc) > 300 ? substr($layanan->short_desc, 0, 300) . '...' : $layanan->short_desc,
                                    ) !!}
                                @elseif(App::isLocale('en'))
                                    {!! nl2br(
                                        strlen($layanan->short_desc_en) > 300 ? substr($layanan->short_desc_en, 0, 300) . '...' : $layanan->short_desc_en,
                                    ) !!}
                                @else
                                    {!! nl2br(
                                        strlen($layanan->short_desc_mandarin) > 300
                                            ? substr($layanan->short_desc_mandarin, 0, 300) . '...'
                                            : $layanan->short_desc_mandarin,
                                    ) !!}
                                @endif
                            </p>

                            {{-- <div class="group mt-8 inline-flex flex-wrap items-center gap-3">
                                <span data-tooltip-target="money"
                                    class="cursor-pointer rounded-full border border-pink-500/5 bg-pink-500/5 p-3 text-danger transition-colors hover:border-pink-500/10 hover:bg-pink-500/10 hover:!opacity-100 group-hover:opacity-70">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        aria-hidden="true" class="h-5 w-5">
                                        <path d="M12 7.5a2.25 2.25 0 100 4.5 2.25 2.25 0 000-4.5z"></path>
                                        <path fill-rule="evenodd"
                                            d="M1.5 4.875C1.5 3.839 2.34 3 3.375 3h17.25c1.035 0 1.875.84 1.875 1.875v9.75c0 1.036-.84 1.875-1.875 1.875H3.375A1.875 1.875 0 011.5 14.625v-9.75zM8.25 9.75a3.75 3.75 0 117.5 0 3.75 3.75 0 01-7.5 0zM18.75 9a.75.75 0 00-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 00.75-.75V9.75a.75.75 0 00-.75-.75h-.008zM4.5 9.75A.75.75 0 015.25 9h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H5.25a.75.75 0 01-.75-.75V9.75z"
                                            clip-rule="evenodd"></path>
                                        <path
                                            d="M2.25 18a.75.75 0 000 1.5c5.4 0 10.63.722 15.6 2.075 1.19.324 2.4-.558 2.4-1.82V18.75a.75.75 0 00-.75-.75H2.25z">
                                        </path>
                                    </svg>
                                </span>
                                <span data-tooltip-target="wifi"
                                    class="cursor-pointer rounded-full border border-pink-500/5 bg-pink-500/5 p-3 text-danger transition-colors hover:border-pink-500/10 hover:bg-pink-500/10 hover:!opacity-100 group-hover:opacity-70">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        aria-hidden="true" class="h-5 w-5">
                                        <path fill-rule="evenodd"
                                            d="M1.371 8.143c5.858-5.857 15.356-5.857 21.213 0a.75.75 0 010 1.061l-.53.53a.75.75 0 01-1.06 0c-4.98-4.979-13.053-4.979-18.032 0a.75.75 0 01-1.06 0l-.53-.53a.75.75 0 010-1.06zm3.182 3.182c4.1-4.1 10.749-4.1 14.85 0a.75.75 0 010 1.061l-.53.53a.75.75 0 01-1.062 0 8.25 8.25 0 00-11.667 0 .75.75 0 01-1.06 0l-.53-.53a.75.75 0 010-1.06zm3.204 3.182a6 6 0 018.486 0 .75.75 0 010 1.061l-.53.53a.75.75 0 01-1.061 0 3.75 3.75 0 00-5.304 0 .75.75 0 01-1.06 0l-.53-.53a.75.75 0 010-1.06zm3.182 3.182a1.5 1.5 0 012.122 0 .75.75 0 010 1.061l-.53.53a.75.75 0 01-1.061 0l-.53-.53a.75.75 0 010-1.06z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </span>

                                <span data-tooltip-target="bedrooms"
                                    class="cursor-pointer rounded-full border border-pink-500/5 bg-pink-500/5 p-3 text-danger transition-colors hover:border-pink-500/10 hover:bg-pink-500/10 hover:!opacity-100 group-hover:opacity-70">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        aria-hidden="true" class="h-5 w-5">
                                        <path
                                            d="M11.47 3.84a.75.75 0 011.06 0l8.69 8.69a.75.75 0 101.06-1.06l-8.689-8.69a2.25 2.25 0 00-3.182 0l-8.69 8.69a.75.75 0 001.061 1.06l8.69-8.69z">
                                        </path>
                                        <path
                                            d="M12 5.432l8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 01-.75-.75v-4.5a.75.75 0 00-.75-.75h-3a.75.75 0 00-.75.75V21a.75.75 0 01-.75.75H5.625a1.875 1.875 0 01-1.875-1.875v-6.198a2.29 2.29 0 00.091-.086L12 5.43z">
                                        </path>
                                    </svg>
                                </span>

                                <span data-tooltip-target="tv"
                                    class="cursor-pointer rounded-full border border-pink-500/5 bg-pink-500/5 p-3 text-danger transition-colors hover:border-pink-500/10 hover:bg-pink-500/10 hover:!opacity-100 group-hover:opacity-70">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        aria-hidden="true" class="h-5 w-5">
                                        <path d="M19.5 6h-15v9h15V6z"></path>
                                        <path fill-rule="evenodd"
                                            d="M3.375 3C2.339 3 1.5 3.84 1.5 4.875v11.25C1.5 17.16 2.34 18 3.375 18H9.75v1.5H6A.75.75 0 006 21h12a.75.75 0 000-1.5h-3.75V18h6.375c1.035 0 1.875-.84 1.875-1.875V4.875C22.5 3.839 21.66 3 20.625 3H3.375zm0 13.5h17.25a.375.375 0 00.375-.375V4.875a.375.375 0 00-.375-.375H3.375A.375.375 0 003 4.875v11.25c0 .207.168.375.375.375z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </span>
                                <span data-tooltip-target="fire"
                                    class="cursor-pointer rounded-full border border-pink-500/5 bg-pink-500/5 p-3 text-danger transition-colors hover:border-pink-500/10 hover:bg-pink-500/10 hover:!opacity-100 group-hover:opacity-70">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        aria-hidden="true" class="h-5 w-5">
                                        <path fill-rule="evenodd"
                                            d="M12.963 2.286a.75.75 0 00-1.071-.136 9.742 9.742 0 00-3.539 6.177A7.547 7.547 0 016.648 6.61a.75.75 0 00-1.152-.082A9 9 0 1015.68 4.534a7.46 7.46 0 01-2.717-2.248zM15.75 14.25a3.75 3.75 0 11-7.313-1.172c.628.465 1.35.81 2.133 1a5.99 5.99 0 011.925-3.545 3.75 3.75 0 013.255 3.717z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </span>
                                <span data-tooltip-target="more"
                                    class="cursor-pointer rounded-full border border-pink-500/5 bg-pink-500/5 p-3 text-danger transition-colors hover:border-pink-500/10 hover:bg-pink-500/10 hover:!opacity-100 group-hover:opacity-70">
                                    +20
                                </span>
                            </div> --}}
                        </div>
                        <div class="p-6 pt-3">
                            <a href="{{ route('detail.layanan.kategori', ['slug' => $layanan->slug]) }}">

                                <button
                                    class="block w-full select-none rounded-lg bg-danger py-3.5 px-7 text-center align-middle font-sans text-sm font-bold uppercase text-white shadow-md shadow-pink-500/20 transition-all hover:shadow-lg hover:shadow-pink-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                    type="button" data-ripple-light="true">
                                    {{ __('layanan.detail') }}
                                </button>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="grid grid-cols-3 md:grid-cols-3 gap-3 flex-wrap d-block d-lg-none">
            @foreach ($services as $layanan)
                <div
                    class="relative flex w-full max-w-[26rem] flex-col rounded-xl bg-white bg-clip-border text-gray-700 shadow-lg mt-4">
                    <div
                        class="relative mx-4 mt-4 overflow-hidden rounded-xl bg-blue-gray-500 bg-clip-border text-white shadow-lg shadow-blue-gray-500/40">
                        <img src="{{ url("/assets/services/$layanan->image") }}" alt="{{ $layanan->slug }}"
                            style="width: 100%; height: 15rem;" />
                        <div
                            class="to-bg-black-10 absolute inset-0 h-full w-full bg-gradient-to-tr from-transparent via-transparent to-black/60">
                        </div>
                        <button
                            class="!absolute top-4 right-4 h-8 max-h-[32px] w-8 max-w-[32px] select-none rounded-full text-center align-middle font-sans text-xs font-medium uppercase text-red-500 transition-all hover:bg-red-500/10 active:bg-red-500/30 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                            type="button" data-ripple-dark="true">
                            <span class="absolute top-1/2 left-1/2 -translate-y-1/2 -translate-x-1/2 transform">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    aria-hidden="true" class="h-6 w-6">
                                    <path
                                        d="M11.645 20.91l-.007-.003-.022-.012a15.247 15.247 0 01-.383-.218 25.18 25.18 0 01-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0112 5.052 5.5 5.5 0 0116.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 01-4.244 3.17 15.247 15.247 0 01-.383.219l-.022.012-.007.004-.003.001a.752.752 0 01-.704 0l-.003-.001z">
                                    </path>
                                </svg>
                            </span>
                        </button>
                    </div>
                    <div class="p-4">
                        <div class="flex items-center justify-center" style="text-align: center">
                            <h5
                                class="mb-2 block font-sans text-xl font-medium leading-snug tracking-normal text-blue-gray-900 antialiased">
                                @if (App::isLocale('id'))
                                    <div class="d-flex flex-col">

                                        <span>
                                            {{ $layanan->name }}

                                        </span>
                                        <span class="text-red-500">
                                            {{ $layanan->durasi }}
                                        </span>
                                        <span class="text-red-500">
                                            IDR {{ number_format($layanan->price, 0, ',', '.') }}

                                        </span>
                                    </div>
                                @elseif(App::isLocale('en'))
                                    <div class="d-flex flex-col">

                                        <span>
                                            {{ $layanan->name_en }}

                                        </span>
                                        <span class="text-red-500">
                                            {{ $layanan->durasi }}
                                        </span>
                                        <span class="text-red-500">
                                            IDR {{ number_format($layanan->price, 0, ',', '.') }}

                                        </span>
                                    </div>
                                @else
                                    <div class="d-flex flex-col">

                                        <span>
                                            {{ $layanan->name_mandarin }}

                                        </span>
                                        <span class="text-red-500">
                                            {{ $layanan->durasi }}
                                        </span>
                                        <span class="text-red-500">
                                            IDR {{ number_format($layanan->price, 0, ',', '.') }}

                                        </span>
                                    </div>
                                @endif
                            </h5>
                        </div>
                        <p class="block font-sans text-base font-light leading-relaxed text-gray-700 antialiased">
                            @if (App::isLocale('id'))
                                {!! nl2br(
                                    strlen($layanan->short_desc) > 300 ? substr($layanan->short_desc, 0, 300) . '...' : $layanan->short_desc,
                                ) !!}
                            @elseif(App::isLocale('en'))
                                {!! nl2br(
                                    strlen($layanan->short_desc_en) > 300 ? substr($layanan->short_desc_en, 0, 300) . '...' : $layanan->short_desc_en,
                                ) !!}
                            @else
                                {!! nl2br(
                                    strlen($layanan->short_desc_mandarin) > 300
                                        ? substr($layanan->short_desc_mandarin, 0, 300) . '...'
                                        : $layanan->short_desc_mandarin,
                                ) !!}
                            @endif
                        </p>

                        {{-- <div class="group mt-8 inline-flex flex-wrap items-center gap-3">
                            <span data-tooltip-target="money"
                                class="cursor-pointer rounded-full border border-pink-500/5 bg-pink-500/5 p-3 text-danger transition-colors hover:border-pink-500/10 hover:bg-pink-500/10 hover:!opacity-100 group-hover:opacity-70">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    aria-hidden="true" class="h-5 w-5">
                                    <path d="M12 7.5a2.25 2.25 0 100 4.5 2.25 2.25 0 000-4.5z"></path>
                                    <path fill-rule="evenodd"
                                        d="M1.5 4.875C1.5 3.839 2.34 3 3.375 3h17.25c1.035 0 1.875.84 1.875 1.875v9.75c0 1.036-.84 1.875-1.875 1.875H3.375A1.875 1.875 0 011.5 14.625v-9.75zM8.25 9.75a3.75 3.75 0 117.5 0 3.75 3.75 0 01-7.5 0zM18.75 9a.75.75 0 00-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 00.75-.75V9.75a.75.75 0 00-.75-.75h-.008zM4.5 9.75A.75.75 0 015.25 9h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H5.25a.75.75 0 01-.75-.75V9.75z"
                                        clip-rule="evenodd"></path>
                                    <path
                                        d="M2.25 18a.75.75 0 000 1.5c5.4 0 10.63.722 15.6 2.075 1.19.324 2.4-.558 2.4-1.82V18.75a.75.75 0 00-.75-.75H2.25z">
                                    </path>
                                </svg>
                            </span>
                            <span data-tooltip-target="wifi"
                                class="cursor-pointer rounded-full border border-pink-500/5 bg-pink-500/5 p-3 text-danger transition-colors hover:border-pink-500/10 hover:bg-pink-500/10 hover:!opacity-100 group-hover:opacity-70">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    aria-hidden="true" class="h-5 w-5">
                                    <path fill-rule="evenodd"
                                        d="M1.371 8.143c5.858-5.857 15.356-5.857 21.213 0a.75.75 0 010 1.061l-.53.53a.75.75 0 01-1.06 0c-4.98-4.979-13.053-4.979-18.032 0a.75.75 0 01-1.06 0l-.53-.53a.75.75 0 010-1.06zm3.182 3.182c4.1-4.1 10.749-4.1 14.85 0a.75.75 0 010 1.061l-.53.53a.75.75 0 01-1.062 0 8.25 8.25 0 00-11.667 0 .75.75 0 01-1.06 0l-.53-.53a.75.75 0 010-1.06zm3.204 3.182a6 6 0 018.486 0 .75.75 0 010 1.061l-.53.53a.75.75 0 01-1.061 0 3.75 3.75 0 00-5.304 0 .75.75 0 01-1.06 0l-.53-.53a.75.75 0 010-1.06zm3.182 3.182a1.5 1.5 0 012.122 0 .75.75 0 010 1.061l-.53.53a.75.75 0 01-1.061 0l-.53-.53a.75.75 0 010-1.06z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </span>

                            <span data-tooltip-target="bedrooms"
                                class="cursor-pointer rounded-full border border-pink-500/5 bg-pink-500/5 p-3 text-danger transition-colors hover:border-pink-500/10 hover:bg-pink-500/10 hover:!opacity-100 group-hover:opacity-70">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    aria-hidden="true" class="h-5 w-5">
                                    <path
                                        d="M11.47 3.84a.75.75 0 011.06 0l8.69 8.69a.75.75 0 101.06-1.06l-8.689-8.69a2.25 2.25 0 00-3.182 0l-8.69 8.69a.75.75 0 001.061 1.06l8.69-8.69z">
                                    </path>
                                    <path
                                        d="M12 5.432l8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 01-.75-.75v-4.5a.75.75 0 00-.75-.75h-3a.75.75 0 00-.75.75V21a.75.75 0 01-.75.75H5.625a1.875 1.875 0 01-1.875-1.875v-6.198a2.29 2.29 0 00.091-.086L12 5.43z">
                                    </path>
                                </svg>
                            </span>

                            <span data-tooltip-target="tv"
                                class="cursor-pointer rounded-full border border-pink-500/5 bg-pink-500/5 p-3 text-danger transition-colors hover:border-pink-500/10 hover:bg-pink-500/10 hover:!opacity-100 group-hover:opacity-70">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    aria-hidden="true" class="h-5 w-5">
                                    <path d="M19.5 6h-15v9h15V6z"></path>
                                    <path fill-rule="evenodd"
                                        d="M3.375 3C2.339 3 1.5 3.84 1.5 4.875v11.25C1.5 17.16 2.34 18 3.375 18H9.75v1.5H6A.75.75 0 006 21h12a.75.75 0 000-1.5h-3.75V18h6.375c1.035 0 1.875-.84 1.875-1.875V4.875C22.5 3.839 21.66 3 20.625 3H3.375zm0 13.5h17.25a.375.375 0 00.375-.375V4.875a.375.375 0 00-.375-.375H3.375A.375.375 0 003 4.875v11.25c0 .207.168.375.375.375z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </span>
                            <span data-tooltip-target="fire"
                                class="cursor-pointer rounded-full border border-pink-500/5 bg-pink-500/5 p-3 text-danger transition-colors hover:border-pink-500/10 hover:bg-pink-500/10 hover:!opacity-100 group-hover:opacity-70">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    aria-hidden="true" class="h-5 w-5">
                                    <path fill-rule="evenodd"
                                        d="M12.963 2.286a.75.75 0 00-1.071-.136 9.742 9.742 0 00-3.539 6.177A7.547 7.547 0 016.648 6.61a.75.75 0 00-1.152-.082A9 9 0 1015.68 4.534a7.46 7.46 0 01-2.717-2.248zM15.75 14.25a3.75 3.75 0 11-7.313-1.172c.628.465 1.35.81 2.133 1a5.99 5.99 0 011.925-3.545 3.75 3.75 0 013.255 3.717z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </span>
                            <span data-tooltip-target="more"
                                class="cursor-pointer rounded-full border border-pink-500/5 bg-pink-500/5 p-3 text-danger transition-colors hover:border-pink-500/10 hover:bg-pink-500/10 hover:!opacity-100 group-hover:opacity-70">
                                +20
                            </span>
                        </div> --}}
                    </div>
                    <div class="p-6 pt-3">
                        <a href="{{ route('detail.layanan.kategori', ['slug' => $layanan->slug]) }}">
                            <button
                                class="block w-full select-none rounded-lg bg-danger py-3.5 px-7 text-center align-middle font-sans text-sm font-bold uppercase text-white shadow-md shadow-pink-500/20 transition-all hover:shadow-lg hover:shadow-pink-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                type="button" data-ripple-light="true">
                                {{ __('layanan.detail') }}
                            </button>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>




    </div>
    <div class="clearfix mb-5"></div>
    <!-- stylesheet -->
    <link rel="stylesheet" href="https://unpkg.com/@material-tailwind/html@latest/styles/material-tailwind.css" />

    <!-- from cdn -->
    <script src="https://unpkg.com/@material-tailwind/html@latest/scripts/ripple.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
@endsection
