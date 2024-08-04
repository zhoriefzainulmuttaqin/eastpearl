@extends('payment.template')

@section('title')
    Payment - Confirm Pay
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
        <div
            class="relative flex w-full md:w-1/2 flex-col rounded-xl bg-gradient-to-tr from-red-800 to-red-500 bg-clip-border p-8 text-white shadow-md shadow-red-500/40 m-auto mt-6 mb-5">
            <div
                class="relative overflow-hidden rounded-none border-b border-white/10 bg-transparent bg-clip-border pb-8 text-center text-gray-700 shadow-none">

                <h1 class=" flex justify-center gap-1 font-sans text-7xl font-normal tracking-normal text-white ">
                    Confrim Your Payment
                </h1>
            </div>
            <div>
                <table>
                    <tr>
                        <td>Name</td>
                        <td>:</td>
                        <td>{{ $payment->name }}</td>
                    </tr>
                    <tr>
                        <td>Country</td>
                        <td>:</td>
                        <td>{{ $payment->country }}</td>
                    </tr>
                    <tr>
                        <td>East Pearl Service Selected</td>
                        <td>:</td>
                        <td>{{ $payment->service ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td>FIT Service Selected</td>
                        <td>:</td>
                        <td>{{ $payment->fit_service ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td>Total Amount</td>
                        <td>:</td>
                        <td>{{ $payment->amount ?? '-' }}</td>
                    </tr>

                </table>
            </div>
            <div class="mt-4 p-0">
                <button
                    class="block w-full select-none rounded-lg bg-white py-3.5 px-7 text-center align-middle font-sans text-sm font-bold uppercase text-pink-500 shadow-md shadow-blue-gray-500/10 transition-all hover:scale-[1.02] hover:shadow-lg hover:shadow-blue-gray-500/20 focus:scale-[1.02] focus:opacity-[0.85] focus:shadow-none active:scale-100 active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                    type="button" data-ripple-dark="true" id="pay-button">
                    Confirm & Pay
                </button>
            </div>
        </div>
    </div>

    {{-- <div class="clearfix mb-5"></div> --}}
@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/@material-tailwind/html@latest/scripts/ripple.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>

    <script>
        document.getElementById('pay-button').onclick = function() {
            // SnapToken acquired from the previous step
            snap.pay('{{ $payment->snap_token }}', {
                // Optional
                onSuccess: function(result) {
                    // Extract the code from the result object if it exists
                    let code = result.order_id; // Assuming result.order_id is the code
                    // Redirect to the success page with the code
                    window.location.href = '/payment/success/' + code;
                },
                // Optional
                onPending: function(result) {
                    /* You may add your own js here, this is just an example */
                    document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                },
                // Optional
                onError: function(result) {
                    /* You may add your own js here, this is just an example */
                    document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                }
            });
        };
    </script>
@endsection
