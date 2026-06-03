@extends('layouts.app')

@section('title', 'Edit Tagihan')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-white py-3">
                <h6 class="mb-0">✏️ Edit Tagihan</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('bills.update', $bill->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Pelanggan</label>
                        <select name="customer_id" class="form-select @error('customer_id') is-invalid @enderror">
                            @foreach($customers as $customer)
                                <option value="{{ $customer->id }}"
                                    {{ old('customer_id', $bill->customer_id) == $customer->id ? 'selected' : '' }}>
                                    {{ $customer->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('customer_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Paket Internet</label>
                        <select name="package_id" class="form-select @error('package_id') is-invalid @enderror">
                            @foreach($packages as $package)
                                <option value="{{ $package->id }}"
                                    {{ old('package_id', $bill->package_id) == $package->id ? 'selected' : '' }}>
                                    {{ $package->name }} - Rp {{ number_format($package->price, 0, ',', '.') }}
                                </option>
                            @endforeach
                        </select>
                        @error('package_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Bulan</label>
                            <select name="month" class="form-select">
                                @foreach(range(1,12) as $m)
                                    <option value="{{ $m }}"
                                        {{ old('month', $bill->month) == $m ? 'selected' : '' }}>
                                        {{ \Carbon\Carbon::create()->month($m)->format('F') }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Tahun</label>
                            <input type="number" name="year" class="form-control"
                                   value="{{ old('year', $bill->year) }}">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Jumlah Tagihan (Rp)</label>
                        <input type="number" name="amount" class="form-control"
                               value="{{ old('amount', $bill->amount) }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Status</label>
                        <select name="status" class="form-select">
                            <option value="unpaid" {{ old('status', $bill->status) == 'unpaid' ? 'selected' : '' }}>⏳ Belum Lunas</option>
                            <option value="paid" {{ old('status', $bill->status) == 'paid' ? 'selected' : '' }}>✅ Lunas</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Tanggal Jatuh Tempo</label>
                        <input type="date" name="due_date" class="form-control"
                               value="{{ old('due_date', $bill->due_date) }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Tanggal Bayar (opsional)</label>
                        <input type="date" name="paid_date" class="form-control"
                               value="{{ old('paid_date', $bill->paid_date) }}">
                    </div>
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-warning">💾 Update</button>
                        <a href="{{ route('bills.index') }}" class="btn btn-secondary">❌ Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection