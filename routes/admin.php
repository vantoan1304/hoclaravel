<?php

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

Route::prefix('admin')->group(function(){

        Route::group(['middleware' => 'backend'], function(){

            //dashboard
            Route::get('/', [\App\Http\Controllers\Backend\Dashboard\DashboardController::class, 'index'])->name('backend.index');

            //user

            Route::get('/user',[\App\Http\Controllers\Backend\User\UserController::class, 'index'])->name('backend.users.index');


            //posts
            Route::get('/posts', [\App\Http\Controllers\Backend\Posts\PostController::class, 'index'])->name('backend.post.index');

            //category
            Route::get('/category', [\App\Http\Controllers\Backend\Category\CategoryController::class, 'index'])->name('backend.category.index');

            Route::get('/category/add', [\App\Http\Controllers\Backend\Category\CategoryController::class , 'showform']);

          Route::post('/category/add', [\App\Http\Controllers\Backend\Category\CategoryController::class, 'handleCategory'])->name('category.add');
        });

});




