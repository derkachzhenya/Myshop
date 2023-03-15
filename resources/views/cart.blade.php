@extends('layouts.app')

@push('scripts')
    <script></script>
@endpush

@section('body_content')
    <section class="px-6 md:px-20 mt-6 min-h-screen">
        <h1 class="text-5xl font-bold text-center drop-shadow-md text-black py-12">Shopping Cart</h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            {{-- Left Side --}}
            <div class="md:col-span-2 ">
                {{-- Delivery Addresses --}}
                <h3 class="text-gray-700 text-lg font-medium">Delivery Address</h3>
                <div class="flex gap-4">
                    <div class="flex gap-4 overflow-x-auto pt-3 scrollbar-thin scrollbar-thumb-gray-400 scrollbar-h-1">
                        @foreach (range(1, 4) as $item)
                            <label for="address_{{ $loop->index }}" class="shrink-0 w-72 relative">
                                <input type="radio" name="address" id="address_{{ $loop->index }}" class="hidden peer">
                                <div
                                    class="p-2 border border-slate-300 peer-checked:border-violet-600 rounded:md cursor-pointer">
                                    <div class="flex justify-between items-center">
                                        <span class="text-black font-bold ">Jon Karter</span>
                                        <span class="text-gray-400 cursor-pointer"><i class='bx bxs-pencil'></i>Edit</span>
                                    </div>
                                    <p class="text-gray-400 text-sm leading-4">Irpin, Novooskolska 6b -08200</p>
                                    <p class="text-gray-600 text-sm">Mobile No: +380959678941</p>
                                </div>
                                <i
                                    class='hidden peer-checked:block absolute -top-3 -right-2 bx bxs-check-circle text-xl text-violet-600 bg-white'></i>
                            </label>
                        @endforeach
                    </div>
                    <div 
                    class="bg-slate-300 text-gray-400 cursor-pointer px-2 md:px-4 rounded-md shrink-0 flex flex-col items-center justify-center">
                        <i class='bx bxs-plus-circle text-lg'></i>
                        <span class="text-sm ">Add address</span>

                    </div>
                </div>
                {{-- Delivery Addresses End --}}
            </div>
            {{-- Left Side End --}}

            {{-- Right Side --}}
            <div>
                <h1>Righ Side</h1>
            </div>
            {{-- Right Side End --}}


        </div>
    </section>
@endsection
