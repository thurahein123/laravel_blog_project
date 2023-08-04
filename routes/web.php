<?php

use Illuminate\Support\Facades\Route;
use App\HTTP\Controllers\ArticleController;
use App\HTTP\Controllers\CommentController;

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

Route::get('/', [ArticleController::class, 'index']);
Route::get('/articles', [ArticleController::class, 'index']);
Route::get('/articles/detail/{id}', [ArticleController::class, 'detail']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/articles/add', [ArticleController::class, 'add']);
Route::post('/articles/add', [ArticleController::class, 'create']);

Route::get('/articles/delete/{id}', [ArticleController::class, 'delete']);

Route::get('/articles/update/{id}', [ArticleController::class, 'edit']);
Route::post('/articles/update/{id}', [ArticleController::class, 'update']);

Route::get('/comments/delete/{id}', [CommentController::class, 'delete']);
Route::post('/comments/add', [CommentController::class, 'create']);
