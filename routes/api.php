<?php
use App\Http\Controllers\Api\ProjectController;
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

Route::get('/projects' ,[ProjectController::class,'index']);



// Laravel va a prendersi la chiave primaria ovvero l'id - noi vogliamo invece lo slug - quindi dobbiamo dirgli che colonna utilizzare {project:slug}
Route::get('/projects/{project:slug}' ,[ProjectController::class,'show']);
