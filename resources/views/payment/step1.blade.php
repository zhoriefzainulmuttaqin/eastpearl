@extends('payment.template')

@section('title')
    Payment
@endsection

<script src="https://cdn.tailwindcss.com"></script>

<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />


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
    <style>
        br {
            line-height: 0.5em !important;
        }
    </style>
    <div class="container">
        <div
            class="relative flex w-full max-w-[20rem] flex-col rounded-xl bg-gradient-to-tr from-red-800 to-red-500 bg-clip-border p-8 text-white shadow-md shadow-red-500/40 m-auto mt-6">
            <div
                class="relative m-0 mb-8 overflow-hidden rounded-none border-b border-white/10 bg-transparent bg-clip-border pb-8 text-center text-gray-700 shadow-none">

                <h1 class=" flex justify-center gap-1 font-sans text-7xl font-normal tracking-normal text-white ">
                    Online Pay
                </h1>
            </div>
            <div class="p-0">
                <ul class="flex flex-col gap-4">
                    @foreach ($EP_cat as $cat)
                        <li class="flex items-center gap-4">
                            <span class="rounded-full border border-white/20 bg-white/20 p-1">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" aria-hidden="true" class="h-3 w-3">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5">
                                    </path>
                                </svg>
                            </span>
                            <p class="block font-sans text-base font-normal leading-relaxed text-inherit antialiased">
                                {{ $cat->name }}
                            </p>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="mt-12 p-0">
                <a href="/payment/select-service">
                    <button
                        class="block w-full select-none rounded-lg bg-white py-3.5 px-7 text-center align-middle font-sans text-sm font-bold uppercase text-pink-500 shadow-md shadow-blue-gray-500/10 transition-all hover:scale-[1.02] hover:shadow-lg hover:shadow-blue-gray-500/20 focus:scale-[1.02] focus:opacity-[0.85] focus:shadow-none active:scale-100 active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                        type="button" data-ripple-dark="true">
                        Next
                    </button>
                </a>
            </div>
        </div>
    </div>

    <div class="clearfix mb-5"></div>

    <script src="https://unpkg.com/@material-tailwind/html@latest/scripts/ripple.js"></script>
@endsection
