<?php

use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('login');
});
Route::get('/signup', function () {
    return view('signup');
});
Route::post('/login', [Auth::class, 'login']);
Route::get('/logout', [Auth::class, 'logout']);
Route::post('/register', [Auth::class, 'signup']);
Route::get('/dashboard', function () {
    return view('welcome');
});
