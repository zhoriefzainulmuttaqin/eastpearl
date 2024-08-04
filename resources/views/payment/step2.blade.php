@extends('payment.template')

@section('title')
    Payment - Select Service
@endsection

@section('style')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
    <div class="container">
        <form id="paymentForm" method="POST" action="{{ route('create.pay') }}">
            @csrf

            <div
                class="relative flex w-full md:w-1/2 flex-col rounded-xl bg-gradient-to-tr from-red-800 to-red-500 bg-clip-border p-8 text-white shadow-md shadow-red-500/40 m-auto mt-6 mb-5">
                <div
                    class="relative overflow-hidden rounded-none border-b border-white/10 bg-transparent bg-clip-border pb-8 text-center text-gray-700 shadow-none">
                    <h1 class="flex justify-center gap-1 font-sans text-7xl font-normal tracking-normal text-white">
                        Select Service
                    </h1>
                </div>
                <div class="form-group">
                    <label for="name"> Your Name </label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        id="name" placeholder="Insert Your Name" value="{{ old('name') }}" required
                        autocomplete="off"></input>
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="country" class="block text-sm font-medium text-white">Select Country</label>
                    <select id="country" name="country"
                        class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md js-example-basic-single"
                        required>
                        <option value="">Select a country</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="service">East Pearl Services</label>
                    <label class="opacity-50" for="service">skip if you don't want to select it</label>
                    <select class="js-example-basic-multiple form-control w-full" multiple="multiple" id="service"
                        name="service[]">
                        @foreach ($services as $serv)
                            <option value="{{ $serv->name }}">{{ $serv->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="fit_service">FIT Services</label>
                    <label class="opacity-50" for="fit_service">skip if you don't want to select it</label>
                    <select class="js-example-basic-multiple-fit form-control w-full" multiple="multiple" id="fit_service"
                        name="fit_service[]">
                        <option value="Full Body Massage">Full Body Massage</option>
                        <option value="Reflexology">Reflexology</option>
                        <option value="Head & Neck">Head & Neck</option>
                        <option value="Foot Massage">Foot Massage</option>
                        <option value="Dry Massage">Dry Massage</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="amount">Nominal Pay</label>
                    <label class="opacity-50" for="amount">pay as agreed with our team</label>
                    <input type="number" class="form-control @error('amount') is-invalid @enderror" name="amount"
                        id="amount" placeholder="IDR 000000" value="{{ old('amount') }}" required autocomplete="off"
                        required>
                    @error('amount')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mt-4 p-0">
                    <button type="button" id="nextButton"
                        class="block w-full select-none rounded-lg bg-white py-3.5 px-7 text-center align-middle font-sans text-sm font-bold uppercase text-pink-500 shadow-md shadow-blue-gray-500/10 transition-all hover:scale-[1.02] hover:shadow-lg hover:shadow-blue-gray-500/20 focus:scale-[1.02] focus:opacity-[0.85] focus:shadow-none active:scale-100 active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                        data-ripple-dark="true">
                        Next
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/@material-tailwind/html@latest/scripts/ripple.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
            $('.js-example-basic-multiple-fit').select2();

            $('#nextButton').click(function(event) {
                event.preventDefault();

                var formData = {
                    name: $('#name').val(),
                    country: $('#country').val(),
                    service: $('#service').val(),
                    fit_service: $('#fit_service').val(),
                    amount: $('#amount').val(),
                };

                // AJAX request if needed
                // $.ajax({
                //     type: 'POST',
                //     url: 'your-url-here',
                //     data: formData,
                //     success: function(response) {
                //         console.log(response);
                //     },
                //     error: function(error) {
                //         console.log(error);
                //     }
                // });

                // Or submit the form
                $('#paymentForm').submit();
            });
        });

        $(document).ready(function() {
            $('.js-example-basic-single').select2();

            // Fetch countries from the API
            $.ajax({
                url: 'https://restcountries.com/v3.1/all',
                method: 'GET',
                success: function(data) {
                    data.forEach(function(country) {
                        $('#country').append(new Option(country.name.common, country.name
                            .common));
                    });
                },
                error: function(error) {
                    console.log('Error fetching countries:', error);
                }
            });
        });
    </script>
@endsection
