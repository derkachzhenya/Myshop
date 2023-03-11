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

    <section class="px-8 md:px-20 mt-6">
        <h3 class="text-gray-800 font-medium mb-2">Flesh sale</h3>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            @foreach (range(1, 4) as $item)
                <x-product.card1 />
            @endforeach
        </div>
    </section>

    <section class="px-8 md:px-20 mt-10 mb-6">
        <div class="flex flex-wrap gap-6">
            @foreach (range(1, 7) as $item)
                <div class="bg-white rounded-md shadow flex justify-between items-center gap-3">
                    <div class="flex flex-col pl-3 py-1">
                        <span class="text-gray-400">First Order</span>
                        <strong class="text-orange-500">#FKFirst</strong>
                    </div>
                    <div class="bg-violet-600 w-12 font-medium text-white p-3 rounded-r-md">
                        20% off
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <section class="px-8 md:px-20 mt-8">
        <div class="flex items-center justify-between">
            <div class="flex gap-2">
                <h3 class="text-gray-800 font-medium underline mb-2">Best seller</h3>
                <h3 class="text-gray-800 font-medium mb-2">New Product</h3>
            </div>
            <h3 class="text-violet-600 font-medium mb-2">All Product</h3>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            @foreach (range(1, 12) as $item)
                <x-product.card1 />
            @endforeach
        </div>
    </section>
@endsection
