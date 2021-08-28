<?php
use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\ColorController;

Route::get('/', [
    'uses'=>'App\Http\Controllers\AdminLoginController@login',
    'as'=>'/',
    'middleware'=>['guest']
]);

Route::get('/dashboard', [
    'uses'=>'App\Http\Controllers\AdminDashboardController@index',
    'as'=>'dashboard',
    'middleware'=>['auth:sanctum', 'verified']
]);

//Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    return view('dashboard');
//})->name('dashboard');

if (App\Models\User::exists()){
    Route::get('/register', function() {
        return redirect('/login');
    });
}