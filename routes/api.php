<?php

use App\Http\Controllers\ExampleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/', function () {
    return "Api running...";
});

Route::post('/', function () {
    return "Api running...";
});

Route::get('example', [ExampleController::class, "index"]);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
