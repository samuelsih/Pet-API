<?php

use App\Http\Controllers\PetController;
use App\Http\Controllers\TaxonomyController;
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

Route::resource('taxonomies', TaxonomyController::class)->only('index', 'store', 'show', 'update', 'destroy');
Route::resource('pets', PetController::class);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::apiResource('/taxonomies', TaxonomyController::class);
