<?php

use App\Http\Controllers\courseController;
use App\Http\Controllers\studentController;
use App\Http\Controllers\studentCourseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\AuthMiddleware;
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
// Route::get('/allCourses', [courseController::class,'index']);
// Route::get('oneCourse/{id}', [courseController::class,'show']);
// Route::post('Add', [courseController::class,'store']);
// Route::put('edit/{id}', [courseController::class,'update']);
// Route::delete('delete/{id}', [courseController::class,'destroy']);
Route::post('register', [AuthController::class,'register']);

Route::post('login', [AuthController::class,'login'])->middleware('api');
Route::group([
    'middleware' => ['api',AuthMiddleware::class],
    'prefix' => 'auth'

], function ($router) {

    Route::apiResource('cousre',courseController::class);
    Route::apiResource('student',studentController::class);
    Route::apiResource('studentCourse',studentCourseController::class);
    Route::get('logout', [AuthController::class,'logout']);
    Route::get('me', [AuthController::class,'me']);

});
