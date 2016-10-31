<?php

namespace App\Http\Controllers;

use App\Http\Requests\MakerRequest;
use App\Maker;
use Illuminate\Http\Request;

class MakerController extends Controller
{
    public function index()
    {
        $makers = Maker::all();

        return response()->json($makers, 200);
    }

    public function show($id)
    {
        $makers = Maker::find($id);

        if (!$makers) {
            return response()->json(['message' => 'This maker does not exist', 'code' => 404], 404);
        }

        return response()->json(['data' => $makers], 200);
    }

    public function store(MakerRequest $request)
    {
        $values = $request->only(['name', 'phone']);

        Maker::create($values);

        return response()->json(['message' => 'Maker correctly added'], 201);

    }

}
