@extends('layouts.app')

@section('title', 'Tambah Tagihan')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-white py-3">
                <h6 class="mb-0">➕ Tambah Tagihan Baru</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('bills.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Pelanggan</label>
                        <select name="customer_id" class="form-select @error('customer_id') is-invalid @enderror">
                            <option value="">-- Pilih Pelanggan --</option>
                            @foreach($customers as $customer)
                                <option value="{{ $customer->id }}"
                                    {{ old('customer_id') == $customer->id ? 'selected' : '' }}>
                                    {{ $customer->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('customer_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Paket Internet</label>
                        <select name="package_id" class="form-select @error('package_id') is-invalid @enderror">
                            <option value="">-- Pilih Paket --</option>
                            @foreach($packages as $package)
                                <option value="{{ $package->id }}"
                                    {{ old('package_id') == $package->id ? 'selected' : '' }}>
                                    {{ $package->name }} - Rp {{ number_format($package->price, 0, ',', '.') }}
                                </option>
                            @endforeach
                        </select>
                        @error('package_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Bulan</label>
                            <select name="month" class="form-select @error('month') is-invalid @enderror">
                                <option value="">-- Pilih Bulan --</option>
                                @foreach(range(1,12) as $m)
                                    <option value="{{ $m }}" {{ old('month') == $m ? 'selected' : '' }}>
                                        {{ \Carbon\Carbon::create()->month($m)->format('F') }}
                                    </option>
                                @endforeach
                            </select>
                            @error('month')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Tahun</label>
                            <input type="number" name="year"
                                   class="form-control @error('year') is-invalid @enderror"
                                   value="{{ old('year', date('Y')) }}">
                            @error('year')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Jumlah Tagihan (Rp)</label>
                        <input type="number" name="amount"
                               class="form-control @error('amount') is-invalid @enderror"
                               value="{{ old('amount') }}"
                               placeholder="Contoh: 100000">
                        @error('amount')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Status</label>
                        <select name="status" class="form-select @error('status') is-invalid @enderror">
                            <option value="unpaid" {{ old('status') == 'unpaid' ? 'selected' : '' }}>⏳ Belum Lunas</option>
                            <option value="paid" {{ old('status') == 'paid' ? 'selected' : '' }}>✅ Lunas</option>
                        </select>
                        @error('status')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Tanggal Jatuh Tempo</label>
                        <input type="date" name="due_date"
                               class="form-control @error('due_date') is-invalid @enderror"
                               value="{{ old('due_date') }}">
                        @error('due_date')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Tanggal Bayar (opsional)</label>
                        <input type="date" name="paid_date"
                               class="form-control @error('paid_date') is-invalid @enderror"
                               value="{{ old('paid_date') }}">
                        @error('paid_date')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">💾 Simpan</button>
                        <a href="{{ route('bills.index') }}" class="btn btn-secondary">❌ Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection