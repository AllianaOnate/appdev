<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
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
});

Route::get('/login' , [LoginController::class, 'LoginView']);

Route::get('/admin' , function(){
    return view('pageredirection.admin');
});

Route::get('/user' , function(){
    return view('pageredirection.user');
});

//post
Route::post('/login' , [LoginController::class, 'login'])->name('user.login');



