<?php

use App\Http\Controllers\AjoutDesAmisController;
use App\Http\Controllers\DashbordController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/ajoutdesamis', [AjoutDesAmisController::class, 'index'])->name('ajoutdesamis');
Route::get('/dashbord', [DashbordController::class, 'index'])->name('dashbord');