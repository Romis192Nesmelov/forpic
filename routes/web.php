<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaticController;
use App\Http\Controllers\FeedbackController;
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

Route::get('/', [StaticController::class,'index']);
Route::post('/get-action', [StaticController::class,'getAction']);
Route::post('/callback1', [FeedbackController::class,'callback1']);
Route::post('/callback2', [FeedbackController::class,'callback2']);
Route::post('/action', [FeedbackController::class,'action']);