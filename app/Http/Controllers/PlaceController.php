<?php

namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\Http\Request;
use Database\Repositories\PlaceRepository;
use App\Http\Requests\PlaceRequest;
use Symfony\Component\HttpFoundation\RedirectResponse;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PlaceRepository $placeRepository)
    {
        return view('Place.index', [
            'places' => $placeRepository->all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Place.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(
        PlaceRequest $request,
        PlaceRepository $placeRepository
    ): RedirectResponse
    {
        $place = new Place();
        $place->name = $request->name;

        $placeRepository->save($place);

        return redirect(route("place.index"))
            ->with("just_happened_event_info", "The place item {$request->name} has just been created.");
    }

    /**
     * Display the specified resource.
     */
    public function show(Place $place)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Place $place)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Place $place)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Place $place)
    {
        //
    }
}
