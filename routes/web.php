<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\HistoriController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\ScanController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', [GuestController::class, 'home'])->name('guest.home');
Route::post('/create', [GuestController::class, 'create'])->name('guest.create');

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('auth', [AuthController::class, 'auth'])->name('auth');

Route::get('/logout', 'App\Http\Controllers\AuthController@logout')->name('logout');

Route::group(['middleware' => ['auth', 'checkRole']], function () {
    Route::get('dashboard-operator', [HistoriController::class, 'index'])->name('history.dashboard');
    Route::delete('dashboard-operator/{id}/delete', [HistoriController::class, 'delete'])->name('history.delete');
    Route::get('scan-qr/{id}', [HistoriController::class, 'detail'])->name('history.detail');

    Route::get('kendaraan-civitas', [KendaraanController::class, 'index'])->name('kendaraan.dashboard');
    Route::get('kendaraan-civitas/{id}/detail', [KendaraanController::class, 'detail'])->name('kendaraan.detail');
    Route::get('kendaraan-civitas/{id}/edit', [KendaraanController::class, 'edit'])->name('kendaraan.edit');
    Route::post('kendaraan-civitas/{id}/update', [KendaraanController::class, 'update'])->name('kendaraan.update');
    Route::delete('kendaraan-civitas/{id}/delete', [KendaraanController::class, 'delete'])->name('kendaraan.delete');
    Route::get('kendaraan-civitas/{id}/status', [KendaraanController::class, 'status'])->name('kendaraan.status');
    Route::get('pdf/{id}/qrcode', [KendaraanController::class, 'pdf'])->name('pdf.eksport');
});

Route::group(['middleware' => ['auth', 'checkUsers']], function () {
    Route::get('users', [UserController::class, 'index'])->name('user.dashboard');
    Route::post('users/create', [UserController::class, 'create'])->name('user.create');
    Route::get('users/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::post('users/{id}/update', [UserController::class, 'update'])->name('user.update');
    Route::delete('users/{id}/delete', [UserController::class, 'delete'])->name('user.delete');
});
