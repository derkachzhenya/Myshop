<?php

namespace App\Http\Controllers\Dpanel;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Size;
use App\Models\Variant;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    public function index()
    {
        $data = Product::with('brand', 'category')->paginate(10);
        return view('dpanel.product.index', compact('data'));
    }


    public function create()
    {
        $brands = Brand::where('is_active', true)->get();
        $categories = Category::where('is_active', true)->get();
        $colors = Color::where('is_active', true)->get();
        $sizes = Size::where('is_active', true)->get();

        return view('dpanel.product.create', compact('brands', 'categories', 'colors', 'sizes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'brand_id' => 'required',
            'title' => 'required|max:255|unique:products',
            'description' => 'required',
            'color_id' => 'required|array|min:1',
            'size_id' => 'required|array|min:1',
            'mrp' => 'required|array|min:1',
            'selling_price' => 'required|array|min:1',
            'stock' => 'required|array|min:1',
            'images.*' => 'mimes:jpg,jpeg,png',

        ]);

        // Store Product
        $product = new Product;
        $product->brand_id = $request->brand_id;
        $product->category_id = $request->category_id;
        $product->title = $request->title;
        $product->slug = Str::slug($request->title);
        $product->description = $request->description;
        $product->save();

        // Store Variant
        $colors = $request->color_id;
        foreach ($colors as $key => $color_id) {
            $product_id = $product->id;
            $size_id = $request->size_id[$key];
            $sku = 'FKP' . $product_id . 'C' . $color_id . 'S' . $size_id;

            $variant = new Variant;
            $variant->sku = $sku;
            $variant->product_id = $product_id;
            $variant->color_id = $color_id;
            $variant->size_id = $size_id;
            $variant->mrp = $request->mrp[$key];
            $variant->selling_price = $request->selling_price[$key];
            $variant->stock = $request->stock[$key];
            $variant->save();
        }

        foreach ($request->images as $image) {
            $productImage = new ProductImage;
            $productImage->product_id = $product_id;
            $productImage->path = $image->store('media', 'public');
            $productImage->save();
        }

        return redirect()->route('dpanel.product.index')->withSuccess('Product Added Successfuly');
    }

    public function show(Product $product)
    {
        //
    }


    public function edit($id)
    {

        $data = Product::with('variant', 'image')->find($id);

        abort_if(!$data, 404);

        $brands = Brand::where('is_active', true)->get();
        $categories = Category::where('is_active', true)->get();
        $colors = Color::where('is_active', true)->get();
        $sizes = Size::where('is_active', true)->get();



        return view('dpanel.product.edit', compact('brands', 'categories', 'colors', 'sizes', 'data'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required',
            'brand_id' => 'required',
            'title' => 'required|max:255|unique:products, title' . $id,
            'description' => 'required',
            'color_id' => 'required|array|min:1',
            'size_id' => 'required|array|min:1',
            'mrp' => 'required|array|min:1',
            'selling_price' => 'required|array|min:1',
            'stock' => 'required|array|min:1',
            'images.*' => 'nullable|mimes:jpg,jpeg,png',

        ]);

        // Store Product
        $product = Product::find($id);
        $product->brand_id = $request->brand_id;
        $product->category_id = $request->category_id;
        $product->title = $request->title;
        $product->slug = Str::slug($request->title);
        $product->description = $request->description;
        $product->save();

        // Store Variant
        $colors = $request->color_id;
        foreach ($colors as $key => $color_id) {
            $product_id = $product->id;
            $size_id = $request->size_id[$key];
            $sku = 'FKP' . $product_id . 'C' . $color_id . 'S' . $size_id;

            if (isset($request->variant_ids[$key])) {
                $variant = Variant::find($request->variant_ids[$key]);
            } else {
                $variant = new Variant;
            }

            $variant->sku = $sku;
            $variant = new Variant;
            $variant->sku = $sku;
            $variant->product_id = $product_id;
            $variant->color_id = $color_id;
            $variant->size_id = $size_id;
            $variant->mrp = $request->mrp[$key];
            $variant->selling_price = $request->selling_price[$key];
            $variant->stock = $request->stock[$key];
            $variant->save();
        }

        if($request->images) {
        foreach ($request->images as $key => $image) {

            if (isset($request->image_ids[$key])) {
                $productImage = ProductImage::find($request->image_ids[$key]);
                Storage::disk('public')->delete($image->path);
                $productImage->path = $image->store('media', 'public');
                $productImage->save();
            }else{
                $productImage = new ProductImage;
                $productImage->product_id = $product_id;
                $productImage->path = $image->store('media', 'public');
                $productImage->save();
            }
        }
           
        }

        return redirect()->route('dpanel.product.index')->withSuccess('Product Updated Successfuly');
    }


    public function destroy(Product $product)
    {
        //
    }
}
