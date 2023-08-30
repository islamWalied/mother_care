<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVaccinationsRequest;
use App\Http\Requests\UpdateVaccinationsRequest;
use App\Http\Resources\VaccinationsResource;
use App\Models\Vaccinations;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class VaccinationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vaccination = Vaccinations::all();
        return VaccinationsResource::collection($vaccination);
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
    public function store(StoreVaccinationsRequest $request)
    {
        $created = Vaccinations::query()->create([
            'about_vacc' => $request->about_vacc,
            'date_of_vacc'=> $request->date_of_vacc,
        ]);
        return new VaccinationsResource($created);
    }

    /**
     * Display the specified resource.
     */
    public function show(Vaccinations $vaccinations)
    {
        return new VaccinationsResource($vaccinations);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vaccinations $vaccinations)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVaccinationsRequest $request, Vaccinations $vaccinations)
    {
        $updated = $vaccinations->update([
            'about_vacc' => $request->about_vacc ?? $vaccinations->about_vacc,
            'date_of_vacc'=> $request->date_of_vacc?? $vaccinations->date_of_vacc,
        ]);
        if (!$updated){
            return new JsonResponse([
                'errors' => 'failed to update the vaccination',
            ],400);
        }
        return new VaccinationsResource($vaccinations);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vaccinations $vaccinations)
    {
        $deleted = $vaccinations->forceDelete();

        if(!$deleted){
            return new JsonResponse([
                'errors' => 'failed to delete the vaccination'
            ],400);
        }
        return new JsonResponse([
            'messages' => 'The vaccination is deleted successfully'
        ]);
    }
}
