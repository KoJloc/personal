<?php

namespace App\Http\Controllers\API\Companies;

use App\Http\Controllers\Controller;
use App\Http\Resources\Product\ProductResource;
use App\Models\Product;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class IndexController extends Controller
{
    public function filterList(Product $product)
    {
        $categories = Category::all();
        $tags = Tag::all();

        $result = [
            'categories' => $categories,
            'tags' => $tags
        ];

        return response()->json($result);
    }

    public function get()
    {
        $products = Product::all();
        return ProductResource::collection($products);
    }

    public function show(Product $product)
    {
        return new ProductResource($product);
    }

}
