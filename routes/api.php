<?php

use App\Http\Controllers\BeaconController;
use App\Http\Controllers\BeaconTransactionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\TruckController;
use App\Http\Controllers\TruckTransactionController;
use App\Http\Controllers\UserController;
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

Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout']);
Route::get('/users', [UserController::class, 'index']);
Route::get('/assignments-user', [UserController::class, 'assign']);

Route::get('/dashboard', [DashboardController::class, 'line_chart']);
Route::post('/message', [DashboardController::class, 'message']);

Route::get('/sites', [SiteController::class, 'index']);
Route::post('/add-site', [SiteController::class, 'create']);
Route::put('/update-site', [SiteController::class, 'update']);
Route::delete('/delete-site', [SiteController::class, 'delete']);
Route::get('/markers', [SiteController::class, 'map']);
Route::get('/assignments-site', [SiteController::class, 'assign']);
Route::get('assignments', [SiteController::class, 'assignments']);

Route::get('/trucks', [TruckController::class, 'index']);
Route::get('/trucks-select-data', [TruckController::class, 'select_data']);
Route::post('/add-truck', [TruckController::class, 'create']);
Route::put('/update-truck', [TruckController::class, 'update']);
Route::delete('/delete-truck', [TruckController::class, 'delete']);
Route::get('/truck-transactions', [TruckTransactionController::class, 'index']);
Route::get('/transactions-select-data', [TruckTransactionController::class, 'select_data']);
Route::post('/add-transaction', [TruckTransactionController::class, 'create']);
Route::put('/update-transaction', [TruckTransactionController::class, 'update']);
Route::delete('/delete-transaction', [TruckTransactionController::class, 'delete']);

Route::get('/beacons', [BeaconController::class, 'index']);
Route::post('/add-beacon', [BeaconController::class, 'create']);
Route::put('/update-beacon', [BeaconController::class, 'update']);
Route::delete('/delete-beacon', [BeaconController::class, 'delete']);
Route::get('/beacon-transactions', [BeaconTransactionController::class, 'index']);
