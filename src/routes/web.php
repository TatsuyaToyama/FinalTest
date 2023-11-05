<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;


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

Route::get('/', [ContactController::class,'index']);
Route::post('/confirm', [ContactController::class,'confirm']);
Route::post('/modify', [ContactController::class,'modify']);

Route::post('/thanks', [ContactController::class,'store']);

Route::get('/manage', [ContactController::class,'manage']);
// Route::post('/manage', [ContactController::class,'manage']);

Route::get('/manage/search', [ContactController::class,'search']);
Route::post('/manage/search', [ContactController::class,'search']);
Route::delete('/manage/delete', [ContactController::class, 'destroy']);

