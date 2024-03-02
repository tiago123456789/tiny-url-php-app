<?php

use App\Http\Controllers\TinyUrlController;
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
    return view('welcome');
});

Route::get("/generate-tiny-url",  function () {
    return view("tiny-url");
});

Route::post("/generate-tiny-url", [TinyUrlController::class, "generate"]);

Route::get("/links/{hash}", [TinyUrlController::class, "redirectTo"]);
