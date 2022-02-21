<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tag;
use Illuminate\Support\Str;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();

        return view('admin.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $request->validate([
            "name" => "required|string|unique:tags,name", 
        ]);

        $tag = new Tag();
        $tag->name = $data['name'];

        $slug = Str::of($tag->name)->slug("-");
        $count = 1;

        while(Tag::where("slug", $slug)->first()) {
            $slug = Str::of($tag->title)->slug("-") . "-{$count}";
            $count++;
        }

        $tag->slug = $slug;

        $tag->save();

        return redirect()->route('tags.show', $tag->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        return view('admin.tags.show', compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view("admin.tags.edit", compact('tag'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        $data = $request->all();

        $request->validate([
            "name" => "required|string|unique:tags,name", 
        ]);

        $tag->name = $data['name'];

        $slug = Str::of($tag->name)->slug("-");
        $count = 1;

        while(Tag::where("slug", $slug)->first()) {
            $slug = Str::of($tag->name)->slug("-") . "-{$count}";
            $count++;
        }

        $tag->slug = $slug;

        $tag->save();

        return redirect()->route('tags.show', $tag->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();

        return redirect()->route('tags.index');
    }
}
