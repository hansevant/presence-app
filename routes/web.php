<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\CodeController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\PresenceController;
use App\Http\Controllers\UserController;
use App\Models\LabClass;
use App\Models\Material;
use App\Models\Presence;
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

Route::group(['middleware' => 'guest'], function () {
    Route::get('/', function () {
        return view('index');
    })->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('process.login');
});
Route::group(['middleware' => 'auth'], function () {


    Route::get('/presence', [PresenceController::class, 'dashboard'])->name('presence');
    Route::post('/check-in', [PresenceController::class, 'checkIn'])->name('check.in');
    Route::get('/check-out', [PresenceController::class, 'checkOut'])->name('check.out');

    Route::middleware(['checkRole:Admin,Staff'])->group(function () {
        Route::get('/users', [UserController::class, 'index'])->name('users');
        Route::post('/users', [UserController::class, 'store'])->name('store.user');
        Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('edit.user');
        Route::put('/user/{id}/update', [UserController::class, 'update'])->name('update.user');
        Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('delete.user');

        Route::get('/materials', [MaterialController::class, 'index'])->name('materials');
        Route::post('/materials', [MaterialController::class, 'store'])->name('store.material');
        Route::get('/material/{id}/edit', [MaterialController::class, 'edit'])->name('edit.material');
        Route::put('/material/{id}/update', [MaterialController::class, 'update'])->name('update.material');
        Route::delete('/material/{id}', [MaterialController::class, 'destroy'])->name('delete.material');

        Route::get('/class', [ClassController::class, 'index'])->name('class');
        Route::post('/class', [ClassController::class, 'store'])->name('store.class');
        Route::get('/class/{id}/edit', [ClassController::class, 'edit'])->name('edit.class');
        Route::put('/class/{id}/update', [ClassController::class, 'update'])->name('update.class');
        Route::delete('/class/{id}', [ClassController::class, 'destroy'])->name('delete.class');
    });

    Route::middleware(['checkRole:Admin,Staff,PJ'])->group(function () {
        Route::get('/code', [CodeController::class, 'index'])->name('code');
        Route::post('/code', [CodeController::class, 'store'])->name('store.code');
    });

    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
});