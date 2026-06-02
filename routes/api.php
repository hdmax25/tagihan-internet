<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\BillController;

Route::apiResource('customers', CustomerController::class);
Route::apiResource('packages', PackageController::class);
Route::apiResource('bills', BillController::class);