<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use Illuminate\Http\Request;

class BillController extends Controller
{
    public function index()
    {
        $bills = Bill::with(['customer', 'package'])->get();
        return response()->json(['success' => true, 'data' => $bills]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'package_id'  => 'required|exists:packages,id',
            'month'       => 'required|integer|min:1|max:12',
            'year'        => 'required|integer',
            'amount'      => 'required|numeric',
            'due_date'    => 'required|date',
        ]);
        $bill = Bill::create($request->all());
        return response()->json(['success' => true, 'message' => 'Tagihan berhasil ditambahkan', 'data' => $bill->load(['customer','package'])], 201);
    }

    public function show($id)
    {
        $bill = Bill::with(['customer','package'])->find($id);
        if (!$bill) return response()->json(['success' => false, 'message' => 'Tidak ditemukan'], 404);
        return response()->json(['success' => true, 'data' => $bill]);
    }

    public function update(Request $request, $id)
    {
        $bill = Bill::find($id);
        if (!$bill) return response()->json(['success' => false, 'message' => 'Tidak ditemukan'], 404);
        $bill->update($request->all());
        return response()->json(['success' => true, 'message' => 'Berhasil diupdate', 'data' => $bill->load(['customer','package'])]);
    }

    public function destroy($id)
    {
        $bill = Bill::find($id);
        if (!$bill) return response()->json(['success' => false, 'message' => 'Tidak ditemukan'], 404);
        $bill->delete();
        return response()->json(['success' => true, 'message' => 'Berhasil dihapus']);
    }
}