<?php

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

Route::get('/', function () {
    return view('index');
});
Route::get('/a', function () {
    return view('pages.index');
});

Route::get('/users', [UserController::class, 'index'])->name('users');
Route::post('/users', [UserController::class, 'store'])->name('store.user');
Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('edit.user');
Route::put('/user/{id}/update', [UserController::class, 'update'])->name('update.user');
Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('delete.user');
