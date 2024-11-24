<?php

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

Route::group(['middleware' => 'api', 'prefix' => 'auth'], function () {
    // AUTH
    Route::post('/login', [App\Http\Controllers\AuthController::class, 'login'])->name('login')->withoutMiddleware('jwt');
    Route::post('/register', [App\Http\Controllers\AuthController::class, 'register'])->name('register')->withoutMiddleware('jwt');
    Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
    Route::post('/refresh', [App\Http\Controllers\AuthController::class, 'refresh'])->name('refresh');
    Route::post('/me', [App\Http\Controllers\AuthController::class, 'me'])->name('me');
});

Route::group(['middleware' => 'auth'], function () {

    /** MENU */
    Route::get('/menus', [App\Http\Controllers\MenuController::class, 'menus'])->name('menus');

    /** LISTAS */
    Route::get('/lists', [App\Http\Controllers\ListController::class, 'lists'])->name('lists');
    Route::post('/lists/create', [App\Http\Controllers\ListController::class, 'create'])->name('create');
    Route::delete('/lists/{id}', [App\Http\Controllers\ListController::class, 'delete'])->name('delete');
    Route::get('/shopping-list/{id}', [App\Http\Controllers\ListController::class, 'getShoppingList'])->name('getShoppingList');
    Route::post('/shopping-list', [App\Http\Controllers\ListController::class, 'addShoppingList'])->name('addShoppingList');
    
});

