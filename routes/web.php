<?php

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
//Font page
Route::get('/', 'App\Http\Controllers\Index@index');
//Monitor funcation
Route::get('monitor', 'App\Http\Controllers\Index@monitor');
//Proxy function
Route::get('proxy', 'App\Http\Controllers\Index@proxy');