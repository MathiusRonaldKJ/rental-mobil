@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
<div class="container">
    <h1 class="mb-4"><i class="bi bi-speedometer2"></i> Dashboard Admin</h1>
    
    <!-- Stats Cards -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <h5 class="card-title"><i class="bi bi-truck"></i> Total Kendaraan</h5>
                    <h2>{{ $stats['total_kendaraan'] }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-success">
                <div class="card-body">
                    <h5 class="card-title"><i class="bi bi-calendar-check"></i> Total Pemesanan</h5>
                    <h2>{{ $stats['total_pemesanan'] }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-warning">
                <div class="card-body">
                    <h5 class="card-title"><i class="bi bi-people"></i> Total Users</h5>
                    <h2>{{ $stats['total_users'] }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-danger">
                <div class="card-body">
                    <h5 class="card-title"><i class="bi bi-clock-history"></i> Pending</h5>
                    <h2>{{ $stats['pemesanan_pending'] }}</h2>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="card mb-4">
        <div class="card-header">
            <h5 class="mb-0"><i class="bi bi-lightning"></i> Quick Actions</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-3 mb-2">
                    <a href="{{ route('admin.kendaraan.create') }}" class="btn btn-primary w-100">
                        <i class="bi bi-plus-circle"></i> Tambah Kendaraan
                    </a>
                </div>
                <div class="col-md-3 mb-2">
                    <a href="{{ route('admin.kendaraan.index') }}" class="btn btn-secondary w-100">
                        <i class="bi bi-list"></i> Lihat Semua Kendaraan
                    </a>
                </div>
                <div class="col-md-3 mb-2">
                    <a href="{{ route('admin.pemesanan.index') }}" class="btn btn-info w-100">
                        <i class="bi bi-card-checklist"></i> Kelola Pemesanan
                    </a>
                </div>
                <div class="col-md-3 mb-2">
                    <a href="#" class="btn btn-success w-100">
                        <i class="bi bi-file-earmark-text"></i> Laporan
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Pemesanan -->
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0"><i class="bi bi-clock-history"></i> Pemesanan Terbaru</h5>
        </div>
        <div class="card-body">
            @if($recent_pemesanans->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Kendaraan</th>
                                <th>Tanggal</th>
                                <th>Total</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($recent_pemesanans as $pemesanan)
                                <tr>
                                    <td>{{ $pemesanan->user->name }}</td>
                                    <td>{{ $pemesanan->kendaraan->nama_kendaraan }}</td>
                                    <td>{{ $pemesanan->tanggal_mulai->format('d/m/Y') }}</td>
                                    <td>{{ $pemesanan->total_harga_formatted }}</td>
                                    <td>
                                        <span class="badge bg-{{ 
                                            $pemesanan->status == 'disetujui' ? 'success' : 
                                            ($pemesanan->status == 'pending' ? 'warning' : 
                                            ($pemesanan->status == 'ditolak' ? 'danger' : 'info')) 
                                        }}">
                                            {{ ucfirst($pemesanan->status) }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="text-center text-muted">Belum ada pemesanan</p>
            @endif
        </div>
    </div>
</div>
@endsection