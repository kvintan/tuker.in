<div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto sm:h-[70vh]">
    <h1 class="text-4xl font-bold text-slate-500">Order Details</h1>

    <!-- Grid -->
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 mt-5">
        <!-- Card -->
        <div class="flex flex-col bg-white border shadow-sm rounded-xl">
            <div class="p-4 md:p-5 flex gap-x-4">
                <div class="flex-shrink-0 flex justify-center items-center w-12 h-12 bg-gray-100 rounded-lg">
                    <svg class="w-6 h-6 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                        <circle cx="9" cy="7" r="4" />
                        <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                        <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                    </svg>
                </div>

                <div class="grow">
                    <p class="text-xs uppercase tracking-wide text-gray-500">Customer</p>
                    <div class="mt-1 text-gray-800">
                        {{ $order->user->name }}
                    </div>
                </div>
            </div>
        </div>
        <!-- End Card -->

        <!-- Card -->
        <div class="flex flex-col bg-white border shadow-sm rounded-xl">
            <div class="p-4 md:p-5 flex gap-x-4">
                <div class="flex-shrink-0 flex justify-center items-center w-12 h-12 bg-gray-100 rounded-lg">
                    <svg class="w-6 h-6 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 22h14" />
                        <path d="M5 2h14" />
                        <path d="M17 22v-4.172a2 2 0 0 0-.586-1.414L12 12l-4.414 4.414A2 2 0 0 0 7 17.828V22" />
                        <path d="M7 2v4.172a2 2 0 0 0 .586 1.414L12 12l4.414-4.414A2 2 0 0 0 17 6.172V2" />
                    </svg>
                </div>

                <div class="grow">
                    <p class="text-xs uppercase tracking-wide text-gray-500">Order Date</p>
                    <h3 class="text-xl font-medium text-gray-800">
                        {{ $order->created_at->format('d-m-Y') }}
                    </h3>
                </div>
            </div>
        </div>
        <!-- End Card -->

        <!-- Card -->
        <div class="flex flex-col bg-white border shadow-sm rounded-xl">
            <div class="p-4 md:p-5 flex gap-x-4">
                <div class="flex-shrink-0 flex justify-center items-center w-12 h-12 bg-gray-100 rounded-lg">
                    <?xml version="1.0" encoding="iso-8859-1"?>
                    <!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
                    <svg height="800px" width="800px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 502.685 502.685" xml:space="preserve">
                        <g>
                            <g>
                                <path style="fill:#010002;" d="M482.797,276.924c4.53-5.824,6.73-13.331,4.724-20.988L428.05,30.521
   c-3.451-13.029-16.847-20.837-29.854-17.386L18.184,113.331C5.22,116.761-2.61,130.2,0.798,143.207L60.269,368.6
   c3.408,13.007,16.868,20.816,29.876,17.408l134.278-35.419v75.476c0,42.214,69.954,64.303,139.11,64.303
   c69.113,0,139.153-22.089,139.153-64.302V311.61C502.685,297.869,495.157,286.307,482.797,276.924z M439.763,199.226l6.212,23.469
   l-75.541,19.953l-6.169-23.512L439.763,199.226z M395.931,50.733l11.799,44.695l-118.014,31.148l-11.799-44.695L395.931,50.733z
   M342.975,224.744l6.04,22.951c-27.934,1.251-55.113,6.126-76.943,14.452l-4.616-17.429L342.975,224.744z M79.984,319.224
   l-6.169-23.426l75.519-19.975l6.212,23.555L79.984,319.224z M170.625,270.237l75.476-19.953l5.716,21.506
   c-1.834,1.122-3.559,2.286-5.242,3.473l-69.781,18.421L170.625,270.237z M477.491,424.209c0,24.612-50.993,44.544-113.958,44.544
   c-62.9,0-113.937-19.953-113.937-44.544v-27.718c0-0.928,0.539-1.769,0.69-2.653c3.602,23.34,52.654,41.847,113.247,41.847
   c60.614,0,109.687-18.508,113.268-41.847c0.151,0.884,0.69,1.726,0.69,2.653V424.209z M477.491,369.678
   c0,24.591-50.993,44.522-113.958,44.522c-62.9,0-113.937-19.931-113.937-44.522V341.96c0-0.906,0.539-1.769,0.69-2.653
   c3.602,23.318,52.654,41.869,113.247,41.869c60.614,0,109.687-18.551,113.268-41.869c0.151,0.884,0.69,1.747,0.69,2.653V369.678z
   M363.532,356.11c-62.9,0-113.937-19.931-113.937-44.501c0-24.569,51.036-44.5,113.937-44.5c62.965,0,113.958,19.931,113.958,44.5
   C477.491,336.179,426.497,356.11,363.532,356.11z" />
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                        </g>
                    </svg>
                </div>

                <div class="grow">
                    <p class="text-xs uppercase tracking-wide text-gray-500">Payment Method</p>
                    <h3 class="text-xl font-medium text-gray-800">
                        {{ $order->payment_method }}
                    </h3>
                </div>
            </div>
        </div>
        <!-- End Card -->

    </div>
    <!-- End Grid -->

    <div class="flex flex-col md:flex-row lg:gap-4 mt-4">
        <div class="relative w-[90vw] sm:w-[60vw]">
            <div class="bg-white overflow-x-auto rounded-lg shadow-md p-6 mb-4">
                <table class="w-full">
                    <thead>
                        <tr>
                            <th class="text-left font-semibold">Product</th>
                            <th class="text-left font-semibold">Price</th>
                            <th class="text-left font-semibold">Quantity</th>
                            <th class="text-left font-semibold">Total</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($order_items as $item)
                            <tr wire:key="{{ $item->id }}">
                                <td class="py-4">
                                    <div class="flex items-center">
                                        <img class="h-16 w-16 mr-4"
                                            src="{{ asset('storage/' . $item->product->images[0]) }}"
                                            alt="{{ $item->product->name }}">
                                        <span
                                            class="text-[2vw] sm:ml-[0vw] ml-[-4vw] font-semibold sm:text-[1.2vw]">{{ $item->product->name }}</span>
                                    </div>
                                </td>
                                <td class="text-[3vw] py-4 sm:text-[1.2vw]">
                                    {{ Number::currency($item->unit_amount, 'IDR') }}</td>
                                <td class="py-4">
                                    <span
                                        class="text-[3vw] sm:ml-[3.5vw] sm:text-[1.2vw] ml-[7vw] text-center w-8">{{ $item->quantity }}</span>
                                </td>
                                <td class="py-4 text-[3vw] sm:text-[1.2vw]">
                                    {{ Number::currency($item->unit_amount, 'IDR') }}</td>
                            </tr>
                        @endforeach

                        <!--[if ENDBLOCK]><![endif]-->

                    </tbody>
                </table>
            </div>

        </div>
        <div class="relative w-[70vw] sm:w-[40vw] lg:mt-[0vh] sm:mt-[3vh]">
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-lg font-semibold mb-4">Summary</h2>
                <div class="flex justify-between mb-2">
                    <span>Subtotal</span>
                    <span>{{ Number::currency($item->order->grand_total, 'IDR') }}</span>
                </div>
                <div class="flex justify-between mb-2">
                    <span>Taxes</span>
                    <span>{{ Number::currency(0, 'IDR') }}</span>
                </div>
                <div class="flex justify-between mb-2">
                    <span>Shipping</span>
                    <span>{{ Number::currency(0, 'IDR') }}</span>
                </div>
                <hr class="my-2">
                <div class="flex justify-between mb-2">
                    <span class="font-semibold">Grand Total</span>
                    <span>{{ Number::currency($item->order->grand_total, 'IDR') }}</span>
                </div>

            </div>
        </div>
    </div>
</div>
