<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\InputsController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// User Controller
Route::post('/addUsers', [UserController::class, 'addUsers']);
Route::get('/getUsers', [UserController::class, 'getUsers']);

// Inputs controller
Route::get('/getInputs/{name}', [InputsController::class, 'getInputs']);
