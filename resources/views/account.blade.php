@extends('layouts.app')

@section('body_content')
    <div class="px-6 md:px-20 mt-6 grid grid-cols-1 md:grid-cols-6 gap-4">
        <div>
            <ul>
                <li><a href="#profile"></a>My Profile</li>
                <li><a href="#orders">My Orders</a></li>
                <li>My Address</li>
                <li>Account Settings</li>
            </ul>
        </div>

        {{-- Right Side --}}
        <div class="md:col-span-5 grid grid-cols-1 gap-6">

            {{-- My Profile --}}
            <section id="profile" class="border border-slate-300 rounded px-4 pt-2 pb-4">
                <h3 class="text-gray-900">Personal Information</h3>
                <hr class="mb-4">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                    <div class="relative border border-slate-300 rounded">
                        <label for="" class="absolute -top-3.5 left-3 bg-gray-50 px-1 text-gray-400">First
                            Name</label>
                        <input type="text" name="" value="Yevhen"
                            class="mt-2 px-3 bg-transparent focus:outline-none w-full">
                    </div>

                    <div class="mt-4 relative border border-slate-300 rounded">
                        <label for="" class="absolute -top-3.5 left-3 bg-gray-50 px-1 text-gray-400">Last
                            Name</label>
                        <input type="text" name="" value="Derkach"
                            class="mt-2 px-3 bg-transparent focus:outline-none w-full">
                    </div>

                    <div class="mt-4 relative border border-slate-300 rounded">
                        <label for="" class="absolute -top-3.5 left-3 bg-gray-50 px-1 text-gray-400">Mobile
                            Number</label>
                        <input type="text" name="" value="+380958678941"
                            class="mt-2 px-3 bg-transparent focus:outline-none w-full">
                    </div>

                    <div class="mt-4 relative border border-slate-300 rounded">
                        <label for="" class="absolute -top-3.5 left-3 bg-gray-50 px-1 text-gray-400">Email
                            Address</label>
                        <input type="text" name="" value="+380958678941"
                            class="mt-2 px-3 bg-transparent focus:outline-none w-full">
                    </div>

                    <div class="mt-4 relative border border-slate-300 rounded">
                        <label for="" class="absolute -top-3.5 left-3 bg-gray-50 px-1 text-gray-400">Mobile
                            Number</label>
                        <input type="text" name="" value="derkachyevhen@gmail.com"
                            class="mt-2 px-3 bg-transparent focus:outline-none w-full">
                    </div>

                    <div class="mt-4 relative border border-slate-300 rounded">
                        <label for="" class="absolute -top-3.5 left-3 bg-gray-50 px-1 text-gray-400">Mobile
                            Number</label>
                        <input type="text" name="" value="+380958678941"
                            class="mt-2 px-3 bg-transparent focus:outline-none w-full">
                    </div>
                    <div></div>
                    <div>
                        <button
                            class="bg-violet-600 rounded shadow py-1 text-center w-full text-white uppercase font-medium">Update</button>
                    </div>
                </div>
            </section>
            {{-- My Profile End --}}

            {{-- My Orders --}}
            <section id="orders" class="border border-slate-300 rounded px-4 pt-2 pb-4">
                <h3 class="text-gray-900">My Orders</h3>
                <hr class="mb-3">

                <div class="grid grid-cols-1 gap-6">

                    <div class="flex flex-col gap-3 md:flex-row justify-between items-center">
                        <div>
                            <div class="mb-1 flex flex-wrap gap-3">
                                @foreach (range(1, 4) as $item)
                                    <div class="bg-gray-100 rounded shadow p-2">
                                        <img class="w-20" src="{{ asset('images/product-1.png') }}" alt="">
                                    </div>
                                @endforeach
                            </div>
                            <div class="grid grid-cols-4 gap-3">
                                <div class="flex flex-col  text-gray-800 leading-5">
                                    <span class="font-medium">Order ID</span>
                                    <span>4646457</span>
                                </div>

                                <div class="flex flex-col  text-gray-800 leading-5">
                                    <span class="font-medium">Shipped Date</span>
                                    <span>17 March, 2023 </span>
                                </div>

                                <div class="flex flex-col  text-gray-800 leading-5">
                                    <span class="font-medium">Total</span>
                                    <span>$150</span>
                                </div>

                                <div class="flex flex-col  text-gray-800 leading-5">
                                    <span class="font-medium">Status</span>
                                    <span class="text-green-500">Delivered</span>
                                </div>
                            </div>
                        </div>
                        <div class="shrink-0 flex flex-col gap-1">
                            <button class="border border-slate-400 rounded-sm text-black font-medium uppercase px-4">View
                                Order</button>
                            
                        </div>
                    </div>

                    <div class="flex flex-col gap-3 md:flex-row justify-between items-center">
                        <div>
                            <div class="mb-1 flex flex-wrap gap-3">
                                @foreach (range(1, 4) as $item)
                                    <div class="bg-gray-100 rounded shadow p-2">
                                        <img class="w-20" src="{{ asset('images/product-1.png') }}" alt="">
                                    </div>
                                @endforeach
                            </div>
                            <div class="grid grid-cols-4 gap-3">
                                <div class="flex flex-col text-gray-800 leading-5">
                                    <span class="font-medium">Order ID</span>
                                    <span>4646457</span>
                                </div>

                                <div class="flex flex-col text-gray-800 leading-5">
                                    <span class="font-medium">Shipped Date</span>
                                    <span>17 March, 2023 </span>
                                </div>

                                <div class="flex flex-col text-gray-800 leading-5">
                                    <span class="font-medium">Total</span>
                                    <span>$150</span>
                                </div>

                                <div class="flex flex-col text-gray-800 leading-5">
                                    <span class="font-medium">Status</span>
                                    <span class="text-gray-400">Processing</span>

                                </div>
                            </div>
                        </div>
                        <div class="shrink-0 flex flex-col gap-1">
                            <button class="border border-slate-400 rounded-sm text-black font-medium uppercase px-4">View
                                Order</button>
                                <button class="text-red-500">Cancel Order</button>
                        </div>
                    </div>

                    <div class="flex flex-col gap-3 md:flex-row justify-between items-center">
                        <div>
                            <div class="mb-1 flex flex-wrap gap-3">
                                @foreach (range(1, 4) as $item)
                                    <div class="bg-gray-100 rounded shadow p-2">
                                        <img class="w-20" src="{{ asset('images/product-1.png') }}" alt="">
                                    </div>
                                @endforeach
                            </div>
                            <div class="grid grid-cols-4 gap-3">
                                <div class="flex flex-col text-gray-800 leading-5">
                                    <span class="font-medium">Order ID</span>
                                    <span>4646457</span>
                                </div>

                                <div class="flex flex-col text-gray-800 leading-5">
                                    <span class="font-medium">Shipped Date</span>
                                    <span>17 March, 2023 </span>
                                </div>

                                <div class="flex flex-col text-gray-800 leading-5">
                                    <span class="font-medium">Total</span>
                                    <span>$150</span>
                                </div>

                                <div class="flex flex-col text-gray-800 leading-5">
                                    <span class="font-medium">Status</span>
                                    <span class="text-orange-500">Out for Delivery</span>
                                </div>
                            </div>
                        </div>
                        <div class="shrink-0 flex flex-col gap-1">
                            <button class="border border-slate-400 rounded-sm text-black font-medium uppercase px-4">Track
                                Order</button>
                            <button>View Order</button>
                        </div>
                    </div>

                    
                </div>
            </section>
            {{-- My Orders End --}}

        </div>
        {{-- Right Side End --}}
    </div>
@endsection
