<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\DocumentTypeController;
use App\Http\Controllers\UserController;
use App\Models\DocumentType;
use Illuminate\Http\Request;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout')->middleware('auth:api');

});

//============================================
//=============Documents Route ===============
//============================================

Route::apiResource('docs',DocumentController::class)->middleware('checkUser');


//============================================
//=============DocumentType Route ===============
//============================================

Route::apiResource('docs-type',DocumentTypeController::class)->middleware('checkUser');

//============================================
//=============User Route ===============
//============================================

Route::get('user',[UserController::class,'index'])->middleware('checkUser');

//============================================
//=============Comment Route ===============
//============================================

Route::get('/comments',[CommentController::class, 'index'])->middleware('checkUser');
Route::post('/add-document-comment/{document}',[CommentController::class, 'DocumentStoreComment'])->middleware('checkUser');

