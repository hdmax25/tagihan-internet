<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Package;
use App\Models\Bill;

class DashboardController extends Controller
{
    public function index()
    {
        $totalCustomers = Customer::count();
        $totalPackages  = Package::count();
        $paidBills      = Bill::where('status', 'paid')->count();
        $unpaidBills    = Bill::where('status', 'unpaid')->count();
        $latestBills    = Bill::with(['customer', 'package'])
                            ->latest()->take(5)->get();

        return view('dashboard', compact(
            'totalCustomers',
            'totalPackages',
            'paidBills',
            'unpaidBills',
            'latestBills'
        ));
    }
}