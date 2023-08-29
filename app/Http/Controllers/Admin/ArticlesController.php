<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreArticlesRequest;
use App\Http\Requests\UpdateArticlesRequest;
use App\Http\Resources\ArticlesResource;
use App\Models\Articles;
use App\Models\Categories;
use Illuminate\Http\JsonResponse;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Articles::all();
        return ArticlesResource::collection($articles);
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
    public function store(StoreArticlesRequest $request)
    {
//        $image = $request->file('image')->store('articles');

        $created = Articles::query()->create($request->only([
            'title','content','publication_date','status','image','category_id'
        ]));
        return new ArticlesResource($created);
    }

    /**
     * Display the specified resource.
     */
    public function show(Articles $articles)
    {
        return new ArticlesResource($articles);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Articles $articles)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticlesRequest $request, Articles $articles)
    {
//        $image = $request->file('image')->store('articles');

        $updated = $articles->update($request->only([

            'title','content','publication_date','status','image'
        ]));
        if (!$updated){
            return new JsonResponse([
                'errors' => 'failed to update the article',
            ],400);
        }
        return new ArticlesResource($articles);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Articles $articles)
    {
        $deleted = $articles->forceDelete();

        if(!$deleted){
            return new JsonResponse([
                'errors' => 'failed to delete the article'
            ],400);
        }
        return new JsonResponse([
            'messages' => 'The article is deleted successfully'
        ]);
    }
}
