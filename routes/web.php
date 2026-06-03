<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\DashboardController;
use App\Http\Controllers\Web\CustomerWebController;
use App\Http\Controllers\Web\PackageWebController;
use App\Http\Controllers\Web\BillWebController;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('customers', CustomerWebController::class);
Route::resource('packages', PackageWebController::class);
Route::resource('bills', BillWebController::class);