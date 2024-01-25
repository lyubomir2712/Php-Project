<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\HolidayHouseController;
use App\Http\Controllers\HolidayTypeController;
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

Route::get('/', function () {
    return view('welcome');
});


Route::resource('cities', CityController::class);

Route::resource('holiday_types', HolidayTypeController::class);

Route::resource('holiday_houses', HolidayHouseController::class);
