<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIWarrantyRegistrationController;
use App\Http\Controllers\APIComplaintRegistrationController;


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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


// Warranty Registration API

Route::get('v1',   [APIWarrantyRegistrationController::class, 'index']);
Route::post('v1', [APIWarrantyRegistrationController::class, 'store']);

Route::get('v1/product_types', [APIWarrantyRegistrationController::class, 'APIproduct_types']);
Route::get('v1/product', [APIWarrantyRegistrationController::class, 'product']);
Route::get('v1/product_model', [APIWarrantyRegistrationController::class, 'product_model']);
Route::get('v1/product_number', [APIWarrantyRegistrationController::class, 'product_number']);

// Complaint Registration API
// Get All && Search
Route::get('cR', [APIComplaintRegistrationController::class, 'index']);
// Post Data
Route::post('cR', [APIComplaintRegistrationController::class, 'store']);



