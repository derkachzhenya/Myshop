@extends('layouts.app')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.css') }}">
@endpush
@push('scripts')
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $(".owl-carousel").owlCarousel({
                loop: true,
                margin: 10,
                nav: false,
                dots: false,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1,
                    },
                    600: {
                        items: 1,
                    },
                    1000: {
                        items: 1,
                    }
                }
            });
        });
    </script>
@endpush



@section('body_content')
    <div>
        <div class="owl-carousel h-min">
            <a href="#"><img src="{{ asset('images/banner.png') }} " alt=""></a>
            <a href="#"><img src="{{ asset('images/banner.png') }} " alt=""></a>
            <a href="#"><img src="{{ asset('images/banner.png') }} " alt=""></a>
            <a href="#"><img src="{{ asset('images/banner.png') }} " alt=""></a>
            <a href="#"><img src="{{ asset('images/banner.png') }} " alt=""></a>
        </div>
    </div>

    <section class="px-6 md:px-20 mt-6">

        <section class="mt-6 grid grid-cols-1 md:grid-cols-5 gap-6">

            {{-- Filters --}}
            <div class="p-3 rounded border border-slate-300">
                <h3 class="text-xl font-bold text-violet-600 uppercase">Filter</h3>
                {{-- Price --}}
                <div>
                    <h4 class="text-gray-800 font-medium mb-1">Price</h4>
                    <div class="flex justify-between items-center gap-4 text-xs">
                        <div class="bg-gray-300 rounded p-1 flex justify-between items-center gap-2 ">
                            <span class="text-gray-400">From</span>
                            <div class="flex">
                                <input type="text" class="w-7 bg-transparent focus:outline-none text-right"
                                    value="0">
                                <span class="text-gray-400">$</span>
                            </div>
                        </div>

                        <div class=" bg-gray-300 rounded p-1 flex justify-between items-center gap-3">
                            <span class="text-gray-400">Up to</span>
                            <div class="flex">
                                <input type="text" class="w-7 bg-transparent focus:outline-none text-right"
                                    value="0">
                                <span class="text-gray-400">$</span>
                            </div>
                        </div>

                    </div>
                </div>
                <hr class="mt-2">


                {{-- Size --}}
                <div>
                    <h4 class="text-gray-800 font-medium mb-1">Size</h4>
                    <ul class="text-gray-400 text-sm">
                        <li><input type="checkbox" name="" id="small"><label for="small">Small</label> </li>
                        <li><input type="checkbox" name="" id="medium"><label for="medium">Medium</label></li>
                        <li><input type="checkbox" name="" id="large"><label for="large">Large</label></li>
                    </ul>
                </div>
                <hr class="mt-2">


                {{-- Color --}}
                <div>
                    <h4 class="text-gray-800 font-medium mb-1">Color</h4>
                    <ul class="text-gray-400 text-sm flex flex-col gap-1">
                        <li class="flex gap-2"><input type="checkbox" name="" id="color">
                            <label for="color">  
                                <span style="background-color: #acacac" class="w-4 h-4 flex rounded-full">&nbsp;</span>
                            </label> 
                        </li>
                        <li class="flex gap-2"><input type="checkbox" name="" id="color2">
                            <label for="color2">  
                                <span style="background-color: #cc00ff" class="w-4 h-4 flex rounded-full">&nbsp;</span>
                            </label> 
                        </li>
                        <li class="flex gap-2"><input type="checkbox" name="" id="color3">
                            <label for="color3">  
                                <span style="background-color: #0048a7" class="w-4 h-4 flex rounded-full">&nbsp;</span>
                            </label> 
                        </li>
                    </ul>
                </div>
                <hr class="mt-2">
            </div>
            

            {{-- Products --}}
            <div class="col-span-4 grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach (range(1, 12) as $item)
                    <x-product.card1 />
                @endforeach
            </div>
        </section>
    </section>
@endsection
