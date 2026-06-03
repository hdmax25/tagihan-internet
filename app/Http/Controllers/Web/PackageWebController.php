<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;

class PackageWebController extends Controller
{
    public function index()
    {
        $packages = Package::all();
        return view('packages.index', compact('packages'));
    }

    public function create()
    {
        return view('packages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'bandwidth'   => 'required|integer',
            'price'       => 'required|numeric',
            'description' => 'nullable|string',
        ]);
        Package::create($request->all());
        return redirect()->route('packages.index')
               ->with('success', 'Paket berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $package = Package::findOrFail($id);
        return view('packages.edit', compact('package'));
    }

    public function update(Request $request, $id)
    {
        $package = Package::findOrFail($id);
        $request->validate([
            'name'        => 'required|string|max:255',
            'bandwidth'   => 'required|integer',
            'price'       => 'required|numeric',
            'description' => 'nullable|string',
        ]);
        $package->update($request->all());
        return redirect()->route('packages.index')
               ->with('success', 'Paket berhasil diupdate!');
    }

    public function destroy($id)
    {
        Package::findOrFail($id)->delete();
        return redirect()->route('packages.index')
               ->with('success', 'Paket berhasil dihapus!');
    }
}