<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Http\Requests\Colors\StoreRequest;
use App\Http\Requests\Colors\UpdateRequest;
use Illuminate\Http\Request;

class ColorsController extends Controller
{
    public function index()
    {
        $color = Color::all();
        return view('color.index', compact('color'));
    }

    public function create()
    {
        return view('color.create');

    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        Color::firstOrCreate($data);

        return redirect()->route('color.index');
    }

    public function show(Color $color)
    {
        return view('color.show', compact('color'));
    }

    public function edit(Color $color)
    {
        return view('color.edit', compact('color'));
    }

    public function update(UpdateRequest $request, Color $color)
    {
        $data = $request->validated();
        $color->update($data);

        return view('color.show', compact('color'));
    }

    public function delete(Color $color)
    {
        $color->delete();

        return redirect()->route('color.index');
    }
}
