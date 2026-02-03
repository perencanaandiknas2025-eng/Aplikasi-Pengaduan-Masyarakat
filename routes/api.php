<?php

use App\Http\Controllers\Api\ComplaintController;
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

// API for complaints
Route::middleware('auth:api')->group(function () {
    Route::apiResource('complaints', ComplaintController::class);
    Route::get('complaints/track/{nik}', [ComplaintController::class, 'track']);
});
