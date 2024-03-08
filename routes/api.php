<?php

use App\Http\Controllers\CommodityController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\VehicleEntryController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('districts', DistrictController::class);
Route::apiResource('commodities', CommodityController::class);
Route::apiResource('vehicle-entries', VehicleEntryController::class);

Route::get('dfdf', function (Request $request) {
    $users =  User::get();
    foreach ($users as $user) {
        logger($user->id);
    }
});
