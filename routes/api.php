<?php

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

// http://127.0.0.1:8000/api/get-featured-product
// http://127.0.0.1:8000/api/get-best-seller-product
// http://127.0.0.1:8000/api/get-all-category
// http://127.0.0.1:8000/api/get-all-category-product/{id}
// http://127.0.0.1:8000/api/get-all-sub-category-product/{id}
// http://127.0.0.1:8000/api/get-bread-crumb/{id}/{type}
// http://127.0.0.1:8000/api/product-image-gallery/{id}
