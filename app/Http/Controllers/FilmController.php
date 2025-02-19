<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use App\Models\Country;
use App\Models\Film;
use App\Models\Genre;
use App\Models\Producer;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $films = Film::all();
        return view('index', ['films' => $films]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genres = Genre::all();
        $producers = Producer::all();
        $actors = Actor::all();
        $country = Country::all();
        $data = ['genres' => $genres, 'producers' => $producers, 'actors' => $actors, 'countries' => $country];
        return view('admin.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $film = new Film();
        if ($request->file('image')!== NULL) {
            $film->image = $request->file('image')->store('public/films');
        }

        $film->title = $request->input('title');
        $film->year = $request->input('year');
        $film->description = $request->input('description');
        $film->country_id = $request->input('countries');
        $film->producer_id = $request->input('producers');
        $film->video = $request->input('video');
        $film->save();
        // Привязка актеров и жанров
        $c = [];
        foreach ($request->input('actors') as $key =>$a) {
            $c[$a]= ['role'=> $request->input('role')[$key]];
        }

        if ($request->input('actors')) {
            $film->actors()->sync($c);
        }

        if ($request->input('genres')) {
            $film->genres()->attach($request->input('genres'));
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Film $film)
    {
        return view('films.show', ['film' => $film]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Film $film)
    {
        $genres = Genre::all();
        $producers = Producer::all();
        $actors = Actor::all();
        $country = Country::all();
        $data = ['film' => $film,'genres' => $genres, 'producers' => $producers, 'actors' => $actors, 'countries' => $country];
        return view('admin.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Film $film)
    {
        if ($request->file('image')!== NULL) {
            $film->image = $request->file('image')->store('public/films');
        }
        $film->title = $request->input('title');
        $film->description = $request->input('description');
        $film->year = $request->input('year');
        $film->producer_id = $request->input('producer');
        $film->country_id = $request->input('country');
        $film->video  = $request->input('video');
        $film->update();

        $c = [];
        foreach ($request->input('actors') as $key =>$a) {
            $c[$a]= ['role'=> $request->input('role')[$key]];
        }
        if ($request->input('actors')) {
            $film->actors()->sync($c);
        }

        if ($request->input('genres')) {
            $film->genres()->sync($request->input('genres'));
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Film $film)
    {
        $film->genres()->detach();
        $film->actors()->detach();
        $film->delete();
        return redirect()->back();
    }

    public function search(Request $request){
        $films = Film::where('title', 'like', '%'.$request->search.'%')->paginate(4);
        $data =['film' => $films, 'text' => $request->search];
        return view('search', $data);
    }

    public function filter(Request $request){
        $films = Film::query();
        $text = '';
        if(isset($request->genre)){
            $films = $films->whereHas('genres', function($query) use($request){
                $query->whereIn('id', $request->genre);
            });
        }

        if(isset($request->actor)){
            $films = $films->whereHas('actors', function($query) use($request){
                $query->where('id', $request->actor);
            });
            $text = Actor::find($request->actor)->name;
        }

        if(isset($request->year)){
            $films = $films->where('year', $request->year);

        }

        if(isset($request->producer)){
            $films = $films->where('producer_id', $request->producer);
            $text = Producer::find($request->producer)->name;

        }

        if(isset($request->country)){
            $films = $films->whereIn('country_id', $request->country);

        }

        $films=$films->get();
        $data =['films' => $films, 'title' => $text];
        return view('filter', $data);
    }

}
