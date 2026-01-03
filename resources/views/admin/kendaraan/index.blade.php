@extends('layouts.app')

@section('title', 'Kelola Kendaraan')

@section('content')
<style>
    .pagination-custom {
        display: flex;
        justify-content: center;
        gap: 5px;
        margin-top: 20px;
    }
    
    .page-item-custom {
        list-style: none;
    }
    
    .page-link-custom {
        display: flex;
        align-items: center;
        justify-content: center;
        min-width: 40px;
        height: 40px;
        padding: 0 15px;
        border: 1px solid #dee2e6;
        border-radius: 8px;
        color: #0d6efd;
        text-decoration: none;
        font-weight: 500;
        transition: all 0.3s ease;
        background: white;
    }
    
    .page-link-custom:hover {
        background-color: #e9ecef;
        border-color: #dee2e6;
        color: #0a58ca;
        transform: translateY(-2px);
    }
    
    .page-link-custom.active {
        background-color: #0d6efd;
        border-color: #0d6efd;
        color: white;
        box-shadow: 0 4px 12px rgba(13, 110, 253, 0.25);
    }
    
    .page-link-custom.disabled {
        color: #6c757d;
        pointer-events: none;
        background-color: #f8f9fa;
        border-color: #dee2e6;
        opacity: 0.6;
    }
    
    .pagination-info {
        text-align: center;
        margin-top: 10px;
        color: #6c757d;
        font-size: 0.9rem;
    }
    
    .table-responsive {
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }
    
    .table {
        margin-bottom: 0;
    }
    
    .table thead th {
        background-color: #f8f9fa;
        border-bottom: 2px solid #dee2e6;
        font-weight: 600;
        color: #495057;
        padding: 1rem;
    }
    
    .table tbody td {
        padding: 1rem;
        vertical-align: middle;
        border-color: #e9ecef;
    }
    
    .table tbody tr:hover {
        background-color: rgba(13, 110, 253, 0.02);
    }
    
    .status-badge {
        padding: 0.35rem 0.75rem;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 500;
    }
    
    .btn-action {
        padding: 0.375rem 0.75rem;
        border-radius: 6px;
        margin-right: 5px;
    }
    
    .btn-action:last-child {
        margin-right: 0;
    }
</style>

<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h2 fw-bold mb-2">
                <i class="bi bi-truck text-primary me-2"></i>Kelola Kendaraan
            </h1>
            <p class="text-muted mb-0">Kelola data kendaraan yang tersedia untuk disewa</p>
        </div>
        <a href="{{ route('admin.kendaraan.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-2"></i>Tambah Kendaraan
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i>
            <div>{{ session('success') }}</div>
            <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center" role="alert">
            <i class="bi bi-exclamation-triangle-fill me-2"></i>
            <div>{{ session('error') }}</div>
            <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th width="50">#</th>
                            <th>Nama Kendaraan</th>
                            <th width="120">Jenis</th>
                            <th width="120">Kapasitas</th>
                            <th width="120">Harga Sewa</th>
                            <th width="120">Status</th>
                            <th width="120" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($kendaraans as $kendaraan)
                            <tr>
                                <td>{{ ($kendaraans->currentPage() - 1) * $kendaraans->perPage() + $loop->iteration }}</td>
                                <td>
                                    <div class="fw-medium">{{ $kendaraan->nama_kendaraan }}</div>
                                    @if($kendaraan->deskripsi)
                                        <small class="text-muted">{{ Str::limit($kendaraan->deskripsi, 50) }}</small>
                                    @endif
                                </td>
                                <td>
                                    <span class="status-badge {{ $kendaraan->jenis_kendaraan == 'penumpang' ? 'bg-info text-white' : 'bg-warning text-dark' }}">
                                        {{ ucfirst($kendaraan->jenis_kendaraan) }}
                                    </span>
                                </td>
                                <td>{{ $kendaraan->kapasitas }} {{ $kendaraan->satuan_kapasitas }}</td>
                                <td class="fw-bold text-primary">{{ $kendaraan->harga_sewa_formatted }}</td>
                                <td>
                                    <span class="status-badge {{ $kendaraan->status ? 'bg-success text-white' : 'bg-danger text-white' }}">
                                        {{ $kendaraan->status ? 'Tersedia' : 'Tidak Tersedia' }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.kendaraan.edit', $kendaraan) }}" 
                                           class="btn btn-sm btn-outline-warning btn-action" title="Edit">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form action="{{ route('admin.kendaraan.destroy', $kendaraan) }}" 
                                              method="POST" class="d-inline"
                                              onsubmit="return confirm('Apakah Anda yakin ingin menghapus kendaraan ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger btn-action" title="Hapus">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-4">
                                    <div class="text-muted">
                                        <i class="bi bi-truck" style="font-size: 3rem;"></i>
                                        <h5 class="mt-3">Tidak ada data kendaraan</h5>
                                        <p class="mb-0">Mulai dengan menambahkan kendaraan baru</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            @if($kendaraans->hasPages())
                <!-- Pagination Navigation -->
                <div class="pagination-custom">
                    {{-- Previous Page Link --}}
                    @if($kendaraans->onFirstPage())
                        <li class="page-item-custom">
                            <span class="page-link-custom disabled">
                                <i class="bi bi-chevron-left"></i>
                            </span>
                        </li>
                    @else
                        <li class="page-item-custom">
                            <a href="{{ $kendaraans->previousPageUrl() }}" class="page-link-custom" aria-label="Previous">
                                <i class="bi bi-chevron-left"></i>
                            </a>
                        </li>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach(range(1, $kendaraans->lastPage()) as $i)
                        @if($i == $kendaraans->currentPage())
                            <li class="page-item-custom">
                                <span class="page-link-custom active">{{ $i }}</span>
                            </li>
                        @elseif(($i >= $kendaraans->currentPage() - 2 && $i <= $kendaraans->currentPage() + 2) || 
                                $i == 1 || $i == $kendaraans->lastPage())
                            <li class="page-item-custom">
                                <a href="{{ $kendaraans->url($i) }}" class="page-link-custom">{{ $i }}</a>
                            </li>
                        @elseif(($i == $kendaraans->currentPage() - 3 && $kendaraans->currentPage() > 4) || 
                                ($i == $kendaraans->currentPage() + 3 && $kendaraans->currentPage() < $kendaraans->lastPage() - 3))
                            <li class="page-item-custom">
                                <span class="page-link-custom disabled">...</span>
                            </li>
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if($kendaraans->hasMorePages())
                        <li class="page-item-custom">
                            <a href="{{ $kendaraans->nextPageUrl() }}" class="page-link-custom" aria-label="Next">
                                <i class="bi bi-chevron-right"></i>
                            </a>
                        </li>
                    @else
                        <li class="page-item-custom">
                            <span class="page-link-custom disabled">
                                <i class="bi bi-chevron-right"></i>
                            </span>
                        </li>
                    @endif
                </div>

                <!-- Pagination Info -->
                <div class="pagination-info">
                    Menampilkan 
                    <span class="fw-bold">{{ ($kendaraans->currentPage() - 1) * $kendaraans->perPage() + 1 }}</span>
                    sampai 
                    <span class="fw-bold">{{ min($kendaraans->currentPage() * $kendaraans->perPage(), $kendaraans->total()) }}</span>
                    dari 
                    <span class="fw-bold">{{ $kendaraans->total() }}</span>
                    data kendaraan
                </div>
            @endif
        </div>
    </div>
</div>

<script>
    // Animasi untuk tabel rows
    document.addEventListener('DOMContentLoaded', function() {
        const rows = document.querySelectorAll('tbody tr');
        rows.forEach((row, index) => {
            row.style.opacity = '0';
            row.style.transform = 'translateX(-20px)';
            
            setTimeout(() => {
                row.style.transition = 'all 0.4s ease';
                row.style.opacity = '1';
                row.style.transform = 'translateX(0)';
            }, index * 100);
        });
        
        // Hover effect untuk pagination
        const pageLinks = document.querySelectorAll('.page-link-custom:not(.disabled)');
        pageLinks.forEach(link => {
            link.addEventListener('mouseenter', function() {
                if(!this.classList.contains('active')) {
                    this.style.transform = 'translateY(-3px)';
                }
            });
            
            link.addEventListener('mouseleave', function() {
                if(!this.classList.contains('active')) {
                    this.style.transform = 'translateY(0)';
                }
            });
        });
    });
</script>
@endsection