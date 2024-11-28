<?php

use App\Models\Task;
use Illuminate\Http\Request;
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
Route::get('/Tasks', [Task::class, 'index']);
Route::post('/Tasks', [Task::class, 'store']);
Route::get('/Tasks/{id}', [Task::class, 'show']);
Route::put('/Tasks/{id}', [Task::class, 'completed']);
Route::patch('/Tasks/{id}', [Task::class, 'restore']);

