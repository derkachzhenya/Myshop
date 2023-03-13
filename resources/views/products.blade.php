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

        <section class="mt-6 grid grid-cols-1 md:grid-cols-4 gap-6">

            {{-- Filters --}}
            <div class="p-3 rounded border border-slate-300">
                <h3 class="text-xl font-bold text-violet-600 uppercase">Filter</h3>
                <div>
                    <h4 class="text-gray-800 font-medium mb-2">Price</h4>
                    <div>
                        <div class="flex justify-between items-center gap-3 text-sm">
                            <span class="text-gray-400">From</span>
                            <span class="text-gray-800">500</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Products --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach (range(1, 12) as $item)
                    <x-product.card1 />
                @endforeach
            </div>
        </section>
    </section>
@endsection
