<?php

use App\Http\Controllers\ActivitiesController;
use App\Http\Controllers\BookingsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('activities', [ActivitiesController::class, 'index']);
Route::group(['prefix' => 'activity'], function () {
    Route::post('book', [BookingsController::class, 'book']);
    Route::get('find', [ActivitiesController::class, 'find']);
});
