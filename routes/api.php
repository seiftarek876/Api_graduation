<?php

use App\Http\Controllers\api\BinsAuthController;
use App\Http\Controllers\api\UserAuthController;
use App\Http\Controllers\api\BinsUpdateDeleteController;
use App\Http\Controllers\api\EndPointsController;
use App\Http\Controllers\api\ResetPasswordController;
use App\Http\Controllers\api\TrashThrownsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('signIn', [UserAuthController::class, 'signIn']);
Route::post('signUp', [UserAuthController::class, 'signUp']);
Route::patch('edit/{id}', [UserAuthController::class, 'update']);
Route::post('reset', [ResetPasswordController::class, 'store']);
Route::get('user', [UserAuthController::class, 'show']);
Route::get('analysis', [EndPointsController::class, 'index']);
Route::apiResource('bins', BinsAuthController::class);
Route::apiResource('throwns', TrashThrownsController::class);
