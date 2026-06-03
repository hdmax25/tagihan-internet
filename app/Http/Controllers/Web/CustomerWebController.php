<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerWebController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'address' => 'required|string',
            'phone'   => 'required|string|max:20',
            'email'   => 'required|email|unique:customers,email',
        ]);
        Customer::create($request->all());
        return redirect()->route('customers.index')
               ->with('success', 'Pelanggan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);
        $request->validate([
            'name'    => 'required|string|max:255',
            'address' => 'required|string',
            'phone'   => 'required|string|max:20',
            'email'   => 'required|email|unique:customers,email,' . $id,
        ]);
        $customer->update($request->all());
        return redirect()->route('customers.index')
               ->with('success', 'Pelanggan berhasil diupdate!');
    }

    public function destroy($id)
    {
        Customer::findOrFail($id)->delete();
        return redirect()->route('customers.index')
               ->with('success', 'Pelanggan berhasil dihapus!');
    }
}