<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getAllProducts()
    {
        $products = Product::with('image')
            ->where('status_id', '!=', 2)
            ->get();
        return response()->json(['status' => 200, 'data' => ProductResource::collection($products)], 200);
    }
}
