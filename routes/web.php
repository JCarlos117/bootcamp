<?php


use App\Http\Controllers\ChirpController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OpinionController;
//use App\Models\Chirp;
use DragonCode\Contracts\Cashier\Http\Request;
use GuzzleHttp\Psr7\Query;
use Illuminate\Support\Facades\DB;


// Route::get('/', function () {
//     return 'welcome to our home page';
// });



Route::view('/', 'indexislas')->name('welcome');

Route::middleware('auth')->group(function () {

    Route::view('/dashboard', 'dashboard')->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/chirps',[ChirpController::class, 'index'])
    ->name('chirps.index');

    Route::post('/chirps', [ChirpController::class, 'store'])
    ->name('chirps.store');

    Route::get('/chirps/{chirp}/edit',[ChirpController::class, 'edit'])

    ->name('chirps.edit');

    Route::put('/chirps/{chirp}', [ChirpController::class, 'update'])
    ->name('chirps.update');

    Route::delete('/chirps/{chirp}', [ChirpController::class, 'destroy'])
    ->name('chirps.destroy');
    // routes/web.php


Route::get('/indexIslas', function () {
    return view('indexIslas');
});



Route::post('/opinions', [OpinionController::class, 'store'])->name('opinions.store');



});

require __DIR__ . '/auth.php';
