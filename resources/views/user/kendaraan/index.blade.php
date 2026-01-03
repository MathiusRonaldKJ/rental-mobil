@extends('layouts.app')

@section('title', 'Cari Kendaraan - MKT Transport')

@section('content')
<style>
    :root {
        --primary: #0d6efd;
        --primary-light: rgba(13, 110, 253, 0.08);
        --primary-dark: #0a58ca;
        --secondary: #6c757d;
        --light: #f8f9fa;
        --dark: #212529;
        --success: #28a745;
        --warning: #ffc107;
        --danger: #dc3545;
        --info: #17a2b8;
        --border: #e9ecef;
        --shadow: 0 4px 20px rgba(0,0,0,0.08);
        --shadow-hover: 0 10px 30px rgba(0,0,0,0.15);
        --gradient-primary: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
        --gradient-success: linear-gradient(135deg, var(--success) 0%, #1e7e34 100%);
        --gradient-warning: linear-gradient(135deg, var(--warning) 0%, #e0a800 100%);
    }
    
    /* Hero Search Section */
    .search-hero {
        background: var(--gradient-primary);
        border-radius: 24px;
        padding: 3rem;
        margin-bottom: 3rem;
        position: relative;
        overflow: hidden;
        color: white;
    }
    
    .search-hero::before {
        content: '';
        position: absolute;
        top: -100px;
        right: -100px;
        width: 300px;
        height: 300px;
        background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
        border-radius: 50%;
    }
    
    .search-hero-content {
        position: relative;
        z-index: 2;
        max-width: 800px;
    }
    
    .search-hero-title {
        font-size: 2.5rem;
        font-weight: 800;
        margin-bottom: 0.75rem;
        line-height: 1.2;
    }
    
    .search-hero-subtitle {
        font-size: 1.1rem;
        opacity: 0.9;
        margin-bottom: 2rem;
        line-height: 1.6;
    }
    
    /* Enhanced Filter Card */
    .filter-card-enhanced {
        background: white;
        border-radius: 20px;
        padding: 2rem;
        border: 1px solid var(--border);
        box-shadow: var(--shadow);
        margin-bottom: 3rem;
    }
    
    .filter-header {
        display: flex;
        align-items: center;
        margin-bottom: 2rem;
        padding-bottom: 1rem;
        border-bottom: 2px solid var(--border);
    }
    
    .filter-icon {
        width: 60px;
        height: 60px;
        background: var(--gradient-primary);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.5rem;
        margin-right: 1.5rem;
    }
    
    .filter-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--dark);
        margin: 0;
    }
    
    .filter-subtitle {
        color: var(--secondary);
        margin-top: 0.25rem;
    }
    
    /* Enhanced Form Controls */
    .form-control-enhanced {
        border: 2px solid var(--border);
        border-radius: 12px;
        padding: 0.75rem 1rem;
        transition: all 0.3s;
        height: 48px;
    }
    
    .form-control-enhanced:focus {
        border-color: var(--primary);
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
        transform: translateY(-1px);
    }
    
    .form-select-enhanced {
        border: 2px solid var(--border);
        border-radius: 12px;
        padding: 0.75rem 1rem;
        transition: all 0.3s;
        height: 48px;
        
    }
    
    .form-select-enhanced:focus {
        border-color: var(--primary);
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
        transform: translateY(-1px);
    }
    
    .btn-filter {
        background: var(--gradient-primary);
        border: none;
        border-radius: 12px;
        padding: 0.875rem 1.5rem;
        font-weight: 600;
        transition: all 0.3s;
        height: 48px;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
    }
    
    .btn-filter:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(13, 110, 253, 0.3);
        color: white;
    }
    
    .btn-reset {
        background: white;
        border: 2px solid var(--primary);
        border-radius: 12px;
        padding: 0.875rem 1.5rem;
        font-weight: 600;
        transition: all 0.3s;
        height: 48px;
        color: var(--primary);
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
    }
    
    .btn-reset:hover {
        background: var(--primary);
        color: white;
        transform: translateY(-2px);
    }
    
    /* Enhanced Vehicle Cards */
    .vehicle-grid-modern {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
        gap: 2rem;
        margin-bottom: 3rem;
    }
    
    .vehicle-card-modern {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        border: 1px solid var(--border);
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        box-shadow: var(--shadow);
        position: relative;
        height: 100%;
        display: flex;
        flex-direction: column;
    }
    
    .vehicle-card-modern:hover {
        transform: translateY(-10px) scale(1.02);
        box-shadow: var(--shadow-hover);
        border-color: var(--primary);
    }
    
    .vehicle-badge-modern {
        position: absolute;
        top: 20px;
        left: 20px;
        z-index: 10;
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
    }
    
    .badge-type {
        padding: 0.5rem 1.25rem;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }
    
    .badge-penumpang {
        background: linear-gradient(135deg, var(--info) 0%, #0b7285 100%);
        color: white;
    }
    
    .badge-barang {
        background: linear-gradient(135deg, var(--warning) 0%, #e0a800 100%);
        color: var(--dark);
    }
    
    .badge-available {
        background: linear-gradient(135deg, var(--success) 0%, #1e7e34 100%);
        color: white;
    }
    
    .badge-unavailable {
        background: linear-gradient(135deg, var(--danger) 0%, #b02a37 100%);
        color: white;
    }
    
    .vehicle-image-container-modern {
        height: 200px;
        width: 100%;
        position: relative;
        overflow: hidden;
    }
    
    .vehicle-image-modern {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s ease;
    }
    
    .vehicle-card-modern:hover .vehicle-image-modern {
        transform: scale(1.1);
    }
    
    .vehicle-overlay-modern {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);
        padding: 1.5rem;
        color: white;
    }
    
    .vehicle-title-modern {
        font-size: 1.4rem;
        font-weight: 700;
        color: white;
        margin-bottom: 0.25rem;
        line-height: 1.3;
    }
    
    .vehicle-price-overlay {
        font-size: 1.6rem;
        font-weight: 800;
        color: white;
        text-shadow: 0 2px 4px rgba(0,0,0,0.3);
    }
    
    .vehicle-price-period {
        font-size: 0.9rem;
        opacity: 0.9;
    }
    
    .vehicle-content-modern {
        padding: 1.75rem;
        flex: 1;
        display: flex;
        flex-direction: column;
    }
    
    .vehicle-description-modern {
        color: var(--secondary);
        line-height: 1.6;
        margin-bottom: 1.5rem;
        flex: 1;
    }
    
    .vehicle-specs-modern {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1rem;
        margin-bottom: 1.5rem;
        padding: 1.25rem;
        background: var(--primary-light);
        border-radius: 12px;
    }
    
    .spec-item-modern {
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }
    
    .spec-icon-modern {
        width: 36px;
        height: 36px;
        border-radius: 8px;
        background: white;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--primary);
        font-size: 1rem;
        box-shadow: 0 2px 8px rgba(13, 110, 253, 0.15);
    }
    
    .spec-label {
        font-size: 0.85rem;
        color: var(--secondary);
        margin: 0;
    }
    
    .spec-value {
        font-size: 1rem;
        font-weight: 600;
        color: var(--dark);
        margin: 0;
    }
    
    .vehicle-actions-modern {
        display: flex;
        gap: 1rem;
        margin-top: auto;
    }
    
    .btn-detail-modern {
        flex: 1;
        background: white;
        border: 2px solid var(--primary);
        color: var(--primary);
        padding: 0.9rem;
        border-radius: 10px;
        font-weight: 600;
        text-align: center;
        text-decoration: none;
        transition: all 0.3s;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
    }
    
    .btn-detail-modern:hover {
        background: var(--primary-light);
        transform: translateY(-2px);
        color: var(--primary);
    }
    
    .btn-rent-modern {
        flex: 1;
        background: var(--gradient-primary);
        border: none;
        color: white;
        padding: 0.9rem;
        border-radius: 10px;
        font-weight: 600;
        text-align: center;
        text-decoration: none;
        transition: all 0.3s;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
    }
    
    .btn-rent-modern:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(13, 110, 253, 0.3);
        color: white;
    }
    
    .btn-disabled-modern {
        flex: 1;
        background: linear-gradient(135deg, #e9ecef 0%, #dee2e6 100%);
        border: none;
        color: var(--secondary);
        padding: 0.9rem;
        border-radius: 10px;
        font-weight: 600;
        text-align: center;
        text-decoration: none;
        cursor: not-allowed;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
    }
    
    /* Empty State */
    .empty-state-modern {
        background: white;
        border-radius: 20px;
        padding: 4rem 2rem;
        text-align: center;
        border: 2px dashed var(--border);
        margin-bottom: 3rem;
    }
    
    .empty-icon {
        width: 100px;
        height: 100px;
        margin: 0 auto 2rem;
        background: var(--primary-light);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--primary);
        font-size: 3rem;
    }
    
    .empty-title {
        font-size: 1.8rem;
        font-weight: 700;
        color: var(--dark);
        margin-bottom: 1rem;
    }
    
    .empty-subtitle {
        color: var(--secondary);
        font-size: 1.1rem;
        margin-bottom: 2rem;
        max-width: 500px;
        margin-left: auto;
        margin-right: auto;
        line-height: 1.6;
    }
    
    /* Enhanced Pagination */
    .pagination-modern {
        display: flex;
        justify-content: center;
        gap: 0.5rem;
        margin-bottom: 3rem;
    }
    
    .page-link-modern {
        background: white;
        border: 1px solid var(--border);
        border-radius: 10px;
        padding: 0.75rem 1.25rem;
        color: var(--dark);
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s;
        min-width: 45px;
        text-align: center;
    }
    
    .page-link-modern:hover {
        background: var(--primary);
        color: white;
        border-color: var(--primary);
        transform: translateY(-2px);
    }
    
    .page-link-modern.active {
        background: var(--gradient-primary);
        color: white;
        border-color: var(--primary);
        box-shadow: 0 4px 15px rgba(13, 110, 253, 0.25);
    }
    
    /* Results Summary */
    .results-summary {
        background: white;
        border-radius: 16px;
        padding: 1.5rem;
        border: 1px solid var(--border);
        margin-bottom: 2rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-shadow: var(--shadow);
    }
    
    .results-count {
        font-size: 1.1rem;
        font-weight: 600;
        color: var(--dark);
    }
    
    .results-count span {
        color: var(--primary);
        font-weight: 800;
    }
    
    .sort-options {
        display: flex;
        align-items: center;
        gap: 1rem;
    }
    
    .sort-label {
        color: var(--secondary);
        font-weight: 500;
    }
    
    /* Responsive */
    @media (max-width: 1200px) {
        .vehicle-grid-modern {
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
        }
    }
    
    @media (max-width: 768px) {
        .search-hero {
            padding: 2rem;
        }
        
        .search-hero-title {
            font-size: 2rem;
        }
        
        .vehicle-grid-modern {
            grid-template-columns: 1fr;
        }
        
        .filter-header {
            flex-direction: column;
            text-align: center;
        }
        
        .filter-icon {
            margin-right: 0;
            margin-bottom: 1rem;
        }
        
        .vehicle-specs-modern {
            grid-template-columns: 1fr;
        }
        
        .vehicle-actions-modern {
            flex-direction: column;
        }
        
        .results-summary {
            flex-direction: column;
            gap: 1rem;
            text-align: center;
        }
    }
</style>

<div class="container py-4">
    <!-- Hero Search Section -->
    <div class="search-hero">
        <div class="search-hero-content">
            <h1 class="search-hero-title">Cari Kendaraan Tersedia</h1>
            <p class="search-hero-subtitle">
                Temukan kendaraan yang tepat untuk kebutuhan Anda. Armada modern, kondisi prima, 
                dan harga terbaik untuk perjalanan yang nyaman dan aman.
            </p>
        </div>
    </div>

    <!-- Enhanced Filter Card -->
    <div class="filter-card-enhanced">
    <div class="filter-header">
        <div class="filter-icon">
            <i class="bi bi-funnel"></i>
        </div>
        <div>
            <h2 class="filter-title">Filter Pencarian</h2>
            <p class="filter-subtitle">Sempurnakan pencarian Anda dengan filter di bawah ini</p>
        </div>
    </div>
    
    <form method="GET" action="{{ route('kendaraan.index') }}">
        <div class="row g-4 align-items-end">
            <!-- Kolom Jenis Kendaraan -->
            <div class="col-lg-3 col-md-6">
                <div class="form-group">
                    <label for="jenis" class="form-label fw-semibold mb-2">Jenis Kendaraan</label>
                    <select class="form-select-enhanced" id="jenis" name="jenis">
                        <option value="">Semua Jenis</option>
                        <option value="penumpang" {{ request('jenis') == 'penumpang' ? 'selected' : '' }}>
                            Penumpang
                        </option>
                        <option value="barang" {{ request('jenis') == 'barang' ? 'selected' : '' }}>
                            Barang
                        </option>
                    </select>
                </div>
            </div>
            
            <!-- Kolom Harga Maksimum -->
            <div class="col-lg-4 col-md-6">
                <div class="form-group">
                    <label for="harga_max" class="form-label fw-semibold mb-2">Harga Maksimum</label>
                    <div class="input-group">
                        <span class="input-group-text bg-primary text-white border-primary">Rp</span>
                        <input type="number" class="form-control-enhanced" id="harga_max" name="harga_max" 
                               value="{{ request('harga_max') }}" placeholder="Masukkan harga maksimum">
                    </div>
                </div>
            </div>
            
            <!-- Tombol Cari -->
            <div class="col-lg-3 col-md-6">
                <div class="form-group">
                    <label class="form-label fw-semibold mb-2 invisible">Aksi</label>
                    <button type="submit" class="btn-filter w-100">
                        <i class="bi bi-search"></i> Cari Kendaraan
                    </button>
                </div>
            </div>
            
            <!-- Tombol Reset -->
            <div class="col-lg-2 col-md-6">
                <div class="form-group">
                    <label class="form-label fw-semibold mb-2 invisible">Reset</label>
                    @if(request()->has('jenis') || request()->has('harga_max'))
                        <a href="{{ route('kendaraan.index') }}" class="btn-reset w-100">
                            <i class="bi bi-x-circle"></i> Reset
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </form>
</div>

    <!-- Results Summary -->
    <div class="results-summary">
        <div class="results-count">
            Menampilkan <span>{{ $kendaraans->count() }}</span> dari <span>{{ $kendaraans->total() }}</span> kendaraan
        </div>
        
        <div class="sort-options">
            <span class="sort-label">Urutkan:</span>
            <select class="form-select-enhanced" style="width: auto;">
                <option>Paling Relevan</option>
                <option>Harga Terendah</option>
                <option>Harga Tertinggi</option>
                <option>Kapasitas Terbesar</option>
            </select>
        </div>
    </div>

    <!-- Kendaraan Grid -->
    <div class="vehicle-grid-modern">
        @forelse($kendaraans as $kendaraan)
            <div class="vehicle-card-modern">
                <div class="vehicle-badge-modern">
                    <span class="badge-type badge-{{ $kendaraan->jenis_kendaraan }}">
                        {{ ucfirst($kendaraan->jenis_kendaraan) }}
                    </span>
                    <span class="badge-type {{ $kendaraan->status ? 'badge-available' : 'badge-unavailable' }}">
                        {{ $kendaraan->status ? 'Tersedia' : 'Penuh' }}
                    </span>
                </div>
                
                <div class="vehicle-image-container-modern">
                    @php
                        $imageUrls = [
                            'penumpang' => 'https://cdn3.iconfinder.com/data/icons/city-map-element-2/50/103-1024.png',
                            'barang' => 'https://tse3.mm.bing.net/th/id/OIP.d7bCrNYx_DmJ_NUXo9Gt5AAAAA?rs=1&pid=ImgDetMain&o=7&rm=3'
                        ];
                        $imageUrl = $imageUrls[$kendaraan->jenis_kendaraan] ?? 'https://images.unsplash.com/photo-1549399542-7e3f8b79c341?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80';
                    @endphp
                    <img src="{{ $imageUrl }}" alt="{{ $kendaraan->nama_kendaraan }}" class="vehicle-image-modern">
                    <div class="vehicle-overlay-modern">
                        <h3 class="vehicle-title-modern">{{ $kendaraan->nama_kendaraan }}</h3>
                        <div class="vehicle-price-overlay">
                            Rp {{ number_format($kendaraan->harga_sewa, 0, ',', '.') }}
                            <span class="vehicle-price-period">/hari</span>
                        </div>
                    </div>
                </div>
                
                <div class="vehicle-content-modern">
                    <p class="vehicle-description-modern">
                        {{ Str::limit($kendaraan->deskripsi, 120) }}
                    </p>
                    
                    <div class="vehicle-specs-modern">
                        <div class="spec-item-modern">
                            <div class="spec-icon-modern">
                                <i class="bi bi-{{ $kendaraan->jenis_kendaraan == 'penumpang' ? 'people' : 'box' }}"></i>
                            </div>
                            <div>
                                <p class="spec-label">Kapasitas</p>
                                <p class="spec-value">{{ $kendaraan->kapasitas }} {{ $kendaraan->satuan_kapasitas }}</p>
                            </div>
                        </div>
                        
                        <div class="spec-item-modern">
                            <div class="spec-icon-modern">
                                <i class="bi bi-gear"></i>
                            </div>
                            <div>
                                <p class="spec-label">Jenis</p>
                                <p class="spec-value">{{ ucfirst($kendaraan->jenis_kendaraan) }}</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="vehicle-actions-modern">
                        <a href="{{ route('kendaraan.show', $kendaraan) }}" class="btn-detail-modern">
                            <i class="bi bi-info-circle"></i>
                            <span>Detail</span>
                        </a>
                        
                        @if($kendaraan->status)
                            <a href="{{ route('pemesanan.create', $kendaraan) }}" class="btn-rent-modern">
                                <i class="bi bi-calendar-plus"></i>
                                <span>Sewa Sekarang</span>
                            </a>
                        @else
                            <button class="btn-disabled-modern" disabled>
                                <i class="bi bi-x-circle"></i>
                                <span>Tidak Tersedia</span>
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="empty-state-modern">
                    <div class="empty-icon">
                        <i class="bi bi-search"></i>
                    </div>
                    <h3 class="empty-title">Kendaraan Tidak Ditemukan</h3>
                    <p class="empty-subtitle">
                        Maaf, tidak ada kendaraan yang sesuai dengan kriteria pencarian Anda. 
                        Coba ubah filter pencarian atau lihat semua kendaraan yang tersedia.
                    </p>
                    <a href="{{ route('kendaraan.index') }}" class="btn btn-primary btn-lg">
                        <i class="bi bi-grid me-2"></i> Lihat Semua Kendaraan
                    </a>
                </div>
            </div>
        @endforelse
    </div>

    <!-- Enhanced Pagination -->
    @if($kendaraans->hasPages())
        <div class="pagination-modern">
            {{-- Previous Page Link --}}
            @if($kendaraans->onFirstPage())
                <span class="page-link-modern disabled">
                    <i class="bi bi-chevron-left"></i>
                </span>
            @else
                <a href="{{ $kendaraans->previousPageUrl() }}" class="page-link-modern">
                    <i class="bi bi-chevron-left"></i>
                </a>
            @endif

            {{-- Pagination Elements --}}
            @foreach($kendaraans->links()->elements[0] as $page => $url)
                @if($page == $kendaraans->currentPage())
                    <span class="page-link-modern active">{{ $page }}</span>
                @else
                    <a href="{{ $url }}" class="page-link-modern">{{ $page }}</a>
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if($kendaraans->hasMorePages())
                <a href="{{ $kendaraans->nextPageUrl() }}" class="page-link-modern">
                    <i class="bi bi-chevron-right"></i>
                </a>
            @else
                <span class="page-link-modern disabled">
                    <i class="bi bi-chevron-right"></i>
                </span>
            @endif
        </div>
    @endif
</div>

<script>
    // Enhanced animations
    document.addEventListener('DOMContentLoaded', function() {
        // Animate vehicle cards on scroll
        const vehicleCards = document.querySelectorAll('.vehicle-card-modern');
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry, index) => {
                if (entry.isIntersecting) {
                    setTimeout(() => {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }, index * 100);
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        vehicleCards.forEach((card, index) => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(40px)';
            card.style.transition = 'all 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275)';
            observer.observe(card);
        });

        // Filter form enhancement
        const filterForm = document.querySelector('form');
        const filterInputs = filterForm.querySelectorAll('.form-control-enhanced, .form-select-enhanced');
        
        filterInputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.classList.add('focused');
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.classList.remove('focused');
            });
        });

        // Price input formatting
        const hargaInput = document.getElementById('harga_max');
        if (hargaInput) {
            hargaInput.addEventListener('input', function() {
                let value = this.value.replace(/\D/g, '');
                if (value.length > 0) {
                    this.value = parseInt(value).toLocaleString('id-ID');
                }
            });
        }

        // Hover effect for cards
        vehicleCards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.zIndex = '10';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.zIndex = '1';
            });
        });

        // Smooth scroll to top when paginating
        document.querySelectorAll('.page-link-modern').forEach(link => {
            link.addEventListener('click', function(e) {
                if (this.href) {
                    e.preventDefault();
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                    setTimeout(() => {
                        window.location.href = this.href;
                    }, 500);
                }
            });
        });

        // Highlight active filter
        const activeFilters = document.querySelectorAll('select option:checked, input[type="number"]');
        activeFilters.forEach(filter => {
            if (filter.value) {
                filter.parentElement.style.borderColor = 'var(--primary)';
                filter.parentElement.style.boxShadow = '0 0 0 2px rgba(13, 110, 253, 0.1)';
            }
        });
    });

    // Add dynamic image loading
    const loadVehicleImages = () => {
        const images = document.querySelectorAll('.vehicle-image-modern');
        images.forEach(img => {
            if (img.dataset.src) {
                img.src = img.dataset.src;
            }
        });
    };

    // Initialize when page loads
    window.addEventListener('load', loadVehicleImages);
</script>
@endsection