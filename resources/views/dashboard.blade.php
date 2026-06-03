@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

{{-- STAT CARDS --}}
<div class="row g-4 mb-4">
    <div class="col-md-3">
        <div class="stat-card" style="background: linear-gradient(135deg, #667eea, #764ba2)">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <p class="mb-1 opacity-75">Total Pelanggan</p>
                    <h2 class="mb-0 fw-bold">{{ $totalCustomers }}</h2>
                </div>
                <span style="font-size: 2.5rem">👥</span>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card" style="background: linear-gradient(135deg, #f093fb, #f5576c)">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <p class="mb-1 opacity-75">Total Paket</p>
                    <h2 class="mb-0 fw-bold">{{ $totalPackages }}</h2>
                </div>
                <span style="font-size: 2.5rem">📦</span>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card" style="background: linear-gradient(135deg, #4facfe, #00f2fe)">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <p class="mb-1 opacity-75">Tagihan Lunas</p>
                    <h2 class="mb-0 fw-bold">{{ $paidBills }}</h2>
                </div>
                <span style="font-size: 2.5rem">✅</span>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card" style="background: linear-gradient(135deg, #fa709a, #fee140)">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <p class="mb-1 opacity-75">Belum Lunas</p>
                    <h2 class="mb-0 fw-bold">{{ $unpaidBills }}</h2>
                </div>
                <span style="font-size: 2.5rem">⏳</span>
            </div>
        </div>
    </div>
</div>

{{-- TABEL TAGIHAN TERBARU --}}
<div class="card">
    <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
        <h6 class="mb-0">🧾 Tagihan Terbaru</h6>
        <a href="{{ route('bills.index') }}" class="btn btn-sm btn-primary">Lihat Semua</a>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4">Pelanggan</th>
                        <th>Paket</th>
                        <th>Bulan/Tahun</th>
                        <th>Jumlah</th>
                        <th>Status</th>
                        <th>Jatuh Tempo</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($latestBills as $bill)
                    <tr>
                        <td class="ps-4">{{ $bill->customer->name }}</td>
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
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection