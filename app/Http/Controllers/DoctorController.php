<?php

namespace App\Http\Controllers;

use App\Http\Resources\DoctorResource;
use App\Models\Doctor;
use App\Http\Requests\StoreDoctorRequest;
use App\Http\Requests\UpdateDoctorRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctor = Doctor::all();
        return DoctorResource::collection($doctor);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDoctorRequest $request)
    {
        $image = $request->file('image')->store('doctors','public');

        $created = Doctor::create([
            'name' => $request->name,
            'image' => $image,
            'speciality' => $request->speciality,
            'rating' => $request->rating,
        ]);
        return new DoctorResource($created);
    }

    /**
     * Display the specified resource.
     */
    public function show(Doctor $doctor)
    {
        return new DoctorResource($doctor);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDoctorRequest $request, Doctor $doctor)
    {
        $image = $doctor->image;
        if ($request->hasFile('image')){
            Storage::delete($doctor->image);
            $image = $request->file('image')->store('doctors','public');
        }

        $updated = $doctor->update([
            'name' => $request->name ?? $doctor->name,
            'image' => $image,
            'speciality' => $request->speciality ?? $doctor->speciality,
            'rating' => $request->rating ?? $doctor->rating,
        ]);
        return new DoctorResource($doctor);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Doctor $doctor)
    {

        Storage::delete($doctor->image);
        $deleted = $doctor->delete();
        return new JsonResponse([
           'message' => 'the doctor is deleted successfully'
        ]);
    }
}
