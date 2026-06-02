<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use Illuminate\Http\Request;

class BillController extends Controller
{
    public function index()
    {
        $bills = Bill::with(['customer', 'package'])->get();
        return response()->json([
            'success' => true,
            'data' => $bills
        ]);
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

        $bill = Bill::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Tagihan berhasil ditambahkan',
            'data'    => $bill->load(['customer', 'package'])
        ], 201);
    }

    public function show($id)
    {
        $bill = Bill::with(['customer', 'package'])->find($id);

        if (!$bill) {
            return response()->json([
                'success' => false,
                'message' => 'Tagihan tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data'    => $bill
        ]);
    }

    public function update(Request $request, $id)
    {
        $bill = Bill::find($id);

        if (!$bill) {
            return response()->json([
                'success' => false,
                'message' => 'Tagihan tidak ditemukan'
            ], 404);
        }

        $request->validate([
            'customer_id' => 'exists:customers,id',
            'package_id'  => 'exists:packages,id',
            'month'       => 'integer|min:1|max:12',
            'year'        => 'integer',
            'amount'      => 'numeric',
            'status'      => 'in:unpaid,paid',
            'due_date'    => 'date',
            'paid_date'   => 'nullable|date',
        ]);

        $bill->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Tagihan berhasil diupdate',
            'data'    => $bill->load(['customer', 'package'])
        ]);
    }

    public function destroy($id)
    {
        $bill = Bill::find($id);

        if (!$bill) {
            return response()->json([
                'success' => false,
                'message' => 'Tagihan tidak ditemukan'
            ], 404);
        }

        $bill->delete();

        return response()->json([
            'success' => true,
            'message' => 'Tagihan berhasil dihapus'
        ]);
    }
}