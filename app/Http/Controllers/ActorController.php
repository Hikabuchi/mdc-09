<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use Illuminate\Http\Request;

class ActorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $actors = Actor::all();
        return view('admin.actors.actors', ['actors' => $actors]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.actors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $actor = new Actor();
        if ($request->file('image')!== NULL) {
            $actor->image = $request->file('image')->store('public/actors');
        }
        $actor->name = $request->input('name');
        $actor->year_of_birth = $request->input('year_of_birth');
        $actor->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Actor $actor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Actor $actor)
    {
        return view('admin.actors.edit', ['actor' => $actor]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Actor $actor)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'year_of_birth' => 'required',
            'image' => 'mimes:jpeg,jpg,png'
        ]);
        if ($request->file('image')!== NULL) {
            $actor->image = $request->file('image')->store('public/actors');
        }
        $actor->name = $request->input('name');
        $actor->year_of_birth = $request->input('year_of_birth');
        $actor->update();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Actor $actor)
    {
        $actor->delete();
        return redirect()->back();
    }
}
