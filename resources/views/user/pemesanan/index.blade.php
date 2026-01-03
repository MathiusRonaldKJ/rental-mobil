@extends('layouts.app')

@section('title', 'Home - Rental Kendaraan')

@section('content')
<!-- Hero Section -->
<div class="hero-bg rounded-3 mb-5">
    <div class="container py-5">
        <h1 class="display-4 fw-bold">Sewa Kendaraan Mudah & Terpercaya</h1>
        <p class="lead mb-4">Temukan berbagai pilihan kendaraan untuk kebutuhan penumpang dan barang Anda.</p>
        @auth
            @if(Auth::user()->isAdmin())
                <a href="{{ route('admin.dashboard') }}" class="btn btn-primary btn-lg">
                    <i class="bi bi-speedometer2"></i> Dashboard Admin
                </a>
            @else
                <a href="{{ route('user.dashboard') }}" class="btn btn-primary btn-lg">
                    <i class="bi bi-house"></i> Dashboard User
                </a>
            @endif
        @else
            <a href="{{ route('register') }}" class="btn btn-primary btn-lg me-2">
                <i class="bi bi-person-plus"></i> Daftar Sekarang
            </a>
            <a href="{{ route('login') }}" class="btn btn-outline-light btn-lg">
                <i class="bi bi-box-arrow-in-right"></i> Login
            </a>
        @endauth
    </div>
</div>

<!-- Features -->
<div class="container mb-5">
    <div class="row text-center">
        <div class="col-md-4 mb-4">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body">
                    <div class="feature-icon mb-3">
                        <i class="bi bi-shield-check text-primary" style="font-size: 3rem;"></i>
                    </div>
                    <h4>Terpercaya</h4>
                    <p class="text-muted">Kendaraan terawat dengan kondisi prima dan asuransi lengkap.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body">
                    <div class="feature-icon mb-3">
                        <i class="bi bi-coin text-primary" style="font-size: 3rem;"></i>
                    </div>
                    <h4>Harga Terjangkau</h4>
                    <p class="text-muted">Harga kompetitif dengan berbagai pilihan kendaraan sesuai budget.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body">
                    <div class="feature-icon mb-3">
                        <i class="bi bi-headset text-primary" style="font-size: 3rem;"></i>
                    </div>
                    <h4>Support 24/7</h4>
                    <p class="text-muted">Tim support siap membantu kapan saja Anda membutuhkan.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Call to Action -->
<div class="bg-light py-5 mb-5">
    <div class="container text-center">
        <h2 class="mb-3">Siap Menyewa Kendaraan?</h2>
        <p class="lead mb-4">Bergabunglah dengan ribuan pelanggan yang telah mempercayakan kebutuhan transportasi mereka kepada kami.</p>
        @auth
            <a href="{{ route('kendaraan.index') }}" class="btn btn-primary btn-lg">
                <i class="bi bi-search"></i> Lihat Kendaraan Tersedia
            </a>
        @else
            <a href="{{ route('register') }}" class="btn btn-primary btn-lg">
                <i class="bi bi-person-plus"></i> Daftar Sekarang
            </a>
        @endauth
    </div>
</div>
@endsection