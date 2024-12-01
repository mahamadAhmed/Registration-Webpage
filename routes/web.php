<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\ActorController;
use App\Models\user_regs;
use App\Http\Controllers\user_reg_Controller;


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
// Define a route for the default language (English)
Route::get('/', function () {
    App::setLocale('en'); // Set the default language to English
    return view('index');
});

Route::get('/{lang}', function ($lang) {
    App::setLocale($lang);
    return view('index');
});

Route::resource('user', user_regs::class);

Route::post('index', [user_reg_Controller::class,'store'])->name('store');
Route::get('/actors/bio', [ActorController::class,'getActorsBornOnDate']);
