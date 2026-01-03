@extends('layouts.app')

@section('title', 'Dashboard - MKT Transport')

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
        --border: #e9ecef;
        --shadow: 0 4px 20px rgba(0,0,0,0.08);
        --shadow-hover: 0 10px 30px rgba(0,0,0,0.15);
    }
    
    /* Hero Section */
    .dashboard-hero {
        background: linear-gradient(135deg, rgba(13, 110, 253, 0.08) 0%, rgba(13, 110, 253, 0.03) 100%);
        border-radius: 24px;
        padding: 3rem;
        margin-bottom: 3rem;
        position: relative;
        overflow: hidden;
        border: 1px solid rgba(13, 110, 253, 0.12);
        backdrop-filter: blur(10px);
    }
    
    .dashboard-hero::before {
        content: '';
        position: absolute;
        top: -100px;
        right: -100px;
        width: 300px;
        height: 300px;
        background: radial-gradient(circle, rgba(13, 110, 253, 0.08) 0%, transparent 70%);
        border-radius: 50%;
    }
    
    .dashboard-hero::after {
        content: '';
        position: absolute;
        bottom: -80px;
        left: -80px;
        width: 200px;
        height: 200px;
        background: radial-gradient(circle, rgba(255, 107, 53, 0.05) 0%, transparent 70%);
        border-radius: 50%;
    }
    
    .hero-content {
        position: relative;
        z-index: 2;
    }
    
    .hero-title {
        font-size: 2.2rem;
        font-weight: 800;
        color: var(--dark);
        margin-bottom: 0.75rem;
        line-height: 1.2;
    }
    
    .hero-highlight {
        color: var(--primary);
        position: relative;
        background: linear-gradient(120deg, var(--primary) 0%, var(--primary-dark) 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
    
    .hero-subtitle {
        color: var(--secondary);
        font-size: 1.1rem;
        margin-bottom: 2rem;
        max-width: 600px;
        line-height: 1.6;
    }
    
    /* Enhanced Stats */
    .stats-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1.5rem;
        margin-bottom: 3rem;
    }
    
    .stat-card-enhanced {
        background: white;
        border-radius: 16px;
        padding: 1.5rem;
        border: 1px solid var(--border);
        box-shadow: var(--shadow);
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        position: relative;
        overflow: hidden;
    }
    
    .stat-card-enhanced::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 4px;
        height: 100%;
        background: linear-gradient(to bottom, var(--primary), var(--primary-dark));
    }
    
    .stat-card-enhanced:hover {
        transform: translateY(-8px) scale(1.02);
        box-shadow: var(--shadow-hover);
    }
    
    .stat-icon-container {
        width: 56px;
        height: 56px;
        border-radius: 12px;
        background: linear-gradient(135deg, var(--primary-light) 0%, rgba(13, 110, 253, 0.15) 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 1.5rem;
    }
    
    .stat-icon {
        font-size: 1.5rem;
        color: var(--primary);
    }
    
    .stat-number {
        font-size: 2.2rem;
        font-weight: 800;
        color: var(--dark);
        margin-bottom: 0.5rem;
        line-height: 1;
    }
    
    .stat-label {
        color: var(--secondary);
        font-size: 0.9rem;
        font-weight: 500;
        margin-bottom: 0.5rem;
    }
    
    .stat-trend {
        font-size: 0.85rem;
        color: var(--success);
        display: flex;
        align-items: center;
        gap: 0.25rem;
    }
    
    /* Enhanced Vehicle Cards with Images */
    .section-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
        padding-bottom: 1rem;
        border-bottom: 2px solid var(--border);
    }
    
    .section-title {
        font-size: 1.8rem;
        font-weight: 700;
        color: var(--dark);
        position: relative;
        padding-left: 1rem;
    }
    
    .section-title::before {
        content: '';
        position: absolute;
        left: 0;
        top: 50%;
        transform: translateY(-50%);
        width: 4px;
        height: 24px;
        background: linear-gradient(to bottom, var(--primary), var(--primary-dark));
        border-radius: 2px;
    }
    
    .section-subtitle {
        color: var(--secondary);
        font-size: 1rem;
        margin-top: 0.5rem;
    }
    
    .vehicle-grid-enhanced {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
        gap: 2rem;
        margin-bottom: 3rem;
    }
    
    .vehicle-card-enhanced {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        border: 1px solid var(--border);
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        box-shadow: var(--shadow);
        position: relative;
    }
    
    .vehicle-card-enhanced:hover {
        transform: translateY(-10px) scale(1.02);
        box-shadow: var(--shadow-hover);
        border-color: var(--primary);
    }
    
    .vehicle-badge-container {
        position: absolute;
        top: 20px;
        left: 20px;
        z-index: 3;
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
    }
    
    .vehicle-badge {
        padding: 0.5rem 1rem;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .badge-available {
        background: var(--success);
        color: white;
    }
    
    .badge-featured {
        background: var(--warning);
        color: var(--dark);
    }
    
    .badge-popular {
        background: var(--primary);
        color: white;
    }
    
    .vehicle-image-container {
        height: 220px;
        width: 100%;
        position: relative;
        overflow: hidden;
    }
    
    .vehicle-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s ease;
    }
    
    .vehicle-card-enhanced:hover .vehicle-image {
        transform: scale(1.1);
    }
    
    .vehicle-image-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: linear-gradient(to top, rgba(0,0,0,0.7), transparent);
        padding: 1.5rem;
        color: white;
    }
    
    .vehicle-title {
        font-size: 1.4rem;
        font-weight: 700;
        color: white;
        margin-bottom: 0.25rem;
    }
    
    .vehicle-type {
        font-size: 0.9rem;
        opacity: 0.9;
    }
    
    .vehicle-content-enhanced {
        padding: 1.75rem;
    }
    
    .vehicle-specs-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1rem;
        margin-bottom: 1.5rem;
    }
    
    .spec-item-enhanced {
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }
    
    .spec-icon {
        width: 36px;
        height: 36px;
        border-radius: 8px;
        background: var(--primary-light);
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--primary);
        font-size: 1rem;
    }
    
    .spec-content h5 {
        font-size: 0.9rem;
        color: var(--secondary);
        margin: 0;
        font-weight: 500;
    }
    
    .spec-content p {
        font-size: 1rem;
        font-weight: 600;
        color: var(--dark);
        margin: 0;
    }
    
    .vehicle-price-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.5rem;
        padding: 1rem;
        background: linear-gradient(135deg, var(--primary-light) 0%, rgba(13, 110, 253, 0.05) 100%);
        border-radius: 12px;
    }
    
    .price-main {
        font-size: 1.8rem;
        font-weight: 800;
        color: var(--primary);
    }
    
    .price-period {
        font-size: 0.9rem;
        color: var(--secondary);
    }
    
    .vehicle-rating {
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    
    .rating-stars {
        color: #ffc107;
    }
    
    .rating-text {
        font-weight: 600;
        color: var(--dark);
    }
    
    .vehicle-actions-enhanced {
        display: flex;
        gap: 1rem;
    }
    
    .btn-action {
        flex: 1;
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
    
    .btn-primary-action {
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
        color: white;
        border: none;
    }
    
    .btn-primary-action:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(13, 110, 253, 0.3);
        color: white;
    }
    
    .btn-outline-action {
        background: transparent;
        border: 2px solid var(--primary);
        color: var(--primary);
    }
    
    .btn-outline-action:hover {
        background: var(--primary);
        color: white;
        transform: translateY(-2px);
    }
    
    /* Enhanced CTA Section */
    .cta-section-enhanced {
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
        border-radius: 24px;
        padding: 4rem;
        margin: 4rem 0;
        position: relative;
        overflow: hidden;
    }
    
    .cta-background {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        opacity: 0.1;
        background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><path d="M50,5 L95,50 L50,95 L5,50 Z" fill="none" stroke="white" stroke-width="2"/></svg>');
        background-size: 80px;
    }
    
    .cta-content {
        position: relative;
        z-index: 2;
        text-align: center;
        max-width: 800px;
        margin: 0 auto;
    }
    
    .cta-title {
        font-size: 2.5rem;
        font-weight: 800;
        color: white;
        margin-bottom: 1rem;
        line-height: 1.2;
    }
    
    .cta-subtitle {
        font-size: 1.2rem;
        color: rgba(255,255,255,0.9);
        margin-bottom: 2.5rem;
        line-height: 1.6;
    }
    
    .cta-buttons {
        display: flex;
        gap: 1rem;
        justify-content: center;
        flex-wrap: wrap;
    }
    
    .btn-cta-primary {
        background: white;
        color: var(--primary);
        border: none;
        padding: 1.2rem 2.5rem;
        border-radius: 12px;
        font-size: 1.1rem;
        font-weight: 700;
        transition: all 0.3s;
    }
    
    .btn-cta-primary:hover {
        transform: translateY(-3px) scale(1.05);
        box-shadow: 0 10px 30px rgba(0,0,0,0.3);
    }
    
    .btn-cta-secondary {
        background: transparent;
        border: 2px solid white;
        color: white;
        padding: 1.2rem 2.5rem;
        border-radius: 12px;
        font-size: 1.1rem;
        font-weight: 700;
        transition: all 0.3s;
    }
    
    .btn-cta-secondary:hover {
        background: white;
        color: var(--primary);
        transform: translateY(-3px);
    }
    
    /* Why Choose Us - Enhanced - MODIFIED FOR HORIZONTAL */
    .benefits-section {
        background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
        border-radius: 24px;
        padding: 3rem;
        margin-bottom: 3rem;
    }
    
    .benefits-grid-enhanced {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 2rem;
    }
    
    .benefit-card-enhanced {
        background: white;
        border-radius: 16px;
        padding: 2rem;
        text-align: center;
        transition: all 0.3s;
        border: 1px solid transparent;
        position: relative;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        min-height: 320px;
    }
    
    .benefit-card-enhanced:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-hover);
        border-color: var(--primary);
    }
    
    .benefit-card-enhanced::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, var(--primary), var(--primary-dark));
    }
    
    .benefit-icon-enhanced {
        width: 70px;
        height: 70px;
        margin: 0 auto 1.5rem;
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.8rem;
    }
    
    .benefit-title-enhanced {
        font-size: 1.3rem;
        font-weight: 700;
        color: var(--dark);
        margin-bottom: 1rem;
    }
    
    .benefit-desc-enhanced {
        color: var(--secondary);
        line-height: 1.6;
        margin-bottom: 1.5rem;
    }
    
    .benefit-features {
        list-style: none;
        padding: 0;
        margin: 0;
        text-align: left;
    }
    
    .benefit-features li {
        padding: 0.5rem 0;
        color: var(--secondary);
        position: relative;
        padding-left: 1.5rem;
    }
    
    .benefit-features li::before {
        content: '✓';
        position: absolute;
        left: 0;
        color: var(--success);
        font-weight: bold;
    }
    
    /* Recent Orders Enhanced */
    .orders-section {
        margin-bottom: 3rem;
    }
    
    .orders-card {
        background: white;
        border-radius: 20px;
        padding: 2rem;
        border: 1px solid var(--border);
        box-shadow: var(--shadow);
    }
    
    .orders-timeline {
        position: relative;
        padding-left: 2rem;
    }
    
    .orders-timeline::before {
        content: '';
        position: absolute;
        left: 10px;
        top: 0;
        bottom: 0;
        width: 2px;
        background: linear-gradient(to bottom, var(--primary), transparent);
    }
    
    .timeline-item {
        position: relative;
        padding: 1.5rem 0;
        border-bottom: 1px solid var(--border);
    }
    
    .timeline-item:last-child {
        border-bottom: none;
    }
    
    .timeline-item::before {
        content: '';
        position: absolute;
        left: -2rem;
        top: 2rem;
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background: var(--primary);
        border: 3px solid white;
        box-shadow: 0 0 0 3px var(--primary-light);
    }
    
    .order-details {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    
    .order-info-expanded {
        flex: 1;
    }
    
    .order-vehicle-name {
        font-size: 1.1rem;
        font-weight: 600;
        color: var(--dark);
        margin-bottom: 0.25rem;
    }
    
    .order-meta {
        display: flex;
        gap: 1.5rem;
        margin-bottom: 0.5rem;
    }
    
    .order-meta-item {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 0.9rem;
        color: var(--secondary);
    }
    
    .order-progress {
        width: 150px;
        height: 6px;
        background: var(--border);
        border-radius: 3px;
        overflow: hidden;
    }
    
    .order-progress-bar {
        height: 100%;
        background: linear-gradient(90deg, var(--primary), var(--primary-dark));
        border-radius: 3px;
        transition: width 0.6s ease;
    }
    
    /* Horizontal Layout for Why Choose Us and Below Section */
    .horizontal-layout {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 2rem;
        margin-bottom: 3rem;
    }
    
    .left-section {
        display: flex;
        flex-direction: column;
        gap: 2rem;
    }
    
    /* Updated benefits section for horizontal layout */
    .benefits-horizontal {
        margin-bottom: 0;
    }
    
    /* New Additional Section for horizontal layout */
    .additional-section {
        background: linear-gradient(135deg, rgba(40, 167, 69, 0.08) 0%, rgba(40, 167, 69, 0.03) 100%);
        border-radius: 24px;
        padding: 2.5rem;
        border: 1px solid rgba(40, 167, 69, 0.12);
    }
    
    .additional-content {
        text-align: center;
    }
    
    .additional-icon {
        width: 80px;
        height: 80px;
        margin: 0 auto 1.5rem;
        background: linear-gradient(135deg, var(--success) 0%, #1e7e34 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 2rem;
    }
    
    .additional-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--dark);
        margin-bottom: 1rem;
    }
    
    .additional-desc {
        color: var(--secondary);
        line-height: 1.6;
        margin-bottom: 1.5rem;
    }
    
    .additional-stats {
        display: flex;
        justify-content: space-around;
        margin-top: 2rem;
    }
    
    .additional-stat {
        text-align: center;
    }
    
    .additional-stat-number {
        font-size: 2rem;
        font-weight: 800;
        color: var(--success);
        line-height: 1;
    }
    
    .additional-stat-label {
        font-size: 0.9rem;
        color: var(--secondary);
        margin-top: 0.5rem;
    }
    
    /* Responsive */
    @media (max-width: 1200px) {
        .vehicle-grid-enhanced {
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        }
        
        .horizontal-layout {
            grid-template-columns: 1fr;
        }
        
        .benefits-grid-enhanced {
            grid-template-columns: repeat(2, 1fr);
        }
    }
    
    @media (max-width: 992px) {
        .benefits-grid-enhanced {
            grid-template-columns: 1fr;
        }
    }
    
    @media (max-width: 768px) {
        .dashboard-hero {
            padding: 2rem;
        }
        
        .hero-title {
            font-size: 1.8rem;
        }
        
        .vehicle-grid-enhanced {
            grid-template-columns: 1fr;
        }
        
        .cta-section-enhanced {
            padding: 2.5rem 1.5rem;
        }
        
        .cta-title {
            font-size: 2rem;
        }
        
        .benefits-section {
            padding: 2rem;
        }
        
        .stats-container {
            grid-template-columns: 1fr;
        }
        
        .cta-buttons {
            flex-direction: column;
        }
        
        .btn-cta-primary,
        .btn-cta-secondary {
            width: 100%;
        }
        
        .benefits-grid-enhanced {
            grid-template-columns: 1fr;
        }
        
        .horizontal-layout {
            gap: 1.5rem;
        }
    }
</style>

<div class="container py-4">
    <!-- Hero Section -->
    <div class="dashboard-hero">
        <div class="hero-content">
            <h1 class="hero-title">
                Selamat Datang di <span class="hero-highlight">MKT Transport</span>
            </h1>
            <p class="hero-subtitle">
                Halo, {{ Auth::user()->name }}! Temukan pengalaman rental kendaraan terbaik dengan armada modern, 
                layanan profesional, dan harga yang kompetitif. Kami siap melayani kebutuhan transportasi Anda.
            </p>
            
            <div class="d-flex flex-wrap gap-3">
                <a href="{{ route('kendaraan.index') }}" class="btn btn-primary btn-lg px-4">
                    <i class="bi bi-search me-2"></i> Jelajahi Kendaraan
                </a>
                <a href="{{ route('pemesanan.index') }}" class="btn btn-outline-primary btn-lg px-4">
                    <i class="bi bi-list-ul me-2"></i> Lihat Pemesanan
                </a>
                <a href="{{ route('kendaraan.index') }}" class="btn btn-success btn-lg px-4">
                    <i class="bi bi-plus-circle me-2"></i> Buat Pemesanan
                </a>
            </div>
        </div>
    </div>

    <!-- Enhanced Stats -->
    <div class="stats-container">
        <div class="stat-card-enhanced">
            <div class="stat-icon-container">
                <i class="bi bi-car-front stat-icon"></i>
            </div>
            <div class="stat-number">{{ App\Models\Kendaraan::where('status', true)->count() }}</div>
            <div class="stat-label">Kendaraan Tersedia</div>
            <div class="stat-trend">
                <i class="bi bi-arrow-up-right"></i>
                <span>+12% dari bulan lalu</span>
            </div>
        </div>
        
        <div class="stat-card-enhanced">
            <div class="stat-icon-container">
                <i class="bi bi-star-fill stat-icon"></i>
            </div>
            <div class="stat-number">4.8</div>
            <div class="stat-label">Rating Pelanggan</div>
            <div class="stat-trend">
                <i class="bi bi-star-half"></i>
                <span>500+ review positif</span>
            </div>
        </div>
        
        <div class="stat-card-enhanced">
            <div class="stat-icon-container">
                <i class="bi bi-check-circle stat-icon"></i>
            </div>
            <div class="stat-number">{{ Auth::user()->pemesanans()->count() }}</div>
            <div class="stat-label">Total Pemesanan Anda</div>
            <div class="stat-trend">
                <i class="bi bi-graph-up"></i>
                <span>{{ Auth::user()->pemesanans()->where('status', 'disetujui')->count() }} aktif</span>
            </div>
        </div>
        
        <div class="stat-card-enhanced">
            <div class="stat-icon-container">
                <i class="bi bi-clock-history stat-icon"></i>
            </div>
            <div class="stat-number">{{ Auth::user()->pemesanans()->whereIn('status', ['pending', 'diproses'])->count() }}</div>
            <div class="stat-label">Dalam Proses</div>
            <div class="stat-trend">
                <i class="bi bi-clock"></i>
                <span>Menunggu konfirmasi</span>
            </div>
        </div>
    </div>

    <!-- Featured Vehicles with Images -->
    <div class="section-header">
        <div>
            <h2 class="section-title">Kendaraan Unggulan</h2>
            <p class="section-subtitle">Armada terbaik dengan kondisi prima dan harga spesial</p>
        </div>
        <div>
            <a href="{{ route('kendaraan.index') }}" class="btn btn-outline-primary">
                <i class="bi bi-grid-3x3-gap me-2"></i> Lihat Semua
            </a>
        </div>
    </div>
    
    <div class="vehicle-grid-enhanced">
        @foreach($kendaraan_terbaru as $index => $kendaraan)
            <div class="vehicle-card-enhanced">
                <div class="vehicle-badge-container">
                    @if($kendaraan->status)
                        <div class="vehicle-badge badge-available">Tersedia</div>
                    @endif
                    @if($index < 2)
                        <div class="vehicle-badge badge-featured">Unggulan</div>
                    @endif
                    @if($kendaraan->harga_sewa < 500000)
                        <div class="vehicle-badge badge-popular">Hemat</div>
                    @endif
                </div>
                
                <div class="vehicle-image-container">
                    <!-- Gunakan gambar dari Unsplash berdasarkan jenis kendaraan -->
                    @php
                        $imageUrls = [
                            'penumpang' => 'https://cdn3.iconfinder.com/data/icons/city-map-element-2/50/103-1024.png',
                            'barang' => 'https://tse3.mm.bing.net/th/id/OIP.d7bCrNYx_DmJ_NUXo9Gt5AAAAA?rs=1&pid=ImgDetMain&o=7&rm=3'
                        ];
                        $imageUrl = $imageUrls[$kendaraan->jenis_kendaraan] ?? 'https://images.unsplash.com/photo-1549399542-7e3f8b79c341?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80';
                    @endphp
                    <img src="{{ $imageUrl }}" alt="{{ $kendaraan->nama_kendaraan }}" class="vehicle-image">
                    <div class="vehicle-image-overlay">
                        <h3 class="vehicle-title">{{ $kendaraan->nama_kendaraan }}</h3>
                        <p class="vehicle-type">{{ ucfirst($kendaraan->jenis_kendaraan) }}</p>
                    </div>
                </div>
                
                <div class="vehicle-content-enhanced">
                    <div class="vehicle-specs-grid">
                        <div class="spec-item-enhanced">
                            <div class="spec-icon">
                                <i class="bi bi-{{ $kendaraan->jenis_kendaraan == 'penumpang' ? 'people' : 'box' }}"></i>
                            </div>
                            <div class="spec-content">
                                <h5>Kapasitas</h5>
                                <p>{{ $kendaraan->kapasitas }} {{ $kendaraan->satuan_kapasitas }}</p>
                            </div>
                        </div>
                        
                        <div class="spec-item-enhanced">
                            <div class="spec-icon">
                                <i class="bi bi-gear"></i>
                            </div>
                            <div class="spec-content">
                                <h5>Jenis</h5>
                                <p>{{ ucfirst($kendaraan->jenis_kendaraan) }}</p>
                            </div>
                        </div>
                        
                        <div class="spec-item-enhanced">
                            <div class="spec-icon">
                                <i class="bi bi-speedometer2"></i>
                            </div>
                            <div class="spec-content">
                                <h5>Kondisi</h5>
                                <p>Bersih & Prima</p>
                            </div>
                        </div>
                        
                        <div class="spec-item-enhanced">
                            <div class="spec-icon">
                                <i class="bi bi-shield-check"></i>
                            </div>
                            <div class="spec-content">
                                <h5>Asuransi</h5>
                                <p>Lengkap</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="vehicle-price-container">
                        <div>
                            <div class="price-main">
                                {{ $kendaraan->harga_sewa_formatted ?? 'Rp ' . number_format($kendaraan->harga_sewa, 0, ',', '.') }}
                            </div>
                            <div class="price-period">per hari</div>
                        </div>
                        <div class="vehicle-rating">
                            <div class="rating-stars">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-half"></i>
                            </div>
                            <span class="rating-text">4.8</span>
                        </div>
                    </div>
                    
                    <div class="vehicle-actions-enhanced">
                        <a href="{{ route('kendaraan.show', $kendaraan) }}" class="btn-action btn-outline-action">
                            <i class="bi bi-info-circle"></i>
                            <span>Detail</span>
                        </a>
                        <a href="{{ route('kendaraan.show', $kendaraan) }}" class="btn-action btn-primary-action">
                            <i class="bi bi-cart-plus"></i>
                            <span>Sewa Sekarang</span>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Enhanced CTA Section -->
    <div class="cta-section-enhanced">
        <div class="cta-background"></div>
        <div class="cta-content">
            <h2 class="cta-title">Siap Memulai Perjalanan Bersama Kami?</h2>
            <p class="cta-subtitle">
                Bergabunglah dengan ribuan pelanggan puas yang telah mempercayakan kebutuhan transportasi mereka 
                kepada MKT Transport. Proses mudah, aman, dan terpercaya.
            </p>
            <div class="cta-buttons">
                <a href="{{ route('kendaraan.index') }}" class="btn-cta-primary">
                    <i class="bi bi-lightning-charge me-2"></i> Sewa Kendaraan
                </a>
                <a href="{{ route('kendaraan.index') }}" class="btn-cta-secondary">
                    <i class="bi bi-calendar-plus me-2"></i> Buat Pemesanan
                </a>
            </div>
        </div>
    </div>

    <!-- Horizontal Layout: Mengapa MKT Transport + Additional Section -->
    <div class="horizontal-layout">
        <div class="left-section">
            <!-- Why Choose Us Enhanced -->
            <div class="benefits-section benefits-horizontal">
                <div class="section-header mb-4">
                    <div>
                        <h2 class="section-title">Mengapa MKT Transport?</h2>
                        <p class="section-subtitle">Keunggulan layanan kami</p>
                    </div>
                </div>
                
                <div class="benefits-grid-enhanced">
                    <div class="benefit-card-enhanced">
                        <div class="benefit-icon-enhanced">
                            <i class="bi bi-shield-check"></i>
                        </div>
                        <h4 class="benefit-title-enhanced">Keamanan Terjamin</h4>
                        <p class="benefit-desc-enhanced">Kendaraan dengan asuransi lengkap dan kondisi terawat</p>
                        <ul class="benefit-features">
                            <li>Asuransi komprehensif</li>
                            <li>Pemeriksaan rutin</li>
                            <li>Safety equipment lengkap</li>
                        </ul>
                    </div>
                    
                    <div class="benefit-card-enhanced">
                        <div class="benefit-icon-enhanced">
                            <i class="bi bi-headset"></i>
                        </div>
                        <h4 class="benefit-title-enhanced">Support 24/7</h4>
                        <p class="benefit-desc-enhanced">Tim profesional siap membantu kapan saja</p>
                        <ul class="benefit-features">
                            <li>Customer service 24 jam</li>
                            <li>Emergency support</li>
                            <li>Technical assistance</li>
                        </ul>
                    </div>
                    
                    <div class="benefit-card-enhanced">
                        <div class="benefit-icon-enhanced">
                            <i class="bi bi-currency-dollar"></i>
                        </div>
                        <h4 class="benefit-title-enhanced">Harga Kompetitif</h4>
                        <p class="benefit-desc-enhanced">Harga terbaik tanpa biaya tersembunyi</p>
                        <ul class="benefit-features">
                            <li>Harga transparan</li>
                            <li>Promo reguler</li>
                            <li>Diskon pelanggan setia</li>
                        </ul>
                    </div>
                    
                    <div class="benefit-card-enhanced">
                        <div class="benefit-icon-enhanced">
                            <i class="bi bi-truck"></i>
                        </div>
                        <h4 class="benefit-title-enhanced">Armada Lengkap</h4>
                        <p class="benefit-desc-enhanced">Berbagai jenis kendaraan untuk semua kebutuhan</p>
                        <ul class="benefit-features">
                            <li>Mobil penumpang</li>
                            <li>Truk & pickup</li>
                            <li>Bus & minibus</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Recent Orders Enhanced -->
            <div class="orders-section">
                <div class="section-header">
                    <div>
                        <h2 class="section-title">Pemesanan Terkini</h2>
                        <p class="section-subtitle">Lacak status pemesanan Anda</p>
                    </div>
                    <div>
                        <a href="{{ route('pemesanan.index') }}" class="btn btn-outline-primary">
                            Lihat Semua <i class="bi bi-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
                
                <div class="orders-card">
                    @if($pemesanans->count() > 0)
                        <div class="orders-timeline">
                            @foreach($pemesanans->take(4) as $pemesanan)
                                <div class="timeline-item">
                                    <div class="order-details">
                                        <div class="order-info-expanded">
                                            <div class="order-vehicle-name">{{ $pemesanan->kendaraan->nama_kendaraan }}</div>
                                            <div class="order-meta">
                                                <div class="order-meta-item">
                                                    <i class="bi bi-calendar"></i>
                                                    {{ $pemesanan->tanggal_mulai->format('d M Y') }}
                                                </div>
                                                <div class="order-meta-item">
                                                    <i class="bi bi-clock"></i>
                                                    {{ $pemesanan->durasi }} hari
                                                </div>
                                                <div class="order-meta-item">
                                                    <i class="bi bi-cash"></i>
                                                    {{ $pemesanan->total_harga_formatted ?? 'Rp ' . number_format($pemesanan->total_harga, 0, ',', '.') }}
                                                </div>
                                            </div>
                                            <div class="order-progress">
                                                <div class="order-progress-bar" style="width: {{   
                                                    $pemesanan->status == 'disetujui' ? '100%' : 
                                                    ($pemesanan->status == 'diproses' ? '60%' : 
                                                    ($pemesanan->status == 'pending' ? '30%' : '0%')) 
                                                }}"></div>
                                            </div>
                                        </div>
                                        <div>
                                            <span class="badge bg-{{ 
                                                $pemesanan->status == 'disetujui' ? 'success' : 
                                                ($pemesanan->status == 'pending' ? 'warning' : 
                                                ($pemesanan->status == 'ditolak' ? 'danger' : 'info')) 
                                            }} p-2">
                                                {{ ucfirst($pemesanan->status) }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-5">
                            <i class="bi bi-calendar-x display-1 text-muted mb-4"></i>
                            <h4 class="text-muted mb-3">Belum ada pemesanan</h4>
                            <p class="text-muted mb-4">Mulai sewa kendaraan pertama Anda sekarang</p>
                            <a href="{{ route('kendaraan.index') }}" class="btn btn-primary btn-lg">
                                <i class="bi bi-search me-2"></i> Cari Kendaraan
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Right Section - Additional Information -->
        <div class="additional-section">
            <div class="additional-content">
                <div class="additional-icon">
                    <i class="bi bi-award"></i>
                </div>
                <h3 class="additional-title">Layanan Premium</h3>
                <p class="additional-desc">
                    Kami berkomitmen memberikan pengalaman terbaik dengan layanan premium yang memprioritaskan kenyamanan dan keamanan Anda.
                </p>
                
                <div class="additional-stats">
                    <div class="additional-stat">
                        <div class="additional-stat-number">99%</div>
                        <div class="additional-stat-label">Kepuasan Pelanggan</div>
                    </div>
                    <div class="additional-stat">
                        <div class="additional-stat-number">24/7</div>
                        <div class="additional-stat-label">Layanan Support</div>
                    </div>
                </div>
                
                <div class="mt-4 pt-3 border-top">
                    <h5 class="mb-3">Fasilitas Unggulan:</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Driver Profesional</li>
                        <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Maintenance Rutin</li>
                        <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> GPS Tracking</li>
                        <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Asuransi All Risk</li>
                        <li><i class="bi bi-check-circle-fill text-success me-2"></i> Bantuan Darurat</li>
                    </ul>
                </div>
                
                <div class="mt-4 pt-3 border-top">
                    <a href="{{ route('kendaraan.index') }}" class="btn btn-success w-100">
                        <i class="bi bi-telephone-outbound me-2"></i> Konsultasi Gratis
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Enhanced animations
    document.addEventListener('DOMContentLoaded', function() {
        // Animate stats numbers
        const statNumbers = document.querySelectorAll('.stat-number');
        statNumbers.forEach(stat => {
            const target = parseInt(stat.textContent);
            if (!isNaN(target)) {
                let current = 0;
                const increment = target / 50;
                
                const updateNumber = () => {
                    current += increment;
                    if (current >= target) {
                        stat.textContent = target;
                    } else {
                        stat.textContent = Math.floor(current);
                        requestAnimationFrame(updateNumber);
                    }
                };
                
                setTimeout(updateNumber, 300);
            }
        });
        
        // Stagger vehicle cards animation
        const vehicleCards = document.querySelectorAll('.vehicle-card-enhanced');
        vehicleCards.forEach((card, index) => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(40px) scale(0.95)';
            
            setTimeout(() => {
                card.style.transition = 'all 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275)';
                card.style.opacity = '1';
                card.style.transform = 'translateY(0) scale(1)';
            }, index * 200);
        });
        
        // Parallax effect for CTA background
        const ctaSection = document.querySelector('.cta-section-enhanced');
        if (ctaSection) {
            ctaSection.addEventListener('mousemove', (e) => {
                const xAxis = (window.innerWidth / 2 - e.pageX) / 25;
                const yAxis = (window.innerHeight / 2 - e.pageY) / 25;
                const background = ctaSection.querySelector('.cta-background');
                if (background) {
                    background.style.transform = `translateX(${xAxis}px) translateY(${yAxis}px)`;
                }
            });
        }
        
        // Progress bar animation
        const progressBars = document.querySelectorAll('.order-progress-bar');
        progressBars.forEach(bar => {
            const width = bar.style.width;
            bar.style.width = '0';
            setTimeout(() => {
                bar.style.transition = 'width 1.2s ease';
                bar.style.width = width;
            }, 500);
        });
        
        // Hover effect enhancement
        const cards = document.querySelectorAll('.stat-card-enhanced, .benefit-card-enhanced, .additional-section');
        cards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                if (this.classList.contains('additional-section')) {
                    this.style.transform = 'translateY(-5px)';
                } else if (this.classList.contains('stat-card-enhanced')) {
                    this.style.transform = 'translateY(-8px) scale(1.02)';
                } else {
                    this.style.transform = 'translateY(-5px)';
                }
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0) scale(1)';
            });
        });
        
        // Animate additional stats
        const additionalStats = document.querySelectorAll('.additional-stat-number');
        additionalStats.forEach(stat => {
            const text = stat.textContent;
            if (text.includes('%')) {
                stat.style.fontSize = '0';
                setTimeout(() => {
                    stat.style.transition = 'font-size 0.8s ease';
                    stat.style.fontSize = '2rem';
                }, 800);
            }
        });
    });
</script>
@endsection