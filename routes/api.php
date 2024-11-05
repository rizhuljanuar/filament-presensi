<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [App\Http\Controllers\API\AuthController::class, 'login']);
Route::group(['middleware' => 'auth:sanctum'], function() {
    Route::get('/get-attendance-today', [App\Http\Controllers\API\AttendanceController::class, 'getAttendanceToday']);
    Route::get('/get-schedule', [App\Http\Controllers\API\AttendanceController::class, 'getSchedule']);
    Route::post('/store-attendance', [App\Http\Controllers\API\AttendanceController::class, 'store']);
    Route::get('/get-attendance-by-month-year/{month}/{year}', [App\Http\Controllers\API\AttendanceController::class, 'getAttendanceByMonthYear']);
    Route::post('/banned', [App\Http\Controllers\API\AttendanceController::class, 'banned']);
    Route::get('/get-image', [App\Http\Controllers\API\AttendanceController::class, 'getImage']);
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
