<?php


use App\Http\Controllers\MovieController;

use App\Http\Controllers\MovieGenreController;

use App\Http\Controllers\MovieDayController;

use Illuminate\Support\Facades\Route;

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


/*Route::get('/login', function(){

return view('login');

});
*/
Route::get('/', [MovieController::class, 'index']);
Route::get('/movday', [MovieDayController::class, 'movday']); 


Route::get('/movie/{id}', 'App\Http\Controllers\MovieDayController@show')->name('movie-details');

/* ... */

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/dashboard/movies', [MovieController::class, 'index'])->name('dashboard.movies');
});

