<?php

use App\Http\Controllers\ActorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\SeasonController;
use App\Http\Controllers\SerieController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\ProducerController;
use App\Http\Controllers\GenreController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::resource('films', FilmController::class);
Route::resource('/actors', ActorController::class);

Route::resource('/countries', CountryController::class);

Route::resource('/genres', GenreController::class);

Route::resource('/producers', ProducerController::class);
Route::get('/', [FilmController::class, 'index']);

Route::resource('seasons', SeasonController::class);

Route::resource('series', SerieController::class);

Route::get('/series/{serie}/json', [SerieController::class, 'json']);

Route::get('search', [FilmController::class, 'search']);

Route::get('/reviews', [ReviewController::class, 'index']);

Route::post('/review/create', [ReviewController::class, 'create']);

Route::get('search', [FilmController::class, 'search']);

Route::get('registration', [UserController::class, 'index']);

Route::post('registration', [UserController::class, 'register']);

Route::get('/profile', [UserController::class, 'profile'])->middleware('auth');

Route::get('/logout', [UserController::class, 'logout']);

Route::get('/login', [UserController::class, 'index_auth'])->name('login');
Route::post('/login', [UserController::class, 'login']);

Route::get('/reviews/moder/{review}/{status}', [ReviewController::class, 'moderate']);

Route::get('/filter', [FilmController::class, 'filter']);


