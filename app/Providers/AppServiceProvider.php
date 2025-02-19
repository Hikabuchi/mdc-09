<?php

namespace App\Providers;

use App\Models\Country;
use App\Models\Genre;
use App\Models\Film;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $g = Genre::all();
        View::share('genres', $g);

        $years = Film::select('year')->distinct()->orderBy('year')->get();
        View::share('years', $years);

        $countries = Country::all();
        View::share('countries', $countries);
    }
}
