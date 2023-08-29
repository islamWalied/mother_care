<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTipsRequest;
use App\Http\Requests\UpdateTipsRequest;
use App\Http\Resources\TipsResource;
use App\Models\Articles;
use App\Models\Tips;
use Illuminate\Http\JsonResponse;

class TipsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tips = Tips::all();
        return TipsResource::collection($tips);
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
    public function store(StoreTipsRequest $request)
    {
        $created = Tips::query()->create($request->only([
            'article_id','content','creation_date'
        ]));
        return new TipsResource($created);
    }

    /**
     * Display the specified resource.
     */
    public function show(Tips $tips)
    {
        return new TipsResource($tips);
//        $articles = Articles::find(2);
//        return $articles->tips;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tips $tips)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTipsRequest $request, Tips $tips)
    {
        $updated = $tips->update($request->only([
            'article_id','content','creation_date'
        ]));
        if (!$updated){
            return new JsonResponse([
                'errors' => 'failed to update the tips',
            ],400);
        }
        return new TipsResource($tips);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tips $tips)
    {
        $deleted = $tips->forceDelete();

        if(!$deleted){
            return new JsonResponse([
                'errors' => 'failed to delete the tips'
            ],400);
        }
        return new JsonResponse([
            'messages' => 'The tips is deleted successfully'
        ]);
    }
}
