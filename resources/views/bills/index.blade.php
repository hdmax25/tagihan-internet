@extends('layouts.app')

@section('title', 'Data Tagihan')

@section('content')

<div class="card">
    <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
        <h6 class="mb-0">🧾 Daftar Tagihan</h6>
        <a href="{{ route('bills.create') }}" class="btn btn-primary btn-sm">
            ➕ Tambah Tagihan
        </a>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4">No</th>
                        <th>Pelanggan</th>
                        <th>Paket</th>
                        <th>Bulan/Tahun</th>
                        <th>Jumlah</th>
                        <th>Status</th>
                        <th>Jatuh Tempo</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bills as $bill)
                    <tr>
                        <td class="ps-4">{{ $loop->iteration }}</td>
                        <td><strong>{{ $bill->customer->name }}</strong></td>
                        <td>{{ $bill->package->name }}</td>
                        <td>{{ $bill->month }}/{{ $bill->year }}</td>
                        <td>Rp {{ number_format($bill->amount, 0, ',', '.') }}</td>
                        <td>
                            @if($bill->status == 'paid')
                                <span class="badge bg-success">✅ Lunas</span>
                            @else
                                <span class="badge bg-warning text-dark">⏳ Belum Lunas</span>
                            @endif
                        </td>
                        <td>{{ \Carbon\Carbon::parse($bill->due_date)->format('d M Y') }}</td>
                        <td>
                            <a href="{{ route('bills.edit', $bill->id) }}"
                               class="btn btn-warning btn-sm">✏️ Edit</a>
                            <form action="{{ route('bills.destroy', $bill->id) }}"
                                  method="POST" class="d-inline"
                                  onsubmit="return confirm('Yakin hapus tagihan ini?')">
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