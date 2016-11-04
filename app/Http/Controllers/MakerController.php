<?php

namespace App\Http\Controllers;

use App\Http\Requests\MakerRequest;
use App\Maker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class MakerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.basic', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        $makers = Cache::remember('makers', 15/60, function() {
            return  Maker::simplePaginate(5);
        });

        return response()->json(['previous' =>  $makers->previousPageUrl(), 'next' => $makers->nextPageUrl(), 'data' => $makers->items()], 200);
    }

    public function show($id)
    {
        $maker = Maker::find($id);

        if (!$maker) {
            return response()->json(['message' => 'This maker does not exist', 'code' => 404], 404);
        }

        return response()->json(['data' => $maker], 200);
    }

    public function store(MakerRequest $request)
    {
        $values = $request->only(['name', 'phone']);

        Maker::create($values);

        return response()->json(['message' => 'Maker correctly added'], 201);

    }

    public function update(MakerRequest $request, $id)
    {
        $maker = Maker::find($id);

        if (!$maker) {
            return response()->json(['message' => 'This maker does not exist', 'code' => 404], 404);
        }

        $name = $request->get('name');
        $phone = $request->get('phone');

        $maker->name = $name;
        $maker->phone = $phone;

        $maker->save();

        return response()->json(['massage' => 'The maker has been updated'], 200);
    }

    public function destroy($id)
    {
        $maker = Maker::find($id);

        if (!$maker) {
            return response()->json(['message' => 'This maker does not exist', 'code' => 404], 404);
        }

        $vehicle = $maker->vehicles;

        if (!$vehicle) {
            return response()->json(['message' => 'This vehicle does not exist', 'code' => 404], 404);
        }

        $maker->delete();

        return response()->json(['massage' => 'The maker has been deletes'], 200);
    }
}
