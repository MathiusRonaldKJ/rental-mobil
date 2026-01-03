@extends('layouts.app')

@section('title', 'Edit Kendaraan')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-warning text-white">
                    <h4 class="mb-0"><i class="bi bi-pencil"></i> Edit Kendaraan: {{ $kendaraan->nama_kendaraan }}</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.kendaraan.update', $kendaraan) }}">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="jenis_kendaraan" class="form-label">Jenis Kendaraan *</label>
                                <select class="form-select @error('jenis_kendaraan') is-invalid @enderror" 
                                        id="jenis_kendaraan" name="jenis_kendaraan" required>
                                    <option value="penumpang" {{ $kendaraan->jenis_kendaraan == 'penumpang' ? 'selected' : '' }}>
                                        Penumpang
                                    </option>
                                    <option value="barang" {{ $kendaraan->jenis_kendaraan == 'barang' ? 'selected' : '' }}>
                                        Barang
                                    </option>
                                </select>
                                @error('jenis_kendaraan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="nama_kendaraan" class="form-label">Nama Kendaraan *</label>
                                <input type="text" class="form-control @error('nama_kendaraan') is-invalid @enderror" 
                                       id="nama_kendaraan" name="nama_kendaraan" 
                                       value="{{ old('nama_kendaraan', $kendaraan->nama_kendaraan) }}" required>
                                @error('nama_kendaraan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control @error('deskripsi') is-invalid @enderror" 
                                      id="deskripsi" name="deskripsi" rows="3">{{ old('deskripsi', $kendaraan->deskripsi) }}</textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="kapasitas" class="form-label">Kapasitas *</label>
                                <input type="number" class="form-control @error('kapasitas') is-invalid @enderror" 
                                       id="kapasitas" name="kapasitas" 
                                       value="{{ old('kapasitas', $kendaraan->kapasitas) }}" min="1" required>
                                @error('kapasitas')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="satuan_kapasitas" class="form-label">Satuan Kapasitas *</label>
                                <select class="form-select @error('satuan_kapasitas') is-invalid @enderror" 
                                        id="satuan_kapasitas" name="satuan_kapasitas" required>
                                    <option value="orang" {{ $kendaraan->satuan_kapasitas == 'orang' ? 'selected' : '' }}>
                                        Orang
                                    </option>
                                    <option value="ton" {{ $kendaraan->satuan_kapasitas == 'ton' ? 'selected' : '' }}>
                                        Ton
                                    </option>
                                </select>
                                @error('satuan_kapasitas')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="harga_sewa" class="form-label">Harga Sewa (per hari) *</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input type="number" class="form-control @error('harga_sewa') is-invalid @enderror" 
                                       id="harga_sewa" name="harga_sewa" 
                                       value="{{ old('harga_sewa', $kendaraan->harga_sewa) }}" min="0" step="1000" required>
                                @error('harga_sewa')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="status" class="form-label">Status *</label>
                            <select class="form-select @error('status') is-invalid @enderror" 
                                    id="status" name="status" required>
                                <option value="1" {{ $kendaraan->status ? 'selected' : '' }}>
                                    Tersedia
                                </option>
                                <option value="0" {{ !$kendaraan->status ? 'selected' : '' }}>
                                    Tidak Tersedia
                                </option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.kendaraan.index') }}" class="btn btn-secondary">
                                <i class="bi bi-arrow-left"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-warning">
                                <i class="bi bi-save"></i> Update Kendaraan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection