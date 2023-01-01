<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');


Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login');


Route::get('register', [AuthController::class, 'register_view'])->name('register');
Route::post('register', [AuthController::class, 'register'])->name('register');



Route::get('/userformview', [AuthController::class, 'view'])->name('userform.view');
Route::post('/userformview', [AuthController::class, 'update'])->name('userform.view');

Route::post('/upload-image', [AuthController::class, 'upload'])->name('userform.upload');

Route::get('userform/list', [AuthController::class, 'getdata'])->name('userform.getdata');

Route::get('logout', [AuthController::class, 'logout'])->name('logout');
