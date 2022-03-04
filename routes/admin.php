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
            Route::prefix('/category')->group(function(){
                Route::get('', [\App\Http\Controllers\Backend\Category\CategoryController::class, 'index'])->name('backend.category.index');
                Route::get('/create', [\App\Http\Controllers\Backend\Category\CategoryController::class, 'create'])->name('backend.category.create');
                Route::post('/store', [\App\Http\Controllers\Backend\Category\CategoryController::class, 'store'])->name('backend.category.store');
                Route::post('/delete', [\App\Http\Controllers\Backend\Category\CategoryController::class, 'destroy'])->name('backend.category.destroy');
                Route::post('/update/{id}', [\App\Http\Controllers\Backend\Category\CategoryController::class, 'update'])->name('backend.category.update');
                Route::get('/edit/{id}', [\App\Http\Controllers\Backend\Category\CategoryController::class, 'edit'])->name('backend.category.edit');

            });


        });

});




