<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\HistoriController;
use App\Http\Controllers\API\KendaraanController;
use App\Http\Controllers\API\LoginController;
use Illuminate\Auth\Events\Login;
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

Route::get('kendaraan-getData', [KendaraanController::class, 'getData']);
Route::get('kendaraan', [KendaraanController::class, 'all']);

Route::get('histori', [HistoriController::class, 'all']);
Route::get('terparkir', [HistoriController::class, 'terparkir']);
Route::get('count', [HistoriController::class, 'count']);
Route::get('histori/store', [HistoriController::class, 'store']);
Route::get('histori/update', [HistoriController::class, 'update']);


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::post('/logoutall', [AuthController::class, 'logoutall']);


// Route::post('/login', [LoginController::class, 'login']);
// Route::post('/register', [LoginController::class, 'register']);
// Route::post('/logout', [LoginController::class, 'logout']);
