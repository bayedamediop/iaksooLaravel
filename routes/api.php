<?php

use App\Http\Controllers\API\PublicationController;
use App\Http\Controllers\API\UserController;
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
Route::post('login', [UserController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
   // Users
    Route::post('userCreat', [UserController::class, 'creation']);
    Route::get('getUsers', [UserController::class, 'getUsers']);
    Route::get('getUserById/{id}', [UserController::class, 'getUserById']);
    Route::post('updateUser/{id}', [UserController::class, 'updateUser']);
    Route::delete('deleteUser/{id}', [UserController::class, 'deleteUser']);
    Route::delete('archiveUser/{id}', [UserController::class, 'archiveUser']);
    Route::get('listAdminAgenece', [UserController::class, 'listAdminAgenece']);


    //Publication

    Route::post("creationPublication",[PublicationController::class,'creationPublication']);
});
