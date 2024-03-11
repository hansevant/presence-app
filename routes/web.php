<?php

use App\Http\Controllers\ClassController;
use App\Http\Controllers\MaterialController;
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