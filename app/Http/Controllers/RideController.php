<?php

namespace App\Http\Controllers;

use App\Models\Ride;
use App\Http\Requests\PublishedRequest;

class RideController extends Controller
{
    public function index()
    {
        $rides = Ride::all();

        return response()->json(['rides' => $rides], 200);
    }

    public function show($id)
    {
        $ride = Ride::find($id);

        if (!$ride) {
            return response()->json(['error' => 'Ride not found'], 404);
        }

        return response()->json(['ride' => $ride], 200);
    }
    public function store(PublishedRequest $request)
    {

        $ride = Ride::create($request['params']);

        return response()->json(['ride' => $ride], 201);
    }

    public function update(PublishedRequest $request, $id)
    {
        $ride = Ride::find($id);

        if (!$ride) {
            return response()->json(['error' => 'Ride not found'], 404);
        }

        $ride->update($request->all());

        return response()->json(['ride' => $ride], 200);
    }

    public function destroy($id)
    {
        $ride = Ride::find($id);

        if (!$ride) {
            return response()->json(['error' => 'Ride not found'], 404);
        }

        $ride->delete();

        return response()->json(['message' => 'Ride deleted successfully'], 200);
    }
}
