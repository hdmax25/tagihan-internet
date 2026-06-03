@extends('layouts.app')

@section('title', 'Data Pelanggan')

@section('content')

<div class="card">
    <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
        <h6 class="mb-0">👥 Daftar Pelanggan</h6>
        <a href="{{ route('customers.create') }}" class="btn btn-primary btn-sm">
            ➕ Tambah Pelanggan
        </a>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4">No</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Telepon</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($customers as $customer)
                    <tr>
                        <td class="ps-4">{{ $loop->iteration }}</td>
                        <td><strong>{{ $customer->name }}</strong></td>
                        <td>{{ $customer->address }}</td>
                        <td>{{ $customer->phone }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>
                            <a href="{{ route('customers.edit', $customer->id) }}"
                               class="btn btn-warning btn-sm">✏️ Edit</a>
                            <form action="{{ route('customers.destroy', $customer->id) }}"
                                  method="POST" class="d-inline"
                                  onsubmit="return confirm('Yakin hapus pelanggan ini?')">
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