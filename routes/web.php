<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('allcustomer',[CustomerController::class,'index']);
Route::get('addcustomer',[CustomerController::class,'create']);
Route::post('addcustomer',[CustomerController::class,'store']);
Route::get('editcustomer/{id}',[CustomerController::class,'edit']);
Route::post('editcustomer/{id}',[CustomerController::class,'update']);
Route::get('deletecustomer/{id}',[CustomerController::class,'destroy']);

