@extends('dpanel.layouts.app')

@section('title', 'Create New Products')

@push('scripts')
    <script>
        const addVariant = (e) => {
            let colorOptions = ' <option value="">select</option>';
            let sizeOptions = ' <option value="">select</option>';
            let html = `<div class="flex justify-between gap-3 mb-2 border-b border-gray-400 pb-2">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-3">

                    <div>
                        <label>Color</label>
                        <select name="color_id" class="w-full  border border-gray-700 rounded py-0.5 focus:outline-none">
                            <option value="">select</option>
                            @foreach ($colors as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label>Size</label>
                        <select name="size_id" class="w-full  border border-gray-700 rounded py-0.5 focus:outline-none">
                            <option value="">select</option>
                            @foreach ($sizes as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label>MRP / Unit</label>
                        <input type="number" name="mrp" placeholder="Enter MRP"
                            class="w-full  border border-gray-700 rounded py-0.5 px-2 focus:outline-none">
                    </div>

                    <div>
                        <label>Selling Prime / Unit</label>
                        <input type="number" name="selling_price" placeholder="Enter Selling Price"
                            class="w-full  border border-gray-700 rounded py-0.5 px-2 focus:outline-none">
                    </div>

                    <div>
                        <label>Stock</label>
                        <input type="number" name="stock" placeholder="Enter Available Stock"
                            class="w-full  border border-gray-700 rounded py-0.5 px-2 focus:outline-none">
                    </div>

                </div>
                <div class="flex items-end">
                    <button type="button" class="bg-indigo-500 text-center w-16 py-1 rounded">Add</button>
                </div>

            </div>`;

        }
    </script>
@endpush

@section('body_content')

    <div class="bg-gray-800 flex justify-between items-center rounded-l pl-2 mb-3">
        <p class="text-white font-medium text-lg py-1">Create New Products</p>
    </div>

    @if ($errors->any())
        <div class="bg-red-100 text-red-500 px-2 py-1 rounded border border-red-500 mb-3">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('dpanel.product.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <section class="px-3 pb-3 rounded">
            <h2 class="mb-1 pt-2 text-lg font-medium">Product Base</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-y-2 gap-x-4">
                <div>
                    <label>Product Category</label>
                    <select name="category_id" class="w-full  border border-gray-700 rounded py-0.5 focus:outline-none">
                        <option value="">select</option>
                        @foreach ($categories as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>

                </div>

                <div>
                    <label>Product Brand</label>
                    <select name="brand_id" class="w-full  border border-gray-700 rounded py-0.5 focus:outline-none">
                        <option value="">select</option>
                        @foreach ($brands as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label>Product Name / Title</label>
                    <input type="text" name="title" placeholder="Enter Product Name/Title"
                        class="w-full  border border-gray-700 rounded py-0.5 px-2 focus:outline-none">
                </div>

                <div class="md:col-span-3">
                    <label>Product Description</label>
                    <textarea name="description" rows="3" placeholder="Enter Product Description"
                        class="w-full  border border-gray-700 rounded py-0.5 px-2 focus:outline-none"></textarea>
                </div>
            </div>
        </section>

        <section id="product_variants" class="bg-slate-600 px-3 pb-3 rounded mb-3">
            <h2 class="mb-1 pt-2 text-lg font-medium">Product Variant Detail</h2>


        </section>

        <button>Submit</button>

    </form>

@endsection
