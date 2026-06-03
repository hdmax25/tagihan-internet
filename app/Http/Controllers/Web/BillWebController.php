<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\Customer;
use App\Models\Package;
use Illuminate\Http\Request;

class BillWebController extends Controller
{
    public function index()
    {
        $bills = Bill::with(['customer', 'package'])->get();
        return view('bills.index', compact('bills'));
    }

    public function create()
    {
        $customers = Customer::all();
        $packages  = Package::all();
        return view('bills.create', compact('customers', 'packages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'package_id'  => 'required|exists:packages,id',
            'month'       => 'required|integer|min:1|max:12',
            'year'        => 'required|integer',
            'amount'      => 'required|numeric',
            'status'      => 'in:unpaid,paid',
            'due_date'    => 'required|date',
            'paid_date'   => 'nullable|date',
        ]);
        Bill::create($request->all());
        return redirect()->route('bills.index')
               ->with('success', 'Tagihan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $bill      = Bill::findOrFail($id);
        $customers = Customer::all();
        $packages  = Package::all();
        return view('bills.edit', compact('bill', 'customers', 'packages'));
    }

    public function update(Request $request, $id)
    {
        $bill = Bill::findOrFail($id);
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'package_id'  => 'required|exists:packages,id',
            'month'       => 'required|integer|min:1|max:12',
            'year'        => 'required|integer',
            'amount'      => 'required|numeric',
            'status'      => 'in:unpaid,paid',
            'due_date'    => 'required|date',
            'paid_date'   => 'nullable|date',
        ]);
        $bill->update($request->all());
        return redirect()->route('bills.index')
               ->with('success', 'Tagihan berhasil diupdate!');
    }

    public function destroy($id)
    {
        Bill::findOrFail($id)->delete();
        return redirect()->route('bills.index')
               ->with('success', 'Tagihan berhasil dihapus!');
    }
}