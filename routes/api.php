<?php

use App\Http\Controllers\Api\BarangController;
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

Route::get('barang', [BarangController::class, 'index']);
Route::post('barang/store', [BarangController::class, 'store']);
Route::get('barang/show/{id}', [BarangController::class, 'show']);
Route::post('barang/update/{id}', [BarangController::class, 'update']);
Route::get('barang/destroy/{id}', [BarangController::class, 'destroy']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
