@extends('layouts.app')

@push('scripts')
    <script>
        let currentImage = 0;
        const viewImage = (e, index) => {
            currentImage = index;
            document.getElementById('bigImage').src = e.querySelector('img').src;
        }
        const nextPrevious = (index) => {
            i = currentImage + index;
            let images = document.getElementById('images').querySelectorAll('img');
            if (i > images.length || i < 0) return;
            currentImage = i;
            let arr = [];
            images.forEach(element => arr.push(element.src));
            document.getElementById('bigImage').src = arr[currentImage];
        }
        const selectSize = (c) => {
            window.location.href = generateUrl({
                c
            });
        }
        const selectColor = (s) => {
            window.location.href = generateUrl({
                s
            });
        }
    </script>
@endpush

@section('body_content')
    <section class="px-6 md:px-20 mt-6">

        <div class="flex flex-wrap md:flex-nowrap gap-6">
            {{-- Left --}}
            <div class="shrink-0 w-full md:w-auto flex flex-col-reverse md:flex-row gap-4">
                <div id="images" class="flex md:flex-col gap-3 pb-1 md:pb-0 max-h-60 overflow-y-auto">
                    @foreach ($product->image as $image)
                        <div onclick="viewImage(this, {{ $image->id }})"
                            class="bg-white rounded-md shadow p-1 cursor-pointer">
                            <img class="w-14" src="{{ asset('storage/' . $image->path) }}"
                                alt="">
                        </div>
                    @endforeach
                </div>

                <div class="h-96 relative bg-white rounded-md shadow-md p-3">
                    <img id="bigImage" class="h-full aspect-[2/3]" src="{{ asset('storage/' . $product->image[0]->path) }}"
                        alt="">
                    <span onclick="nextPrevious(-1)"
                        class="absolute top-1/2 left-1 bg-white rounded-full w-5 h-5 shadow flex items-center justify-center">
                        <i
                            class='bx bx-chevron-left text-xl text-gray-400 hover:text-violet-600 duration-200 cursor-pointer '></i>
                    </span>
                    <span onclick="nextPrevious(1)"
                        class="absolute top-1/2 right-1 bg-white rounded-full w-5 h-5 shadow flex items-center justify-center">
                        <i
                            class='bx bx-chevron-right text-xl text-gray-400 hover:text-violet-600 duration-200 cursor-pointer '></i>
                    </span>
                </div>

            </div>
            {{-- Left end --}}
            {{-- Right --}}
            <div class="w-full flex flex-col gap-4">
                <div class="flex gap-3">
                    @php
                    $discount= (($product->variant[0]->mrp - $product->variant[0]->selling_price)/ $product->variant[0]->mrp)*100;   
                    @endphp
                    <span class="bg-red-500 text-white rounded px-2 text-xs">{{round($discount, 2)}}% off</span>
                    <span class="text-gray-400 text-sm"><i class='bx bx-star'></i>4.8</span>
                </div>
                {{-- Name, SKU, Brand --}}
                <h2 class="text-lg font-medium text-gray-800">{{$product->title}}</h2>
                <div class="text-sm text-gray-800">
                    <p><span class="text-gray-400">SKU: </span>{{$product->variant[0]->sku}}</p>
                    <p><span class="text-gray-400">Brand: </span>{{$product->brand->name}}</p>
                </div>
                {{-- Price --}}
                <div>
                    <span class="text-orange-500 font-bold text-xl">{{$product->variant[0]->selling_price}}</span>
                    <sub class="text-gray-400"><strike>{{$product->variant[0]->mrp}}</strike></sub>
                </div>
                {{-- Colors --}}
                <div>
                    <p class="text-gray-400">Colors:</p>
                    <div class="flex gap-1">
                        @foreach ($product->variant as $item)   
                        <span style="background-color:{{$item->color->code}}" class="w-5 h-5 rounded-full">&nbsp;</span>
                        @endforeach
                    </div>
                </div>
                {{-- Size --}}
                <div>
                    <p class="text-gray-400">Size:</p>
                    <div class="flex gap-1 text-gray-400 text-sm">
                        @foreach ($product->variant as $item)   
                        <span class="flex justify-center items-center w-5 h-5 rounded-full border border-gray-400">{{$item->size->code}}</span>
                        @endforeach
                    </div>
                    <a class="text-gray-400 text-xs" href="">Size Guide</a>
                </div>
                {{-- Quantity --}}
                {{--<div>
                    <p class="text-gray-400">Quantity</p>
                    <div class="flex items-center gap-2">
                        <input type="text" value="1" readonly
                            class="bg-slate-200 rounded border border-gray-300 focus:outline-none px-2 text-lg font-medium w-20">
                        <button class="rounded border border-gray-300 w-7 h-7"><i class='bx bx-minus text-xl'></i></button>
                        <button class="rounded border border-gray-300 w-7 h-7"><i class='bx bx-plus text-xl'></i></button>
                    </div>
                </div>--}}
                {{-- Wishlist, Add to Cart and Bay Now --}}

                <div class="flex items-center gap-4">
                    <span class="bg-white shadow-md rounded-full w-8 h-8 flex items-center justify-center"><i
                            class='bx bx-heart text-2xl text-gray-500'></i>
                    </span>
                    <button
                        class="border border-violet-600 rounded w-28 text-center drop-shadow font-medium text-violet-600 py=0.5">Add
                        To Cart</button>
                    <button
                        class="border border-violet-600 rounded w-28 text-center drop-shadow font-medium text-white bg-violet-600 py=0.5">Buy
                        Now</button>
                </div>

            </div>
            {{-- Right end --}}
        </div>
        {{-- Product Description --}}
        <div>
            <h3 class="text-lg text-gray-400 font-medium my-6">Product Description</h3>
            <div class="text-gray-600">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis sit, voluptatum laboriosam nulla maiores,
                laborum aperiam corporis iure quibusdam saepe delectus architecto molestiae maxime minima sunt! Fugiat
                aliquid alias facilis nam iste voluptas architecto quis veniam nobis ea sit cum dolorem provident obcaecati,
                sapiente error ab laudantium doloribus nesciunt ducimus voluptatibus dolore perspiciatis. Quam, molestias
                illo! Quo nobis numquam officia eaque, neque cumque tempore facere nam itaque soluta nostrum magni fugiat
                fuga nisi natus corporis illum ut unde quaerat exercitationem quae cum quia. Accusamus accusantium et, ipsam
                voluptatibus quam a? Temporibus ex, vero accusamus odio aliquam blanditiis animi laborum sint.
            </div>
        </div>
        <section class=" mt-6">
            <h3 class="text-gray-800 font-medium mb-2">Featured Products</h3>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">            
                @foreach ($products as $item)
                @if ($item->variant->isNotEmpty())
                    <x-product.card1 :product="$item" />
                @endif
            @endforeach
            </div>
        </section>
    </section>
@endsection
