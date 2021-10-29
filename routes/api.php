<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// //public and pravete
// Route::get('posts',[PostController::class,'index']);
// Route::post('posts', [PostController::class, 'store']);
// Route::get('posts/{id}', [PostController::class, 'show']);
// Route::put('posts/{id}', [PostController::class, 'update']);
// Route::delete('posts/{id}', [PostController::class, 'destroy']);

//user
Route::post('/signup', [UserController::class, 'signup']);//Resister , create new account
Route::post('/login', [UserController::class, 'login']);
//student
Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{id}', [PostController::class, 'show']);
//private route
Route::group(['middleware'=>['auth:sanctum']],function(){
    //student
    Route::post('/posts', [PostController::class, 'store']);
    Route::put('/posts/{id}', [PostController::class, 'update']);
    Route::delete('/posts/{id}', [PostController::class, 'destroy']);
    //user
    Route::post('/logout', [UserController::class, 'logout']);
});