<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.css') }}">
    <!-- Styles -->

</head>

<body class="bg-[#FBFBFB]">
    <div class="flex justify-between items-center px-6 md:px-20 mt-4 bg-white shadow py-2">
        <img class="w-12 h-12" src="{{ asset('images/logo.png') }}" alt="">

        <div class="text-2xl relative">
            <i class='bx bx-heart'></i>
            <i class='bx bx-user'></i>
            <i class='bx bx-cart'></i>
            <span
                class=" absolute top-0 -right-2.5 bg-indigo-600 rounded-full w-4 h-4 text-xs text-white text-center">25</span>
        </div>
    </div>
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

    <footer class="px-8 md:px-20 mt-8 bg-white">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
            <div>
                <img class="w-12 h-12" src="{{ asset('images/logo.png') }}" alt="">
                <ul class="mt-3 text-gray-400">
                    <li><i class='bx bx-map'></i>Irpin Novooskolska str.</li>
                    <li><i class='bx bxs-phone'></i>+380958678941</li>
                    <li><i class='bx bx-envelope'></i>derkachyevhen@gmail.com</li>
                </ul>
            </div>

            <div>
                <h2 class="text-lg font-medium text-gray-800">Categories</h2>
                <ul class="mt-1 text-gray-800">
                    <li>Category1</li>
                    <li>Category2</li>
                    <li>Category3</li>
                    <li>Category4</li>
                    <li>Category5</li>
                </ul>
            </div>
            <div>
                <h2 class="text-lg font-medium text-gray-800">Further Info</h2>
                <ul class="mt-1 text-gray-800">
                    <li>Home</li>
                    <li>About Us</li>
                    <li>Contact Us</li>
                    <li>Privacy Policy</li>
                    <li>Terms of Use</li>
                </ul>
            </div>


        </div>

        <p class="text-gray-400 text-center my-3">Copyright &copy; {{ date('Y') }} MyShop | Designed by Yevhen
            Derkach</p>

    </footer>

    <script src="{{ asset('js/jquery-3.6.3.min.js') }}"></script>
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
</body>

</html>
