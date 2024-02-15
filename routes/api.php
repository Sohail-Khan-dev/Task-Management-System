<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;
use App\Models\Blog;

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

Route::middleware('auth:sanctum')->group(function () {

    // Blow are on working  condition Api Callss 
    Route::get('/allblog',[BlogController::class,'apiShowAll']);
    Route::post('/blog/store',[BlogController::class,'apiStore'])->name('blog.store');
    Route::put('/blog/update/{id}',[BlogController::class,'apiUpdate']);
    Route::delete('/blog/delete/{id}',[BlogController::class,'apiDelete']);
    
    Route::get('/users', [UserController::class,'getAllUsers']);
    // Below Route are for the User Authentication. 
    Route::get('/logout', [UserController::class,'logout']);
});
Route::get('/test', function () {
    return "This is Test Router";
} );


        
// Route::get('/logout', [UserController::class,'logout']);
Route::get('/login', [UserController::class,'login']);
Route::post('/register', [UserController::class,'register']);



// // Blow are on working  condition Api Callss 
//     Route::get('/allblog',[BlogController::class,'apiShowAll']);
//     // Below one get the complete web page and show it.  
//     // Route::get('/blog',[BlogController::class,'dashboard'])->name('blog');
//     Route::post('/blog/store',[BlogController::class,'apiStore'])->name('blog.store');
//     Route::put('/blog/update/{id}',[BlogController::class,'apiUpdate']);
//     Route::delete('/blog/delete/{id}',[BlogController::class,'apiDelete']);

