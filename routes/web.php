<?php

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\ManufacturerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web p for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');

});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return redirect()->route('movies.index');
        // return view('dashboard');
    })->name('dashboard');

    Route::name('users.')->prefix('users')->group(function(){
        Route::get('',[UserController::class,'index'])
        ->name('index')
        ->middleware(['permission:users.index']);
    });

    Route::resource('categories',CategoryController::class)->only([
        'index', 'create', 'edit'
    ]);

    Route::get('async/categories',[CategoryController::class,'async'])
    ->name('async.categories');

    Route::resource('manufacturers', ManufacturerController::class)->only([
        'index','create','edit'
    ]);

    Route::get('async/manufacturers',[ManufacturerController::class,'async'])
    ->name('async.manufacturers');

    Route::resource('movies', MovieController::class)->only([
        'index','create','edit'
    ]);

    Route::get('async/movies',[MovieController::class,'async'])
    ->name('async.movies');

    

    Route::resource('schedules', ScheduleController::class)->only([
        'index','create','edit'
    ]);
});

