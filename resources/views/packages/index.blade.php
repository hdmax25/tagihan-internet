@extends('layouts.app')

@section('title', 'Data Paket Internet')

@section('content')

<div class="card">
    <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
        <h6 class="mb-0">📦 Daftar Paket Internet</h6>
        <a href="{{ route('packages.create') }}" class="btn btn-primary btn-sm">
            ➕ Tambah Paket
        </a>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4">No</th>
                        <th>Nama Paket</th>
                        <th>Bandwidth</th>
                        <th>Harga/Bulan</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($packages as $package)
                    <tr>
                        <td class="ps-4">{{ $loop->iteration }}</td>
                        <td><strong>{{ $package->name }}</strong></td>
                        <td>
                            <span class="badge bg-info text-dark">
                                {{ $package->bandwidth }} Mbps
                            </span>
                        </td>
                        <td>Rp {{ number_format($package->price, 0, ',', '.') }}</td>
                        <td>{{ $package->description }}</td>
                        <td>
                            <a href="{{ route('packages.edit', $package->id) }}"
                               class="btn btn-warning btn-sm">✏️ Edit</a>
                            <form action="{{ route('packages.destroy', $package->id) }}"
                                  method="POST" class="d-inline"
                                  onsubmit="return confirm('Yakin hapus paket ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">🗑️ Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection