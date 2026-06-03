@extends('layouts.app')

@section('title', 'Edit Paket Internet')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-white py-3">
                <h6 class="mb-0">✏️ Edit Paket Internet</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('packages.update', $package->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nama Paket</label>
                        <input type="text" name="name"
                               class="form-control @error('name') is-invalid @enderror"
                               value="{{ old('name', $package->name) }}">
                        @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Bandwidth (Mbps)</label>
                        <input type="number" name="bandwidth"
                               class="form-control @error('bandwidth') is-invalid @enderror"
                               value="{{ old('bandwidth', $package->bandwidth) }}">
                        @error('bandwidth')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Harga per Bulan (Rp)</label>
                        <input type="number" name="price"
                               class="form-control @error('price') is-invalid @enderror"
                               value="{{ old('price', $package->price) }}">
                        @error('price')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Deskripsi</label>
                        <textarea name="description"
                                  class="form-control @error('description') is-invalid @enderror"
                                  rows="3">{{ old('description', $package->description) }}</textarea>
                        @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-warning">💾 Update</button>
                        <a href="{{ route('packages.index') }}" class="btn btn-secondary">❌ Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection