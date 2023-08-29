<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoriesRequest;
use App\Http\Requests\UpdateCategoriesRequest;
use App\Http\Resources\CategoriesResource;
use App\Http\Resources\UserResource;
use App\Models\Categories;
use Illuminate\Http\JsonResponse;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Categories::all();
        return CategoriesResource::collection($categories);
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
    public function store(StoreCategoriesRequest $request)
    {
        $created = Categories::create([
            'name' => $request->name,
        ]);
        return new CategoriesResource($created);
    }

    /**
     * Display the specified resource.
     */
    public function show(Categories $categories)
    {
        return new CategoriesResource($categories);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categories $categories)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoriesRequest $request, Categories $categories)
    {
        $updated = $categories->update([
            'name' => $request->name ?? $categories->name,
        ]);
        if (!$updated){
            return new JsonResponse([
                'errors' => 'failed to update the category',
            ],400);
        }
        return new CategoriesResource($categories);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categories $categories)
    {
        $deleted = $categories->forceDelete();

        if(!$deleted){
            return new JsonResponse([
                'errors' => 'failed to delete the category'
            ],400);
        }
        return new JsonResponse([
            'messages' => 'The category is deleted successfully'
        ]);
    }
}
