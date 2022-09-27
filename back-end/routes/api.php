<?php

use App\Http\Controllers\API\APIController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/* ------------------- Routes --------------------- */
# Insert customers
Route::post('/AddCustomer', 'APIController@onCreateCustomer');
# View customers
Route::get('/ViewCustomers', 'APIController@onGetCustomer');
// Route::post('/baqir', [APIController::class, 'onCreateCustomer']);
/* -------------------/. Routes --------------------- */