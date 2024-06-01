@extends('layouts.tailwind-hr')


@section('content')
    <div class="flex">
        <!-- BEGIN: Content -->
        <div class="content">
            <div class="flex items-center my-4">
                <h2 class="intro-y text-lg font-medium mx-auto">
                    नयाँ सदस्यता को लागि Online फारम भर्नुहोस् |
                </h2>
            </div>
            <form action="{{ route('home.member.store') }}" method="POST" enctype="multipart/form-data"
                id="membership_payment_form">
                @csrf
                <!-- BEGIN: Wizard Layout -->
                <div class="intro-y box pb-10 sm:py-10">

                    <div class="px-5 sm:px-10 tab-content__pane" id="citizenship-content">

                        <h1 class="text-2xl text-theme-6 font-medium leading-none mb-2 text-center">
                            Choose Amount
                            (व्यक्तिगत विवरण) </h1>
                        <hr class="mt-5 mb-5">

                        <ul class="grid w-full gap-2 sm:grid-cols-4">
                            <li class="box px-4 py-4 mb-3 flex items-center zoom-in">
                                <input type="radio" id="amount-500" name="amount" value="500" class="hidden peer"
                                    required />
                                <label for="amount-500"
                                    class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                    <div class="block">
                                        <div class="ml-4 mr-auto">
                                            <div class="font-medium">500</div>
                                        </div>
                                    </div>
                                    <svg class="w-5 h-5 ms-3 rtl:rotate-180" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                    </svg>
                                </label>
                            </li>
                            <li class="box px-4 py-4 mb-3 flex items-center zoom-in">
                                <input type="radio" id="amount-1000" name="amount" value="1000" class="hidden peer">
                                <label for="amount-1000"
                                    class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                    <div class="block">
                                        <div class="ml-4 mr-auto">
                                            <div class="font-medium">1000</div>
                                        </div>
                                    </div>
                                    <svg class="w-5 h-5 ms-3 rtl:rotate-180" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                    </svg>
                                </label>
                            </li>
                            <li class="box px-4 py-4 mb-3 flex items-center zoom-in">
                                <input type="radio" id="amount-2000" name="amount" value="2000" class="hidden peer">
                                <label for="amount-2000"
                                    class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                    <div class="block">
                                        <div class="ml-4 mr-auto">
                                            <div class="font-medium">2000</div>
                                        </div>
                                    </div>
                                    <svg class="w-5 h-5 ms-3 rtl:rotate-180" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                    </svg>
                                </label>
                            </li>
                            <li class="box px-4 py-4 mb-3 flex items-center zoom-in">
                                <input type="radio" id="amount-5000" name="amount" value="5000" class="hidden peer">
                                <label for="amount-5000"
                                    class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                    <div class="block">
                                        <div class="ml-4 mr-auto">
                                            <div class="font-medium">5000</div>
                                        </div>
                                    </div>
                                    <svg class="w-5 h-5 ms-3 rtl:rotate-180" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                    </svg>
                                </label>
                            </li>
                        </ul>

                        <div class="grid grid-cols-12 gap-2">
                            <div class="col-span-12">
                                <div class="mt-3">
                                    <h3
                                        class="mb-5 text-lg font-medium text-gray-900 dark:text-white  @error('email') text-theme-6 @enderror ">
                                        Enter Amount
                                        <span
                                            class="text-lg ext-theme-9 text-theme-6 font-medium leading-none ml-1">*</span>
                                    </h3>

                                    <div class="mb-6">

                                        <input type="text"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            name="email" id="payment_amount"
                                            value="{{ isset($member) ? $member->payment_amount : old('payment_amount') }}">
                                        @error('payment_amount')
                                            <span class="text-theme-6 mt-2" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr class="mt-5 mb-5">
                        <h1 class="text-2xl text-theme-6 font-medium leading-none mt-2 mb-2 text-center">
                            Payment gateway
                            (व्यक्तिगत विवरण) </h1>
                        <hr class="mt-5 mb-5">

                        <h3 class="mb-5 text-lg font-medium text-gray-900 dark:text-white">How much do you expect to use
                            each month?</h3>
                        <ul class="grid w-full gap-6 md:grid-cols-4">
                            @foreach ($payment_gateways as $item)
                                <li class="box px-4 py-4 mb-3 flex items-center zoom-in">
                                    <input type="radio" id="payment_gateway_{{ $item->id }}"
                                        name="payment_gateway_id" value="{{ $item->id }}" class="hidden peer"
                                        required />
                                    <label for="payment_gateway_{{ $item->id }}"
                                        class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                        <div
                                            class="block w-40 h-20 sm:w-44 sm:h-24 flex-none lg:w-42 lg:h-32 image-fit relative">
                                            <img alt="{{ $item->name }}" src="{{ $item->image }}">
                                        </div>
                                        <svg class="w-5 h-5 ms-3 rtl:rotate-180" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                        </svg>
                                    </label>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="intro-y col-span-12 flex items-center justify-center sm:justify-end mt-5">
                    <button type="submit"
                        class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Submit</button>

                    {{-- <button type="submit"
                        class="button w-24 justify-center block bg-theme-1 text-white ml-2">Submit</button> --}}
                </div>
                <!-- END: Wizard Layout -->
            </form>

        </div>
        <!-- END: Content -->
    </div>
    <!-- END: Pricing Content -->
@endsection


@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/crypto-js.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/hmac-sha256.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/enc-base64.min.js"></script>

    <script>
        $('#amount-500').click(function(e) {
            // e.preventDefault();
            const value = $(this).val();
            $('#payment_amount').val(value);
        });

        $('#amount-1000').click(function(e) {
            // e.preventDefault();
            const value = $(this).val();
            $('#payment_amount').val(value);
        });

        $('#amount-2000').click(function(e) {
            // e.preventDefault();
            const value = $(this).val();
            $('#payment_amount').val(value);
        });

        $('#amount-5000').click(function(e) {
            // e.preventDefault();
            const value = $(this).val();
            $('#payment_amount').val(value);
        });


        function processPaymentForm() {
            const paymentGatewayId = parseInt($("input[name='payment_gateway_id']:checked").val());
            const amount = parseInt($('#payment_amount').val());
            const paymentConfigs = fetchPaymentConfig(paymentGatewayId, amount);
            const params = paymentConfigs.data.params;
            const formSubmitUrl = paymentConfigs.data.url;
            // const headers = paymentConfigs.data && paymentConfigs.data.headers ? paymentConfigs.data.headers : false;
            // debugger;
            // console.log("########################################################");
            // console.log(new Date() + " =>  PAYMENT GATEWAY ID => " + paymentGatewayId);
            // console.log("########################################################");
            // console.log(new Date() + " =>  PAYMENT AMOUNT => " + amount);
            // console.log("########################################################");
            // console.log(new Date() + " =>  PAYMENT FORM SUBMIT URL => " + formSubmitUrl);
            // console.log("########################################################");
            // console.log(new Date() + " =>  PAYMENT FORM CONFIGS => ", paymentConfigs);
            // console.log("########################################################");
            // console.log(new Date() + " =>  PAYMENT FORM PARAMS => ", params);
            // console.log("########################################################");

            createAndSubmitForm(formSubmitUrl, params);
        }

        function createAndSubmitForm(formSubmitUrl, params) {
            const form = document.createElement("form");
            form.setAttribute("method", "POST");
            form.setAttribute("action", formSubmitUrl);
            // debugger;
            for (const key in params) {
                const hiddenField = document.createElement("input");
                hiddenField.setAttribute("type", "hidden");
                hiddenField.setAttribute("name", key);
                hiddenField.setAttribute("value", params[key]);
                form.appendChild(hiddenField);
            }
            document.body.appendChild(form);
            form.submit();
            // const ajaxOptions = {
            //     url: formSubmitUrl,
            //     type: 'POST',
            //     data: params,
            //     success: function(response) {
            //         console.log('Form submitted successfully:', response);
            //     },
            //     error: function(xhr, status, error) {
            //         console.error('Error submitting form:', status, error);
            //     }
            // };

            // if (headers) {
            //     ajaxOptions.headers = headers;
            // }

            // $.ajax(ajaxOptions);
        }

        function fetchPaymentConfig(id, amount) {
            const memberId = "{{ $memberId }}";
            // debugger;
            const url = `/payment-gateway/get-payment-gateway-config/${id}/${memberId}?amount=${amount}`;
            let response = null;
            $.ajax({
                url: url,
                type: 'GET',
                async: false,
                success: function(data, status) {
                    debugger;
                    // // // console.log(new Date() + " => Payment Configs Data Config => ", data.config);
                    // // // console.log(new Date() + " => Payment Configs Data Url => ", data.url);
                    console.log(new Date() + " => Payment Configs Data => ", data);
                    // console.log(new Date() + " => Payment Configs Status => ", status);
                    debugger;
                    if ('payment-method' in data) {
                        // Redirect to a new URL
                        window.location.href = data.url;
                    } else {
                        response = data;
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching payment config:', error);
                }
            });
            console.log("Resposne after get => " + response);
            return response;
        }

        $('#membership_payment_form').submit(function(e) {
            e.preventDefault();
            processPaymentForm();
        });
    </script>
@endsection
