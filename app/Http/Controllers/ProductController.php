<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Product;

class ProductController extends Controller
{

    public function index()
    {
        // $products = Product::query();
        // if (request('search')) {
        //     //search
        //     return  $products->where('name', 'like', '%' . request('search') . '%')
        //         ->orderBy('id', 'desc')->paginate(5);
        // } else {
        //     return $products->orderBy('id', 'desc')->paginate(5);
        // }

        return Product::when(request('search'), function ($query) {
            $query->where('name', 'like', '%' . request('search') . '%');
        })->orderBy('id', 'desc')->paginate(5);
    }

    public function store(ProductStoreRequest $request)
    {
        $product = Product::create($request->only('name', 'price'));
        return $product;
    }

    public function show(Product $product)
    {
        return $product;
    }

    public function update(ProductUpdateRequest $request, Product $product)
    {
        $product->update($request->only('name', 'price'));
        return $product;
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return $product . " Successfully Deleted";
    }
}
