<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEventsRequest;
use App\Http\Requests\UpdateEventsRequest;
use App\Http\Resources\EventsResource;
use App\Models\Events;
use Illuminate\Http\JsonResponse;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Events::all();
        return EventsResource::collection($events);
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
    public function store(StoreEventsRequest $request)
    {
        $created = Events::query()->create($request->only([
            'title','description','location','date_time','organizer'
        ]));
        return new EventsResource($created);
    }

    /**
     * Display the specified resource.
     */
    public function show(Events $events)
    {
        return new EventsResource($events);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Events $events)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventsRequest $request, Events $events)
    {
        $updated = $events->update($request->only([
            'title','description','location','date_time','organizer'
        ]));
        if (!$updated){
            return new JsonResponse([
                'errors' => 'failed to update the event',
            ],400);
        }
        return new EventsResource($events);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Events $events)
    {
        $deleted = $events->forceDelete();

        if(!$deleted){
            return new JsonResponse([
                'errors' => 'failed to delete the event'
            ],400);
        }
        return new JsonResponse([
            'messages' => 'The event is deleted successfully'
        ]);
    }
}
