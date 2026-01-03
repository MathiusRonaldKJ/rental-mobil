@extends('layouts.app')

@section('title', $kendaraan->nama_kendaraan)

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-4">
                        <div>
                            <h1 class="card-title">{{ $kendaraan->nama_kendaraan }}</h1>
                            <span class="badge bg-{{ $kendaraan->jenis_kendaraan == 'penumpang' ? 'info' : 'warning' }} fs-6">
                                {{ ucfirst($kendaraan->jenis_kendaraan) }}
                            </span>
                            <span class="badge bg-{{ $kendaraan->status ? 'success' : 'danger' }} fs-6 ms-2">
                                {{ $kendaraan->status ? 'Tersedia' : 'Tidak Tersedia' }}
                            </span>
                        </div>
                        <h3 class="text-primary">{{ $kendaraan->harga_sewa_formatted }}/hari</h3>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="card bg-light">
                                <div class="card-body">
                                    <h6 class="card-subtitle mb-2 text-muted">Spesifikasi</h6>
                                    <ul class="list-unstyled">
                                        <li class="mb-2">
                                            <i class="bi bi-people"></i> 
                                            <strong>Kapasitas:</strong> {{ $kendaraan->kapasitas }} {{ $kendaraan->satuan_kapasitas }}
                                        </li>
                                        <li class="mb-2">
                                            <i class="bi bi-tag"></i> 
                                            <strong>Jenis:</strong> {{ ucfirst($kendaraan->jenis_kendaraan) }}
                                        </li>
                                        <li>
                                            <i class="bi bi-calendar-check"></i> 
                                            <strong>Status:</strong> 
                                            <span class="badge bg-{{ $kendaraan->status ? 'success' : 'danger' }}">
                                                {{ $kendaraan->status ? 'Tersedia untuk Disewa' : 'Tidak Tersedia' }}
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card bg-light">
                                <div class="card-body">
                                    <h6 class="card-subtitle mb-2 text-muted">Informasi Sewa</h6>
                                    <ul class="list-unstyled">
                                        <li class="mb-2">
                                            <i class="bi bi-cash"></i> 
                                            <strong>Harga Sewa:</strong> {{ $kendaraan->harga_sewa_formatted }}/hari
                                        </li>
                                        <li class="mb-2">
                                            <i class="bi bi-clock"></i> 
                                            <strong>Minimal Sewa:</strong> 1 hari
                                        </li>
                                        <li>
                                            <i class="bi bi-credit-card"></i> 
                                            <strong>Pembayaran:</strong> Transfer Bank / Tunai
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <h5>Deskripsi</h5>
                        <p class="card-text">{{ $kendaraan->deskripsi ?: 'Tidak ada deskripsi tersedia.' }}</p>
                    </div>

                    <div class="alert alert-info">
                        <i class="bi bi-info-circle"></i> 
                        <strong>Informasi Penting:</strong> 
                        Pastikan untuk membaca syarat dan ketentuan penyewaan sebelum melakukan pemesanan.
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card sticky-top" style="top: 80px;">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="bi bi-calendar-plus"></i> Sewa Kendaraan Ini</h5>
                </div>
                <div class="card-body">
                    @if($kendaraan->status)
                        <div class="text-center mb-4">
                            <h3 class="text-primary">{{ $kendaraan->harga_sewa_formatted }}</h3>
                            <p class="text-muted">per hari</p>
                        </div>
                        
                        <div class="d-grid gap-2">
                            <a href="{{ route('pemesanan.create', $kendaraan) }}" 
                               class="btn btn-primary btn-lg">
                                <i class="bi bi-calendar-plus"></i> Pesan Sekarang
                            </a>
                            <a href="{{ route('kendaraan.index') }}" 
                               class="btn btn-outline-secondary">
                                <i class="bi bi-arrow-left"></i> Lihat Kendaraan Lain
                            </a>
                        </div>
                    @else
                        <div class="alert alert-warning text-center">
                            <i class="bi bi-exclamation-triangle"></i>
                            <h5>Kendaraan Tidak Tersedia</h5>
                            <p class="mb-0">Kendaraan ini sedang tidak tersedia untuk disewa.</p>
                        </div>
                        <a href="{{ route('kendaraan.index') }}" 
                           class="btn btn-primary w-100">
                            <i class="bi bi-search"></i> Cari Kendaraan Lain
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection