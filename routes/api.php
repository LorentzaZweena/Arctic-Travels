<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\ResortApiController;
use App\Http\Controllers\Api\BookingApiController;
use App\Http\Controllers\Api\AuthApiController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register', [AuthApiController::class, 'register']);
Route::post('/login', [AuthApiController::class, 'login']);
Route::get('/resorts', [ResortApiController::class, 'index']);
Route::get('/resorts/{id}', [ResortApiController::class, 'show']);
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/my-bookings', [BookingApiController::class, 'myBookings']);
});

