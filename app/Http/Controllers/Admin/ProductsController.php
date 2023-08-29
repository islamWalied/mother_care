<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductsRequest;
use App\Http\Requests\UpdateProductsRequest;
use App\Http\Resources\ProductsResource;
use App\Models\Products;
use Illuminate\Http\JsonResponse;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Products::all();
        return ProductsResource::collection($products);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductsRequest $request)
    {
        $created = Products::query()->create($request->only([
            'title','description','price','customer_reviews','image',
        ]));
        return new ProductsResource($created);
    }

    /**
     * Display the specified resource.
     */
    public function show(Products $products)
    {
        return new ProductsResource($products);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Products $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductsRequest $request, Products $products)
    {
        $updated = $products->update($request->only([
            'title','description','price','customer_reviews','image',
        ]));
        if (!$updated){
            return new JsonResponse([
                'errors' => 'failed to update the product',
            ],400);
        }
        return new ProductsResource($products);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Products $products)
    {
        $deleted = $products->forceDelete();

        if(!$deleted){
            return new JsonResponse([
                'errors' => 'failed to delete the product'
            ],400);
        }
        return new JsonResponse([
            'messages' => 'The product is deleted successfully'
        ]);
    }
}
