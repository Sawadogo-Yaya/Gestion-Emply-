<?php

use Illuminate\Support\Facades\Route;
use Filament\Facades\Filament;
use Filament\Http\Controllers\AssetController;
use Filament\Http\Responses\Auth\Contracts\LogoutResponse;
use Illuminate\Http\Request;


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

/* Route::get('/', function () {
    return view('welcome');
}); */
if ($loginPage = config('filament.auth.pages.login')) {
                Route::get('/', $loginPage)->name('auth.login');
            }