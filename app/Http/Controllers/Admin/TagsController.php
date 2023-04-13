<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use App\Http\Requests\Tags\StoreRequest;
use App\Http\Requests\Tags\UpdateRequest;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function index()
    {
        $tag = Tag::all();
        return view('tag.index', compact('tag'));
    }

    public function create()
    {
        return view('tag.create');

    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        Tag::firstOrCreate($data);

        return redirect()->route('tag.index');
    }

    public function show(Tag $tag)
    {
        return view('tag.show', compact('tag'));
    }

    public function edit(Tag $tag)
    {
        return view('tag.edit', compact('tag'));
    }

    public function update(UpdateRequest $request, Tag $tag)
    {
        $data = $request->validated();
        $tag->update($data);

        return view('tag.show', compact('tag'));
    }

    public function delete(Tag $tag)
    {
        $tag->delete();

        return redirect()->route('tag.index');
    }
}
