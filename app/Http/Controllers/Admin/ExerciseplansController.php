<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreExerciseplansRequest;
use App\Http\Requests\UpdateExerciseplansRequest;
use App\Http\Resources\ExerciseplansResource;
use App\Models\Exerciseplans;
use Illuminate\Http\JsonResponse;

class ExerciseplansController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $exercise = Exerciseplans::all();
        return ExerciseplansResource::collection($exercise);
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
    public function store(StoreExerciseplansRequest $request)
    {
        $created = Exerciseplans::query()->create($request->only([
            'title','description','duration','level',
        ]));
        return new ExerciseplansResource($created);
    }

    /**
     * Display the specified resource.
     */
    public function show(Exerciseplans $exercise)
    {
        return new ExerciseplansResource($exercise);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Exerciseplans $exercise)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateExerciseplansRequest $request, Exerciseplans $exercise)
    {
        $updated = $exercise->update($request->only([
            'title','description','duration','level',
        ]));
        if (!$updated){
            return new JsonResponse([
                'errors' => 'failed to update the exercise',
            ],400);
        }
        return new ExerciseplansResource($exercise);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Exerciseplans $exercise)
    {
        $deleted = $exercise->forceDelete();

        if(!$deleted){
            return new JsonResponse([
                'errors' => 'failed to delete the exercise'
            ],400);
        }
        return new JsonResponse([
            'messages' => 'The exercise is deleted successfully'
        ]);
    }
}
