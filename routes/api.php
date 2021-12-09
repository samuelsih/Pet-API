<?php

use App\Http\Controllers\AuthController;
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

//auth
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);


//public api
Route::resource('taxonomies', TaxonomyController::class)->only('index', 'show');
Route::resource('pets', PetController::class)->only('index', 'show');


Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::resource('pets', PetController::class)->only('store', 'update', 'destroy');
    Route::resource('taxonomies', TaxonomyController::class)->only('store', 'update', 'destroy');

    Route::post('logout',  [AuthController::class, 'logout']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::apiResource('/taxonomies', TaxonomyController::class);
