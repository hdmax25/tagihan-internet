<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\BillController;

Route::apiResource('customers', CustomerController::class)->names([
    'index'   => 'api.customers.index',
    'store'   => 'api.customers.store',
    'show'    => 'api.customers.show',
    'update'  => 'api.customers.update',
    'destroy' => 'api.customers.destroy',
]);

Route::apiResource('packages', PackageController::class)->names([
    'index'   => 'api.packages.index',
    'store'   => 'api.packages.store',
    'show'    => 'api.packages.show',
    'update'  => 'api.packages.update',
    'destroy' => 'api.packages.destroy',
]);

Route::apiResource('bills', BillController::class)->names([
    'index'   => 'api.bills.index',
    'store'   => 'api.bills.store',
    'show'    => 'api.bills.show',
    'update'  => 'api.bills.update',
    'destroy' => 'api.bills.destroy',
]);