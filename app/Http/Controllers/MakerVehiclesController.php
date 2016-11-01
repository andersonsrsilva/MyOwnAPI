<?php

namespace App\Http\Controllers;

use App\Http\Requests\VehicleRequest;
use App\Maker;
use Illuminate\Http\Request;

class MakerVehiclesController extends Controller
{
    public function index($id)
    {
        $makers = Maker::find($id);

        if (!$makers) {
            return response()->json(['message' => 'This maker does not exist', 'code' => 404], 404);
        }

        return response()->json(['data' => $makers->vehicles], 200);
    }

    public function show($id, $vehicleId)
    {
        $makers = Maker::find($id);

        if (!$makers) {
            return response()->json(['message' => 'This maker does not exist', 'code' => 404], 404);
        }

        $vehicle = $makers->vehicles->find($vehicleId);

        if (!$vehicle) {
            return response()->json(['message' => 'This vehicle does not exist for this maker', 'code' => 404], 404);
        }

        return response()->json(['data' => $vehicle], 200);
    }

    public function store(VehicleRequest $request, $makerId)
    {
        $maker = Maker::find($makerId);

        if (!$maker) {
            return response()->json(['message' => 'This maker does not exist', 'code' => 404], 404);
        }

        $values = $request->all();

        $maker->vehicles()->create($values);

        return response()->json(['message' => 'The vehicle associated was created'], 201);
    }

    public function update(VehicleRequest $request, $makerId, $vehicleId)
    {
        $maker = Maker::find($makerId);

        if (!$maker) {
            return response()->json(['message' => 'This maker does not exist', 'code' => 404], 404);
        }

        $vehicle = $maker->vehicles->find($vehicleId);

        if (!$vehicle) {
            return response()->json(['message' => 'This vehicle does not exist', 'code' => 404], 404);
        }

        $color  = $request->get('color');
        $power = $request->get('power');
        $capacity = $request->get('capacity');
        $speed = $request->get('speed');

        $vehicle->color = $color;
        $vehicle->power = $power;
        $vehicle->capacity = $capacity;
        $vehicle->speed = $speed;
        $vehicle->save();

        return response()->json(['massage' => 'The vehicle has been updated'], 200);
    }

    public function destroy($makerId, $vehicleId)
    {
        $maker = Maker::find($makerId);

        if (!$maker) {
            return response()->json(['message' => 'This maker does not exist', 'code' => 404], 404);
        }

        $vehicle = $maker->vehicles->find($vehicleId);

        if (!$vehicle) {
            return response()->json(['message' => 'This vehicle does not exist', 'code' => 404], 404);
        }

        $vehicle->delete();

        return response()->json(['massage' => 'The vehicle has been deletes'], 200);
    }


}
