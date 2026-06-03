@extends('layouts.app')

@section('title', 'Tambah Paket Internet')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-white py-3">
                <h6 class="mb-0">➕ Tambah Paket Internet Baru</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('packages.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nama Paket</label>
                        <input type="text" name="name"
                               class="form-control @error('name') is-invalid @enderror"
                               value="{{ old('name') }}"
                               placeholder="Contoh: Paket Basic">
                        @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Bandwidth (Mbps)</label>
                        <input type="number" name="bandwidth"
                               class="form-control @error('bandwidth') is-invalid @enderror"
                               value="{{ old('bandwidth') }}"
                               placeholder="Contoh: 10">
                        @error('bandwidth')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Harga per Bulan (Rp)</label>
                        <input type="number" name="price"
                               class="form-control @error('price') is-invalid @enderror"
                               value="{{ old('price') }}"
                               placeholder="Contoh: 100000">
                        @error('price')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Deskripsi</label>
                        <textarea name="description"
                                  class="form-control @error('description') is-invalid @enderror"
                                  rows="3"
                                  placeholder="Deskripsi paket internet">{{ old('description') }}</textarea>
                        @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">💾 Simpan</button>
                        <a href="{{ route('packages.index') }}" class="btn btn-secondary">❌ Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection