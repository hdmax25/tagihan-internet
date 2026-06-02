<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::all();
        return response()->json([
            'success' => true,
            'data' => $packages
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'bandwidth'   => 'required|integer',
            'price'       => 'required|numeric',
            'description' => 'nullable|string',
        ]);

        $package = Package::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Paket berhasil ditambahkan',
            'data'    => $package
        ], 201);
    }

    public function show($id)
    {
        $package = Package::find($id);

        if (!$package) {
            return response()->json([
                'success' => false,
                'message' => 'Paket tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data'    => $package
        ]);
    }

    public function update(Request $request, $id)
    {
        $package = Package::find($id);

        if (!$package) {
            return response()->json([
                'success' => false,
                'message' => 'Paket tidak ditemukan'
            ], 404);
        }

        $request->validate([
            'name'        => 'string|max:255',
            'bandwidth'   => 'integer',
            'price'       => 'numeric',
            'description' => 'nullable|string',
        ]);

        $package->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Paket berhasil diupdate',
            'data'    => $package
        ]);
    }

    public function destroy($id)
    {
        $package = Package::find($id);

        if (!$package) {
            return response()->json([
                'success' => false,
                'message' => 'Paket tidak ditemukan'
            ], 404);
        }

        $package->delete();

        return response()->json([
            'success' => true,
            'message' => 'Paket berhasil dihapus'
        ]);
    }
}