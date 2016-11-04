<?php

namespace App\Http\Controllers;

use App\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.basic', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        $vehicles = Vehicle::all();

        return response()->json($vehicles, 200);
    }
}
