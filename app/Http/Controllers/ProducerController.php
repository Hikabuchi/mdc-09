<?php

namespace App\Http\Controllers;

use App\Models\Producer;
use Illuminate\Http\Request;

class ProducerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $producers = Producer::all();
        return view('admin.producers.producers', ['producers' => $producers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.producers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:countries|max:255',
        ]);
        $producer = new Producer();
        $producer->name = $request->input('name');
        $producer->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Producer $producer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producer $producer)
    {
        return view('admin.producers.edit', ['producer' => $producer]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producer $producer)
    {
        $validatedData = $request->validate([
            'name' => 'required'
        ]);
        $producer->name = $request->input('name');
        $producer->update();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producer $producer)
    {
        $producer->delete();
        return redirect()->back();
    }
}
