<div>
    <section class="flex items-center font-poppins">
        <div
            class="justify-center flex-1 max-w-6xl px-4 py-4 mx-auto sm:h-[70vh] lg:h-[80vh] bg-white border-black border-[0.1vw] rounded-md md:py-10 md:px-10">
            <div>
                <h1 class="px-4 mb-8 text-2xl font-semibold tracking-wide text-gray-700">
                    Thank you. Your order has been received. </h1>
                <div
                    class="flex border-b border-gray-600 items-stretch justify-start w-full h-full px-4 mb-8 md:flex-row xl:flex-col md:space-x-6 lg:space-x-8 xl:space-x-0">
                    <div class="flex items-start justify-start flex-shrink-0">
                        <div class="flex items-center justify-center w-full pb-6 space-x-4 md:justify-start">
                            <div class="flex flex-col items-start justify-start space-y-2">
                                <p class="text-lg font-semibold leading-4 text-left text-gray-800">
                                    {{ $order->user->name }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-wrap items-center pb-4 mb-10 border-b border-gray-600">
                    <div class="w-full px-4 mb-4 md:w-1/4">
                        <p class="mb-2 text-sm leading-5 text-gray-600">
                            Order Number: </p>
                        <p class="text-base font-semibold leading-4 text-gray-800">
                            {{ $order->id }}</p>
                    </div>
                    <div class="w-full px-4 mb-4 md:w-1/4">
                        <p class="mb-2 text-sm leading-5 text-gray-600">
                            Date: </p>
                        <p class="text-base font-semibold leading-4 text-gray-800">
                            {{ $order->created_at->format('d-m-Y') }}</p>
                    </div>
                    <div class="w-full px-4 mb-4 md:w-1/4">
                        <p class="mb-2 text-sm font-medium leading-5 text-gray-800 ">
                            Total: </p>
                        <p class="text-base font-semibold leading-4 text-[#6FE20D] brightness-[80%]">
                            {{ Number::currency($order->grand_total, 'IDR') }}</p>
                    </div>
                    <div class="w-full px-4 mb-4 md:w-1/4">
                        <p class="mb-2 text-sm leading-5 text-gray-600 ">
                            Payment Method: </p>
                        <p class="text-base font-semibold leading-4 text-gray-800">
                            @if ($order->payment_method == 'Cash')
                                Cash
                            @elseif ($order->payment_method == 'BCA Debit/Credit Card')
                                BCA Debit/Credit Card
                            @elseif ($order->payment_method == 'BRI Debit/Credit Card')
                                BRI Debit/Credit Card
                            @elseif ($order->payment_method == 'BNI Debit/Credit Card')
                                BNI Debit/Credit Card
                            @elseif ($order->payment_method == 'Mandiri Debit/Credit Card')
                                Mandiri Debit/Credit Card
                            @endif
                        </p>
                    </div>
                </div>
                <div class="px-4 mb-10">
                    <div
                        class="flex flex-col items-stretch justify-center w-full space-y-4 md:flex-row md:space-y-0 md:space-x-8">
                        <div class="flex flex-col w-full space-y-6 ">
                            <h2 class="mb-2 text-xl font-semibold text-gray-700">Order details</h2>
                            <div
                                class="flex flex-col items-center justify-center w-full pb-4 space-y-4 border-b border-gray-600">
                                <div class="flex justify-between w-full">
                                    <p class="text-base leading-4 text-gray-800">Subtotal</p>
                                    <p class="text-base leading-4 text-gray-600">
                                        {{ Number::currency($order->grand_total, 'IDR') }}</p>
                                </div>
                                <div class="flex items-center justify-between w-full">
                                    <p class="text-base leading-4 text-gray-800">Discount
                                    </p>
                                    <p class="text-base leading-4 text-gray-600">
                                        {{ Number::currency(0, 'IDR') }}</p>
                                </div>
                                <div class="flex items-center justify-between w-full">
                                    <p class="text-base leading-4 text-gray-800">Shipping</p>
                                    <p class="text-base leading-4 text-gray-600">
                                        {{ Number::currency(0, 'IDR') }}</p>
                                </div>
                            </div>
                            <div class="flex items-center justify-between w-full">
                                <p class="text-base font-semibold leading-4 text-gray-800">Total</p>
                                <p class="text-base font-semibold leading-4 text-gray-600">
                                    {{ Number::currency($order->grand_total, 'IDR') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex items-center justify-start gap-4 px-4 mt-6 ">
                    <a wire:navigate href="/menu"
                        class="w-full text-center px-4 py-2 text-[#1C4816] border border-[#1C4816] rounded-md md:w-auto hover:text-white hover:bg-[#1C4816]">
                        Go back shopping
                    </a>
                    <a wire:navigate href="/history"
                        class="w-full text-center px-4 py-2 bg-[#1C4816] rounded-md text-gray-50 md:w-auto hover:bg-[#1C4816] hover:brightness-[80%]">
                        View My Orders
                    </a>
                </div>
            </div>
        </div>
    </section>

</div>
