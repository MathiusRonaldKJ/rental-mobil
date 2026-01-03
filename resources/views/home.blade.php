<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MKT Transport - Solusi Rental Kendaraan Terpercaya</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #0d6efd;
            --secondary: #ff6b35;
            --dark: #1a1a2e;
            --light: #f8f9fa;
        }
        
        * {
            font-family: 'Poppins', sans-serif;
        }
        
        body {
            padding-top: 0;
            background-color: var(--light);
        }
        
        /* Navbar */
        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            color: white !important;
        }
        
        .navbar {
            background: linear-gradient(135deg, var(--primary) 0%, #0a58ca 100%);
            padding: 15px 0;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }
        
        .nav-link {
            font-weight: 500;
            margin: 0 8px;
            color: rgba(255,255,255,0.9) !important;
            transition: all 0.3s;
        }
        
        .nav-link:hover {
            color: white !important;
            transform: translateY(-2px);
        }
        
        .btn-warning-custom {
            background: linear-gradient(135deg, var(--secondary) 0%, #e55a00 100%);
            border: none;
            color: white;
            font-weight: 600;
            padding: 10px 25px;
            border-radius: 50px;
            transition: all 0.3s;
        }
        
        .btn-warning-custom:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 15px rgba(255, 107, 53, 0.4);
        }
        
        /* Hero Section */
        .hero-section {
            background: linear-gradient(rgba(26, 26, 46, 0.85), rgba(26, 26, 46, 0.9)), 
                      url('https://images.unsplash.com/photo-1549399542-7e3f8b79c341?ixlib=rb-4.0.3&auto=format&fit=crop&w=1600&q=80');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: white;
            padding: 150px 0 100px;
            position: relative;
            overflow: hidden;
        }
        
        .hero-section::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100px;
            background: linear-gradient(to top, var(--light), transparent);
        }
        
        .hero-title {
            font-size: 3.5rem;
            font-weight: 800;
            line-height: 1.2;
            margin-bottom: 25px;
            text-shadow: 2px 2px 8px rgba(0,0,0,0.3);
        }
        
        .hero-subtitle {
            font-size: 1.3rem;
            opacity: 0.9;
            margin-bottom: 40px;
            max-width: 700px;
        }
        
        .highlight-text {
            color: var(--secondary);
            position: relative;
        }
        
        .highlight-text::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 100%;
            height: 3px;
            background: var(--secondary);
            border-radius: 2px;
        }
        
        /* Features */
        .feature-card {
            background: white;
            border-radius: 15px;
            padding: 30px;
            height: 100%;
            transition: all 0.3s ease;
            border: 1px solid #eaeaea;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }
        
        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
            border-color: var(--primary);
        }
        
        .feature-icon {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, var(--primary) 0%, #0a58ca 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 25px;
            font-size: 30px;
            color: white;
        }
        
        .feature-icon.secondary {
            background: linear-gradient(135deg, var(--secondary) 0%, #e55a00 100%);
        }
        
        /* Statistics */
        .stats-section {
            background: linear-gradient(135deg, var(--primary) 0%, #0a58ca 100%);
            color: white;
            padding: 80px 0;
        }
        
        .stat-number {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 10px;
        }
        
        /* Vehicle Showcase */
        .vehicle-card {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
            transition: all 0.3s;
            background: white;
        }
        
        .vehicle-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.15);
        }
        
        .vehicle-img {
            height: 200px;
            width: 100%;
            object-fit: cover;
        }
        
        /* Testimonials */
        .testimonial-card {
            background: white;
            border-radius: 15px;
            padding: 30px;
            margin: 20px 0;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            border-left: 5px solid var(--primary);
        }
        
        .testimonial-text {
            font-style: italic;
            color: #555;
            margin-bottom: 20px;
        }
        
        .client-name {
            font-weight: 600;
            color: var(--dark);
        }
        
        /* CTA Section */
        .cta-section {
            background: linear-gradient(rgba(26, 26, 46, 0.9), rgba(26, 26, 46, 0.95)), 
                      url('https://images.unsplash.com/photo-1533473359331-0135ef1b58bf?ixlib=rb-4.0.3&auto=format&fit=crop&w=1600&q=80');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 100px 0;
            text-align: center;
        }
        
        .cta-title {
            font-size: 2.8rem;
            font-weight: 700;
            margin-bottom: 20px;
        }
        
        /* Footer */
        .footer {
            background: var(--dark);
            color: white;
            padding: 60px 0 20px;
        }
        
        .footer h5 {
            font-weight: 600;
            margin-bottom: 25px;
            color: white;
        }
        
        .footer-links a {
            color: rgba(255,255,255,0.7);
            text-decoration: none;
            display: block;
            margin-bottom: 10px;
            transition: all 0.3s;
        }
        
        .footer-links a:hover {
            color: var(--secondary);
            padding-left: 5px;
        }
        
        .social-icons a {
            display: inline-block;
            width: 40px;
            height: 40px;
            background: rgba(255,255,255,0.1);
            border-radius: 50%;
            text-align: center;
            line-height: 40px;
            margin-right: 10px;
            color: white;
            transition: all 0.3s;
        }
        
        .social-icons a:hover {
            background: var(--primary);
            transform: translateY(-3px);
        }
        
        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .fade-in-up {
            animation: fadeInUp 0.8s ease forwards;
        }
        
        .delay-1 { animation-delay: 0.2s; }
        .delay-2 { animation-delay: 0.4s; }
        .delay-3 { animation-delay: 0.6s; }
        
        /* Responsive */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }
            
            .hero-subtitle {
                font-size: 1.1rem;
            }
            
            .cta-title {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="/">
                <i class="bi bi-car-front-fill me-2"></i> MKT Transport
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#beranda">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#layanan">Layanan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#kendaraan">Kendaraan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#tentang">Tentang Kami</a>
                    </li>
                    <li class="nav-item ms-lg-2">
                        <a class="nav-link btn btn-warning-custom px-4" href="{{ route('login') }}">
                            <i class="bi bi-box-arrow-in-right me-1"></i> Login
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section" id="beranda">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 fade-in-up">
                    <h1 class="hero-title">
                        Solusi Terbaik untuk <span class="highlight-text">Rental Kendaraan</span> Anda
                    </h1>
                    <p class="hero-subtitle">
                        MKT Transport memberikan pengalaman rental kendaraan yang aman, nyaman, dan terpercaya. 
                        Dengan armada modern dan pelayanan profesional, kami siap melayani kebutuhan transportasi 
                        penumpang dan barang Anda.
                    </p>
                    <div class="d-flex flex-wrap gap-3">
                        <a href="{{ route('register') }}" class="btn btn-warning-custom btn-lg">
                            <i class="bi bi-person-plus me-2"></i> Daftar Sekarang
                        </a>
                        <a href="#kendaraan" class="btn btn-outline-light btn-lg">
                            <i class="bi bi-car-front me-2"></i> Lihat Kendaraan
                        </a>
                    </div>
                </div>
                <div class="col-lg-5 mt-5 mt-lg-0">
                    <div class="text-center fade-in-up delay-1">
                        <img src="https://asset.kompas.com/crops/cR19Nne7z_pZw-sOlzl3VNK10qU=/0x1148:2000x2481/1200x800/data/photo/2022/09/06/6316f3d37f0e5.jpg" 
                             alt="Armada MKT Transport" 
                             class="img-fluid rounded-3 shadow-lg" 
                             style="max-height: 400px;">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-3 col-6 mb-4">
                    <div class="stat-number">500+</div>
                    <p>Kendaraan Tersedia</p>
                </div>
                <div class="col-md-3 col-6 mb-4">
                    <div class="stat-number">10K+</div>
                    <p>Pelanggan Puas</p>
                </div>
                <div class="col-md-3 col-6 mb-4">
                    <div class="stat-number">24/7</div>
                    <p>Layanan Support</p>
                </div>
                <div class="col-md-3 col-6 mb-4">
                    <div class="stat-number">98%</div>
                    <p>Kepuasan Pelanggan</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-5" id="layanan">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold mb-3">Kenapa Memilih <span class="text-primary">MKT Transport</span>?</h2>
                <p class="lead text-muted">Kami memberikan pengalaman rental yang berbeda dengan layanan terbaik</p>
            </div>
            
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 fade-in-up">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="bi bi-shield-check"></i>
                        </div>
                        <h4>Keamanan Terjamin</h4>
                        <p class="text-muted">Semua kendaraan kami melalui pemeriksaan rutin dan dilengkapi asuransi lengkap untuk keamanan perjalanan Anda.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 fade-in-up delay-1">
                    <div class="feature-card">
                        <div class="feature-icon secondary">
                            <i class="bi bi-clock-history"></i>
                        </div>
                        <h4>Layanan 24/7</h4>
                        <p class="text-muted">Tim support kami siap membantu kapan saja, termasuk untuk kebutuhan rental mendadak di luar jam kerja.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 fade-in-up delay-2">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="bi bi-currency-dollar"></i>
                        </div>
                        <h4>Harga Transparan</h4>
                        <p class="text-muted">Tidak ada biaya tersembunyi. Semua harga sudah termasuk pajak, asuransi, dan biaya operasional.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 fade-in-up">
                    <div class="feature-card">
                        <div class="feature-icon secondary">
                            <i class="bi bi-car-front"></i>
                        </div>
                        <h4>Armada Modern</h4>
                        <p class="text-muted">Kendaraan terbaru dengan kondisi prima, terawat, dan nyaman untuk berbagai keperluan.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 fade-in-up delay-1">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="bi bi-person-check"></i>
                        </div>
                        <h4>Driver Profesional</h4>
                        <p class="text-muted">Driver berpengalaman dengan sertifikat resmi untuk perjalanan yang aman dan nyaman.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 fade-in-up delay-2">
                    <div class="feature-card">
                        <div class="feature-icon secondary">
                            <i class="bi bi-phone"></i>
                        </div>
                        <h4>Booking Online</h4>
                        <p class="text-muted">Proses booking mudah melalui website, dengan konfirmasi instan dan pembayaran yang aman.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Vehicle Showcase -->
    <section class="py-5 bg-light" id="kendaraan">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold mb-3">Armada <span class="text-primary">Kendaraan</span> Kami</h2>
                <p class="lead text-muted">Pilih kendaraan sesuai kebutuhan Anda</p>
            </div>
            
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="vehicle-card fade-in-up">
                        <img src="https://tse2.mm.bing.net/th/id/OIP.uxvH3hOindZVVQDVhZOqZAHaEK?rs=1&pid=ImgDetMain&o=7&rm=3" 
                             class="vehicle-img" alt="Mobil Penumpang">
                        <div class="p-4">
                            <h4>Kendaraan Penumpang</h4>
                            <p class="text-muted">Untuk perjalanan bisnis, keluarga, atau wisata dengan kapasitas 2-8 orang.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="fw-bold text-primary">Mulai dari Rp 500.000/hari</span>
                                <a href="{{ route('register') }}" class="btn btn-primary btn-sm">
                                    <i class="bi bi-calendar-check me-1"></i> Sewa
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6">
                    <div class="vehicle-card fade-in-up delay-2">
                        <img src="https://www.sunstarmotor.id/wp-content/uploads/l300-web-catalogue-768x768-1.jpg" 
                             class="vehicle-img" alt="Bus">
                        <div class="p-4">
                            <h4>Kendaraan Barang</h4>
                            <p class="text-muted">Untuk keperluan antar barang.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="fw-bold text-primary">Mulai dari Rp 400.000/hari</span>
                                <a href="{{ route('register') }}" class="btn btn-primary btn-sm">
                                    <i class="bi bi-calendar-check me-1"></i> Sewa
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="vehicle-card fade-in-up">
                        <img src="https://meccarentcar.com/wp-content/uploads/2024/12/vip-luxury-isuzu-elf.png" 
                             class="vehicle-img" alt="Mobil Penumpang">
                        <div class="p-4">
                            <h4>Elf & Medium Bus</h4>
                            <p class="text-muted">Untuk perjalanan bisnis, keluarga, atau wisata dengan kapasitas 19-33 orang.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="fw-bold text-primary">Mulai dari Rp 800.000/hari</span>
                                <a href="{{ route('register') }}" class="btn btn-primary btn-sm">
                                    <i class="bi bi-calendar-check me-1"></i> Sewa
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="py-5" id="tentang">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold mb-3">Apa Kata <span class="text-primary">Pelanggan</span> Kami?</h2>
                <p class="lead text-muted">Testimoni dari pelanggan yang sudah merasakan layanan MKT Transport</p>
            </div>
            
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="testimonial-card">
                        <div class="testimonial-text">
                            "Layanan sangat profesional! Kendaraan bersih dan nyaman. Driver juga ramah dan berpengalaman. Recommended!"
                        </div>
                        <div class="d-flex align-items-center">
                            <img src="https://randomuser.me/api/portraits/men/32.jpg" 
                                 class="rounded-circle me-3" 
                                 width="50" 
                                 height="50" 
                                 alt="Client">
                            <div>
                                <div class="client-name">Budi Santoso</div>
                                <small class="text-muted">CEO Perusahaan XYZ</small>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 mb-4">
                    <div class="testimonial-card">
                        <div class="testimonial-text">
                            "Proses booking mudah, harga kompetitif. Sudah beberapa kali sewa untuk kebutuhan logistik perusahaan."
                        </div>
                        <div class="d-flex align-items-center">
                            <img src="https://randomuser.me/api/portraits/women/44.jpg" 
                                 class="rounded-circle me-3" 
                                 width="50" 
                                 height="50" 
                                 alt="Client">
                            <div>
                                <div class="client-name">Sari Dewi</div>
                                <small class="text-muted">Manager Logistik</small>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 mb-4">
                    <div class="testimonial-card">
                        <div class="testimonial-text">
                            "Untuk acara keluarga besar, kami sewa minibus. Semua puas dengan pelayanan dan kenyamanannya."
                        </div>
                        <div class="d-flex align-items-center">
                            <img src="https://randomuser.me/api/portraits/men/65.jpg" 
                                 class="rounded-circle me-3" 
                                 width="50" 
                                 height="50" 
                                 alt="Client">
                            <div>
                                <div class="client-name">Ahmad Fauzi</div>
                                <small class="text-muted">Karyawan Swasta</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="cta-title">Siap Memulai Perjalanan dengan MKT Transport?</h2>
                    <p class="lead mb-4 opacity-75">
                        Daftar sekarang dan dapatkan penawaran spesial untuk pelanggan baru. 
                        Proses cepat, aman, dan terpercaya.
                    </p>
                    <div class="d-flex flex-wrap justify-content-center gap-3">
                        <a href="{{ route('register') }}" class="btn btn-warning-custom btn-lg px-5">
                            <i class="bi bi-person-plus me-2"></i> Daftar Sekarang
                        </a>
                        <a href="{{ route('login') }}" class="btn btn-outline-light btn-lg px-5">
                            <i class="bi bi-box-arrow-in-right me-2"></i> Login
                        </a>
                    </div>
                    <p class="mt-4 opacity-75">
                        Butuh bantuan? Hubungi kami di <strong>081227682833</strong>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <h5><i class="bi bi-car-front-fill me-2"></i> MKT Transport</h5>
                    <p class="opacity-75">
                        Rental kendaraan terpercaya dengan pengalaman lebih dari 10 tahun. 
                        Melayani berbagai kebutuhan transportasi dengan standar keamanan dan kenyamanan tertinggi.
                    </p>
                    <div class="social-icons mt-4">
                        <a href="#"><i class="bi bi-facebook"></i></a>
                        <a href="#"><i class="bi bi-instagram"></i></a>
                        <a href="#"><i class="bi bi-twitter"></i></a>
                        <a href="#"><i class="bi bi-whatsapp"></i></a>
                    </div>
                </div>
                
                <div class="col-lg-2 col-md-6 mb-4">
                    <h5>Layanan</h5>
                    <div class="footer-links">
                        <a href="#layanan">Rental Harian</a>
                        <a href="#layanan">Rental Bulanan</a>
                        <a href="#layanan">Dengan Driver</a>
                        <a href="#layanan">Tanpa Driver</a>
                        <a href="#layanan">Layanan Korporat</a>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6 mb-4">
                    <h5>Kontak Kami</h5>
                    <div class="footer-links">
                        <a href="tel:081234567890">
                            <i class="bi bi-telephone me-2"></i> 081227682833
                        </a>
                        <a href="mailto:info@mkt-transport.com">
                            <i class="bi bi-envelope me-2"></i> mkttransport.com
                        </a>
                        <a href="#">
                            <i class="bi bi-geo-alt me-2"></i> Jl. Dekso-Plono, Puyang, Purwoharjo, Samigaluh< Kulon Progo
                        </a>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6 mb-4">
                    <h5>Jam Operasional</h5>
                    <div class="opacity-75">
                        <p>Senin - Minggu: 24 Jam</p>
                    </div>
                </div>
            </div>
            
            <hr class="opacity-25">
            
            <div class="row mt-4">
                <div class="col-md-6">
                    <p class="mb-0 opacity-75">
                        &copy; <span id="currentYear"></span> MKT Transport. All rights reserved.
                    </p>
                </div>
                <div class="col-md-6 text-md-end">
                    <a href="#" class="text-white opacity-75 me-3">Kebijakan Privasi</a>
                    <a href="#" class="text-white opacity-75">Syarat & Ketentuan</a>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Set current year in footer
        document.getElementById('currentYear').textContent = new Date().getFullYear();
        
        // Smooth scroll for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const targetId = this.getAttribute('href');
                if(targetId === '#') return;
                
                const targetElement = document.querySelector(targetId);
                if(targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 80,
                        behavior: 'smooth'
                    });
                }
            });
        });
        
        // Navbar background on scroll
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.style.background = 'linear-gradient(135deg, var(--primary) 0%, #0a58ca 100%)';
                navbar.style.boxShadow = '0 4px 12px rgba(0,0,0,0.15)';
            } else {
                navbar.style.background = 'linear-gradient(135deg, var(--primary) 0%, #0a58ca 100%)';
                navbar.style.boxShadow = '0 4px 12px rgba(0,0,0,0.1)';
            }
        });
        
        // Fade in animation on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('fade-in-up');
                }
            });
        }, observerOptions);
        
        // Observe elements with animation classes
        document.querySelectorAll('.fade-in-up').forEach(el => {
            observer.observe(el);
        });
    </script>
</body>
</html>