<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reviews = Review::all();
        return view('admin.admin_comment', ['reviews' => $reviews]);
    }

    /**
     * Show the form for creating a new resource.
     */


    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'text' => 'required|string',
            'rate' => 'required|integer|min:1|max:5',
        ]);

        $review = new Review();
        $review->film_id = $request->film_id;
        $review->user_id = $request->user_id;
        $review->rate= $request->rate;
        $review->text= $request->text;
        $review->save();
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        //
    }
    public function moderate(Review $review, $status){
        $review->status = $status;
        $review->update();
        return redirect()->back();
    }

}
