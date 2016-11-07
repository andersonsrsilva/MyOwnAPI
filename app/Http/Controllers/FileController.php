<?php

namespace App\Http\Controllers;

use App\Http\Requests\FileRequest;
use Carbon\Carbon;

class FileController extends Controller
{
    public function index()
    {
        return "index";
    }

    public function store(FileRequest $request)
    {
        return "store";

        $file = $request->file('file');
        $title = $request->get('title');
        $description = $request->get('description');
        $path = '/files/';
        $name = sha1(Carbon::now()) . '.' . $file->guessExtension();

        $file->move(public_path() . $path, $name);

        $instance = File::create([
            'title' => $title,
            'description' => $description,
            'path' => $path.$name
        ]);

        return response()->json(['data' => "The file {$instance->name} was created with id {$instance->id}"], 200);
    }

    public function show($id)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }
}
