<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\UserLoginController;
use App\Http\Controllers\api\UserBlogController;
use App\Http\Controllers\api\UserRegistrationController;
use App\Http\Controllers\api\BlogPostController;
use App\Http\Controllers\api\BlogCommentController;

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

Route::post('register', [UserRegistrationController::class, 'register']);
Route::post('login',[UserLoginController::class, 'login']);


Route::prefix('posts')->group(function(){

    Route::get('',[BlogPostController::class, 'posts']);
    Route::get('{post}',[BlogPostController::class, 'show']);
    Route::get('{post}/comments',[BlogPostController::class, 'comments']);

});


Route::middleware('auth:api')->group(function(){

    Route::post('logout',[UserLoginController::class, 'logout']);

    Route::prefix('posts')->group(function(){

        Route::post('',[UserBlogController::class, 'create']);
        Route::patch('{post}',[UserBlogController::class, 'update']);
        Route::delete('{post}',[UserBlogController::class, 'delete']);

        Route::post('{post}/comments',[BlogCommentController::class, 'create']);
        Route::patch('{post}/comments/{comment}',[BlogCommentController::class, 'update']);
        Route::delete('{post}/comments/{comment}',[BlogCommentController::class, 'delete']);

    });
    
});
