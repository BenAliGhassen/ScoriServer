<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/Csrf', function () {
    return response()->json(['csrf_token' => csrf_token()]);
});


Route::post('/score',[userController::class,'store']);

Route::get('/ranking',[userController::class,'show']);
