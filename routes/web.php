<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
Route::view('/usuarios', 'usuarios');
Route::view('/logeo', 'logeo');
Route::post('/logeo', function () {
    $credentials = request()->only('email', 'password');
    if (Auth::attempt($credentials)) {
        request()->session()->regenerate();
        return 'logeado con éxito';
    }
    return 'logeado sin éxito';
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
