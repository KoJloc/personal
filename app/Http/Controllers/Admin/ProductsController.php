<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Products\StoreRequest;
use App\Http\Requests\Products\UpdateRequest;
use App\Models\Product;
use App\Models\Category;
use App\Models\Color;
use App\Models\Tag;
use App\Models\ColorProduct;
use App\Models\ProductTag;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        $categories = Category::all();
        $products = Product::all();
        $productsTags = ProductTag::all();
        $productsImages = ProductImage::all();
        return view('product.index', compact('products', 'tags', 'categories', 'productsTags', 'productsImages'));
    }

    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('product.create', compact('tags', 'categories'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $productImages = $data['product_images'];

        $tagsIDs = $data['tags'];
        unset($data['tags'], $data['colors'], $data['product_images']);

        $product = Product::firstOrCreate([
            'title' => $data['title']
        ], $data);

        foreach ($tagsIDs as $tagId) {
            ProductTag::firstOrCreate([
                'product_id' => $product->id,
                'tag_id' => $tagId
            ]);
        }

        foreach ($productImages as $productImage) {
            $currentImages = ProductImage::where('product_id', $product->id)->get();
            if (count($currentImages) > 5) continue;

            $filePath = Storage::disk('public')->put('/images', $productImage);
            ProductImage::create([
                'product_id' => $product->id,
                'file_path' => $filePath,
            ]);
        }

        return redirect()->route('product.index');
    }

    public function show(Product $product)
    {
        $tags = Tag::all();
        $categories = Category::all();
        $productsTags = ProductTag::all();
        $productsImages = ProductImage::all();
        return view('product.show', compact('product', 'tags', 'categories', 'productsTags', 'productsImages'));
    }

    public function edit(Product $product)
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('product.edit', compact('product', 'tags', 'categories'));
    }

    public function update(UpdateRequest $request, Product $product, ProductTag $productTag, ProductImage $productImg)
    {
        $data = $request->validated();
        $tags = Tag::all();
        $categories = Category::all();
        $productsTags = ProductTag::all();
        $productsImages = ProductImage::all();
        $productImages = $data['product_images'];
        $tagsIDs = $data['tags'];
        unset($data['tags'], $data['product_images']);

        $product->update([
            'title' => $data['title'],
            'description' => $data['description'],
            'content' => $data['content'],
            'category_id' => $data['categories_id'],
        ], $data);

        $productTag->where('product_id' , $product->id)->delete();
        foreach ($tagsIDs as $tagId) {
            $productTag->create([
                'product_id' => $product->id,
                'tag_id' => $tagId,
            ]);
        }

        $productImg->where('product_id' , $product->id)->delete();

        foreach ($productImages as $productImage) {
            $currentImagesCounter = ProductImage::where('product_id', $product->id)->count();
            if ($currentImagesCounter > 5) continue;

            $filePath = Storage::disk('public')->put('/images', $productImage);
            ProductImage::create([
                'product_id' => $product->id,
                'file_path' => $filePath,
            ]);
        }
        return redirect()->route('product.show', compact('product', 'tags', 'categories', 'productsTags', 'productsImages'));
    }

    public function delete(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index');
    }
}
