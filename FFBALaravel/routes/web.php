<?php


use App\Http\Controllers\MovieController;
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

Route::get('/', [MovieController::class, 'index']);

/*Route::get('/login', function(){

return view('login');

});
*/
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Route pour afficher les films dans le tableau de bord
    Route::get('/dashboard/movies', [MovieController::class, 'index'])->name('dashboard.movies');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
