@extends('layouts.app')

@push('scripts')
    <script>
        const activeTab = (id) => {
            let tabContainer = document.getElementById('tabContainer').querySelectorAll('tabContent');
            let tabLinks = document.getElementById('tabLinks').querySelectorAll('li');
            tabContainer.forEach(element => {
                element.classList.add('hidden');
            });
            tabLinks.forEach(element => {
                element.classList.remove('text-violet-600');
                element.classList.remove('underline');
            });
            document.getElementById(id).classList.remove('hidden');
            document.getElementById(`nav-${id}`).classList.add('text-violet-600');
            document.getElementById(`nav-${id}`).classList.add('underline');
            const url = new Url(window.location);
            url.searchParams.set('tab', id);
            window.history.pushState({}, '', url);
        }

        @if (request()->tab)
            activeTab("{{ request()->tab }}")
        @endif
    </script>
@endpush


@section('body_content')
    <div class="px-6 md:min-h-screen md:px-20 mt-6 grid grid-cols-1 md:grid-cols-6 gap-4">
        <div>
            <ul class="flex md:flex-col flex-wrap justify-between gap-3 md:gap-1" id="tabLinks">
                <li id="nav-profile" onclick="activeTab('profile')" class="cursor-pointer text-violet-600 underline">My Profile
                </li>
                <li id="nav-orders" onclick="activeTab('orders')" class="cursor-pointer">My Orders</li>
                <li id="nav-address" onclick="activeTab('address')" class="cursor-pointer">My Address</li>
                {{-- <li>Account Settings</li> --}}
            </ul>
        </div>

        {{-- Right Side --}}
        <div class="md:col-span-5">
            <div id="tabContainer" class="grid grid-cols-1 gap-6">

                {{-- My Profile --}}
                <section id="profile" class="tabContent border border-slate-300 rounded px-4 pt-2 pb-4">
                    <h3 class="text-gray-900">Personal Information</h3>
                    <hr class="mb-4">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                        <div class="mt-4 relative border border-slate-300 rounded">
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

                        <div></div>
                        <div>
                            <button
                                class="bg-violet-600 rounded shadow py-1 text-center w-full text-white uppercase font-medium">Update</button>
                        </div>
                    </div>
                </section>
                {{-- My Profile End --}}

                {{-- My Orders --}}
                <section id="orders" class="tabContent hidden border border-slate-300 rounded px-4 pt-2 pb-4">
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
                                <button
                                    class="border border-slate-400 rounded-sm text-black font-medium uppercase px-4">View
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
                                <button
                                    class="border border-slate-400 rounded-sm text-black font-medium uppercase px-4">View
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
                                <button
                                    class="border border-slate-400 rounded-sm text-black font-medium uppercase px-4">Track
                                    Order</button>
                                <button>View Order</button>
                            </div>
                        </div>


                    </div>
                </section>
                {{-- My Orders End --}}

                {{-- My Delivery Address --}}
                <section id="address" class="tabContent hidden border border-slate-300 rounded px-4 pt-2 pb-4">
                    <h3 class="text-gray-900">My Delivery Address</h3>
                    <hr>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-3">

                        @foreach (range(1, 3) as $item)
                            <div class="flex flex-col gap-1 p-2 rounded shadow bg-gray-100">

                                <div class="flex justify-between items-center">
                                    <p class="text-gray-800 font-medium">Yevhen Derkach <small>(Home Address)</small></p>
                                    <span class="text-gray-400 hover:text-violet-600 duration-300 cursor-pointer"><i
                                            class='bx bx-pencil'></i>Edit</span>
                                </div>
                                <p class="text-gray-400 leading-5">Irpin Novooskolska 6B, post code 08200 </p>
                                <p class="text-gray-600">Mobile No: +380958678941</p>
                            </div>
                        @endforeach

                        <div
                            class="flex flex-col items-center py-6 justify-center text-gray-400 gap-1 p-2 rounded shadow bg-gray-100">
                            <i class='bx bxs-plus-circle text-2xl'></i>
                            <p>Add New Address</p>
                        </div>

                    </div>

                </section>
                {{-- My Delivery Address End --}}
            </div>
        </div>
        {{-- Right Side End --}}
    </div>
@endsection
