@extends('payment.template')

@section('title')
    Payment - Payment Success
@endsection

@section('style')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
    <style>
        br {
            line-height: 0.5em !important;
        }
    </style>
    <div class="container">
        <section class="bg-white py-8 antialiased  md:py-16 ">
            <div class="mx-auto max-w-2xl px-4 2xl:px-0 mt-6">
                <h2 class="text-xl font-semibold text-gray-900  sm:text-2xl mb-2">Thanks for your payment!
                </h2>
                <p class="text-gray-500 dark:text-gray-400 mb-2 md:mb-8">Your payment ID <span
                        class="font-bold  hover:underline">{{ $payment->code }}</span>
                    <span class="text-green-500">successfuly.</span>
                </p>
                <div
                    class="space-y-4 sm:space-y-2 rounded-lg border border-gray-100 bg-gray-50 p-6 dark:border-gray-700 dark:bg-gray-800 mb-2 md:mb-8">
                    <dl class="sm:flex items-center justify-between gap-4">
                        <dt class="font-normal mb-1 sm:mb-0 text-gray-500 dark:text-gray-400">Date</dt>
                        <dd class="font-medium text-gray-900 dark:text-white sm:text-end">{{ $payment->updated_at }}</dd>
                    </dl>
                    <dl class="sm:flex items-center justify-between gap-4">
                        <dt class="font-normal mb-1 sm:mb-0 text-gray-500 dark:text-gray-400">Name</dt>
                        <dd class="font-medium text-gray-900 dark:text-white sm:text-end">{{ $payment->name }}</dd>
                    </dl>
                    <dl class="sm:flex items-center justify-between gap-4">
                        <dt class="font-normal mb-1 sm:mb-0 text-gray-500 dark:text-gray-400">Country</dt>
                        <dd class="font-medium text-gray-900 dark:text-white sm:text-end">{{ $payment->country }}</dd>
                    </dl>
                    <dl class="sm:flex items-center justify-between gap-4">
                        <dt class="font-normal mb-1 sm:mb-0 text-gray-500 dark:text-gray-400">Total Amount</dt>
                        <dd class="font-medium text-gray-900 dark:text-white sm:text-end">RP.{{ $payment->amount }}</dd>
                    </dl>
                </div>
                <div class="d-flex items-center space-x-4">
                    <a href="/payment"
                        class="text-white bg-primary hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">Other
                        Transaction</a>
                    <a href="/"
                        class="py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Go
                        To Home</a>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/@material-tailwind/html@latest/scripts/ripple.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script></script>
@endsection
