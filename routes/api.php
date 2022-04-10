<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;

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

Route::group(['prefix' => 'v1'], function () {

    Route::post('customer', [CustomerController::class, 'store'])->name('store.customer');
    Route::get('customers', [CustomerController::class, 'index'])->name('all.customers');
    Route::get('customer/{customer}', [CustomerController::class, 'show'])->name('single.customer');;
    Route::put('customer/{customer}', [CustomerController::class, 'update'])->name('update.customer');;
    Route::delete('customer/{customer}', [CustomerController::class, 'destroy'])->name('delete.customer');;
});
