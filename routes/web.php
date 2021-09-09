<?php

<<<<<<< HEAD
use App\Http\Livewire\Users;
=======
>>>>>>> 7f908437bdaca75d34e39ea78b7d186dfbb1d8b0
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Auth::routes();


Route::get('/dash', [App\Http\Controllers\HomeController::class, 'index'])->name('dash');

<<<<<<< HEAD
/*
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/usuarios', Users::class);
    Route::get('/dash', function () {
        return view("dash.usuario.index");
    })->name('dash');
});*/
=======
>>>>>>> 7f908437bdaca75d34e39ea78b7d186dfbb1d8b0


