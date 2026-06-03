<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return response()->json(['success' => true, 'data' => $customers]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'address' => 'required|string',
            'phone'   => 'required|string|max:20',
            'email'   => 'required|email|unique:customers,email',
        ]);
        $customer = Customer::create($request->all());
        return response()->json(['success' => true, 'message' => 'Pelanggan berhasil ditambahkan', 'data' => $customer], 201);
    }

    public function show($id)
    {
        $customer = Customer::with('bills')->find($id);
        if (!$customer) return response()->json(['success' => false, 'message' => 'Tidak ditemukan'], 404);
        return response()->json(['success' => true, 'data' => $customer]);
    }

    public function update(Request $request, $id)
    {
        $customer = Customer::find($id);
        if (!$customer) return response()->json(['success' => false, 'message' => 'Tidak ditemukan'], 404);
        $customer->update($request->all());
        return response()->json(['success' => true, 'message' => 'Berhasil diupdate', 'data' => $customer]);
    }

    public function destroy($id)
    {
        $customer = Customer::find($id);
        if (!$customer) return response()->json(['success' => false, 'message' => 'Tidak ditemukan'], 404);
        $customer->delete();
        return response()->json(['success' => true, 'message' => 'Berhasil dihapus']);
    }
}