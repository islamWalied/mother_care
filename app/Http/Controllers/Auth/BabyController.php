<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorebabyRequest;
use App\Http\Requests\UpdatebabyRequest;
use App\Http\Resources\BabyResource;
use App\Models\baby;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BabyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//        $baby = baby::all();
//        return BabyResource::collection($baby);

//        $baby = baby::find(1);
//        return $baby->user;
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
    public function store(Request $request)
    {
//        $dateTime = Carbon::parse($request->date_of_birth);
//        $mom_id = Auth::user()->id;
//
//        /*$request['date_of_birth'] = $dateTime->format('Y-m-d H:i:s');*/
//
//        $created = baby::query()->create([
//            'name' => $request->name,
//            'gender' => $request->gender,
//            'date_of_birth' => $request->date_of_birth,
//            'mom_id' => $mom_id,
//        ]);
//        return new BabyResource($created);

    }

    /**
     * Display the specified resource.
     */
    public function show(baby $baby)
    {
        return new BabyResource($baby);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(baby $baby)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatebabyRequest $request, baby $baby)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(baby $baby)
    {
        $deleted = $baby->forceDelete();
        if (!$deleted){
            return new JsonResponse([
               'errors' => 'failed to delete the baby'
            ]);
        }
        return new JsonResponse([
            'messages' => 'the baby is deleted successfully'
        ]);
    }
}
