<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GradController;
use App\Http\Controllers\GradoviController;
use App\Http\Controllers\VremeController;

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


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/gradovi', [GradoviController::class, 'index'])->name('gradovi');
Route::get('/getGradovi', [GradoviController::class, 'getGradovi']);
Route::post('/addGrad', [GradoviController::class, 'store']);
Route::delete('/deleteGrad/{id}', [GradoviController::class, 'destroy']);
Route::get('/getCity', [GradController::class, 'getCity']);
Route::get('/getVreme', [VremeController::class, 'getVreme']);
Route::post('/izmeniVreme', [VremeController::class, 'izmeniVreme']);


