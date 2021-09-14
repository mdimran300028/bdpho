<?php
use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\ColorController;

Route::any('/', [
    'uses'=>'App\Http\Controllers\AdminLoginController@login',
    'as'=>'/',
    'middleware'=>['guest']
]);

Route::any('/dashboard', [
    'uses'=>'App\Http\Controllers\AdminDashboardController@index',
    'as'=>'dashboard',
    'middleware'=>['auth:sanctum', 'verified']
]);

//=================Division Management Routes Start===================//
Route::any('/division', [
    'uses'=>'App\Http\Controllers\DivisionManagementController@index',
    'as'=>'division',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/division-add', [
    'uses'=>'App\Http\Controllers\DivisionManagementController@store',
    'as'=>'division-add',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/division-update', [
    'uses'=>'App\Http\Controllers\DivisionManagementController@update',
    'as'=>'division-update',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/division-delete/{id}', [
    'uses'=>'App\Http\Controllers\DivisionManagementController@delete',
    'as'=>'division-delete',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/update-division-status/{id}', [
    'uses'=>'App\Http\Controllers\DivisionManagementController@updateStatus',
    'as'=>'update-division-status',
    'middleware'=>['auth:sanctum', 'verified']
]);
//=================Division Management Routes End===================//

//=================District Management Routes Start===================//
Route::any('/district', [
    'uses'=>'App\Http\Controllers\DistrictManagementController@index',
    'as'=>'district',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/district-add', [
    'uses'=>'App\Http\Controllers\DistrictManagementController@store',
    'as'=>'district-add',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/district-update', [
    'uses'=>'App\Http\Controllers\DistrictManagementController@update',
    'as'=>'district-update',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/district-delete/{id}', [
    'uses'=>'App\Http\Controllers\DistrictManagementController@delete',
    'as'=>'district-delete',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/update-district-status/{id}', [
    'uses'=>'App\Http\Controllers\DistrictManagementController@updateStatus',
    'as'=>'update-district-status',
    'middleware'=>['auth:sanctum', 'verified']
]);
//=================District Management Routes End===================//

//=================Region Management Routes Start=================//
Route::any('/region', [
    'uses'=>'App\Http\Controllers\RegionManagementController@index',
    'as'=>'region',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/region-add', [
    'uses'=>'App\Http\Controllers\RegionManagementController@store',
    'as'=>'region-add',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/region-update', [
    'uses'=>'App\Http\Controllers\RegionManagementController@update',
    'as'=>'region-update',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/region-delete/{id}', [
    'uses'=>'App\Http\Controllers\RegionManagementController@delete',
    'as'=>'region-delete',
    'middleware'=>['auth:sanctum', 'verified']
]);

Route::any('/update-region-status/{id}', [
    'uses'=>'App\Http\Controllers\RegionManagementController@updateStatus',
    'as'=>'update-region-status',
    'middleware'=>['auth:sanctum', 'verified']
]);
//=================Region Management Routes End===================//

//Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    return view('dashboard');
//})->name('dashboard');

if (App\Models\User::exists()){
    Route::get('/register', function() {
        return redirect('/login');
    });
}
