<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mother = User::all();
        return UserResource::collection($mother);
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
    public function store(StoreUserRequest $request)
    {
        $created = User::query()->create($request->only([
            'name','email','phone','password',"age"
        ]));
        return new UserResource($created);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $mother)
    {
        return new UserResource($mother);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $mother)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $mother)
    {
        $updated = $mother->update($request->only([
            'name','email','phone','password',"age"
        ]));
        if (!$updated){
            return new JsonResponse([
                'errors' => 'failed to update the user',
            ],400);
        }
        return new UserResource($mother);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $mother)
    {
        $deleted = $mother->forceDelete();

        if(!$deleted){
            return new JsonResponse([
                'errors' => 'failed to delete the user'
            ],400);
        }
        return new JsonResponse([
            'messages' => 'The user is deleted successfully'
        ]);
    }
}
