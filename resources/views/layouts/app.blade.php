<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - MKT Transport</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        body { 
            padding-top: 70px; 
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        
        main {
            flex: 1;
        }
        
        .navbar-brand { 
            font-weight: bold;
            font-size: 1.3rem;
        }
        
        .navbar-brand i {
            color: #0d6efd;
            margin-right: 8px;
        }
        
        /* Footer Styles */
        .footer {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            color: white;
            padding: 3rem 0 1.5rem;
            margin-top: auto;
            position: relative;
            overflow: hidden;
        }
        
        .footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, #0d6efd, #28a745, #ffc107);
        }
        
        .footer-logo {
            font-size: 1.5rem;
            font-weight: 700;
            color: white;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .footer-logo i {
            color: #0d6efd;
            background: white;
            padding: 8px;
            border-radius: 10px;
            font-size: 1.3rem;
        }
        
        .footer-description {
            color: rgba(255, 255, 255, 0.8);
            line-height: 1.6;
            font-size: 0.95rem;
            margin-bottom: 1.5rem;
        }
        
        .footer-heading {
            color: white;
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            position: relative;
            padding-bottom: 10px;
        }
        
        .footer-heading::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 3px;
            background: #0d6efd;
            border-radius: 2px;
        }
        
        .footer-links {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        
        .footer-links li {
            margin-bottom: 0.8rem;
        }
        
        .footer-links a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: all 0.3s;
            font-size: 0.95rem;
        }
        
        .footer-links a:hover {
            color: white;
            transform: translateX(5px);
        }
        
        .footer-links a i {
            color: #0d6efd;
            font-size: 1.1rem;
            width: 20px;
            text-align: center;
        }
        
        .footer-contact {
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.95rem;
        }
        
        .footer-divider {
            border-color: rgba(255, 255, 255, 0.1);
            margin: 2rem 0;
        }
        
        .footer-bottom {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 1.5rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .copyright {
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.9rem;
        }
        
        .footer-social {
            display: flex;
            gap: 15px;
        }
        
        .social-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            color: white;
            text-decoration: none;
            transition: all 0.3s;
        }
        
        .social-icon:hover {
            background: #0d6efd;
            transform: translateY(-3px);
        }
        
        .opening-hours {
            background: rgba(255, 255, 255, 0.1);
            padding: 15px;
            border-radius: 10px;
            margin-top: 10px;
        }
        
        .opening-hours p {
            margin-bottom: 5px;
            display: flex;
            justify-content: space-between;
        }
        
        .opening-hours p:last-child {
            margin-bottom: 0;
        }
        
        .hours {
            color: #0d6efd;
            font-weight: 500;
        }
        
        /* Responsive Footer */
        @media (max-width: 768px) {
            .footer {
                text-align: center;
                padding: 2rem 0 1rem;
            }
            
            .footer-heading::after {
                left: 50%;
                transform: translateX(-50%);
            }
            
            .footer-links a:hover {
                transform: none;
            }
            
            .footer-bottom {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }
            
            .footer-social {
                justify-content: center;
            }
        }
        
        /* Card hover effect */
        .card { 
            transition: transform 0.3s; 
            border: none;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        }
        
        .card:hover { 
            transform: translateY(-8px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }
        
        /* Navbar enhancement */
        .navbar {
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .nav-link {
            font-weight: 500;
            transition: all 0.3s;
            border-radius: 5px;
            margin: 0 2px;
        }
        
        .nav-link:hover {
            background: rgba(13, 110, 253, 0.1);
        }
        
        .dropdown-menu {
            border: none;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            border-radius: 10px;
            margin-top: 10px;
        }
        
        .dropdown-item {
            padding: 0.5rem 1rem;
            border-radius: 5px;
            margin: 2px;
            transition: all 0.3s;
        }
        
        .dropdown-item:hover {
            background: rgba(13, 110, 253, 0.1);
            color: #0d6efd;
        }
    </style>
</head>
<body>
    <!-- Header/Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <i class="bi bi-car-front-fill"></i> MKT Transport
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    @auth
                        @if(Auth::user()->isAdmin())
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                                    <i class="bi bi-speedometer2"></i> Dashboard Admin
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.kendaraan.index') }}">
                                    <i class="bi bi-truck"></i> Kelola Kendaraan
                                </a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.dashboard') }}">
                                    <i class="bi bi-house"></i> Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('kendaraan.index') }}">
                                    <i class="bi bi-search"></i> Cari Kendaraan
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('pemesanan.index') }}">
                                    <i class="bi bi-calendar-check"></i> Pemesanan Saya
                                </a>
                            </li>
                        @endif
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                                <i class="bi bi-person-circle"></i> {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item">
                                            <i class="bi bi-box-arrow-right"></i> Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">
                                <i class="bi bi-box-arrow-in-right"></i> Login
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">
                                <i class="bi bi-person-plus"></i> Register
                            </a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Enhanced Footer -->
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
@stack('scripts')

<script>
    // Add animation to footer links
    document.addEventListener('DOMContentLoaded', function() {
        // ... existing code for footer links and scroll to top ...
    });
</script>

<!-- ✅ ✅ ✅ TAMBAHKAN HTTPS FIX SCRIPT DI SINI ✅ ✅ ✅ -->
<script>
// ==================== HTTPS NUCLEAR ENFORCEMENT ====================
(function() {
    'use strict';
    
    console.log('🔒 Initializing HTTPS Enforcement System...');
    
    // 1. IMMEDIATE HTTP TO HTTPS REDIRECT
    if (window.location.protocol === 'http:') {
        console.warn('🚨 HTTP detected! Redirecting to HTTPS immediately...');
        const httpsUrl = window.location.href.replace('http://', 'https://');
        window.location.replace(httpsUrl);
        return;
    }
    
    // 2. FUNCTION TO FORCE HTTPS ON ANY URL
    function enforceHttps(url) {
        if (!url || typeof url !== 'string') return url;
        return url.replace(/^http:\/\//i, 'https://');
    }
    
    // 3. FIX ALL FORMS ON PAGE
    function secureForms() {
        const forms = document.querySelectorAll('form');
        console.log(`🔧 Checking ${forms.length} forms for HTTPS...`);
        
        forms.forEach(form => {
            // Fix form action
            if (form.action && form.action.startsWith('http://')) {
                console.log(`   Fixing form action: ${form.action}`);
                form.action = enforceHttps(form.action);
            }
            
            // Add submit protection if not already
            if (!form.hasAttribute('data-https-secured')) {
                form.setAttribute('data-https-secured', 'true');
                
                form.addEventListener('submit', function(event) {
                    if (this.action && this.action.startsWith('http://')) {
                        console.warn('⚠️ Blocked HTTP form submission!');
                        event.preventDefault();
                        this.action = enforceHttps(this.action);
                        this.submit();
                    }
                });
            }
        });
    }
    
    // 4. FIX ALL LINKS ON PAGE
    function secureLinks() {
        const links = document.querySelectorAll('a');
        console.log(`🔗 Checking ${links.length} links for HTTPS...`);
        
        links.forEach(link => {
            if (link.href && link.href.startsWith('http://')) {
                console.log(`   Fixing link: ${link.href}`);
                link.href = enforceHttps(link.href);
                
                // Add click protection
                link.addEventListener('click', function(e) {
                    if (this.href.startsWith('http://')) {
                        e.preventDefault();
                        window.location.href = enforceHttps(this.href);
                    }
                });
            }
        });
    }
    
    // 5. INITIAL SECURITY CHECK ON PAGE LOAD
    document.addEventListener('DOMContentLoaded', function() {
        console.log('📄 Page loaded, applying HTTPS enforcement...');
        secureForms();
        secureLinks();
        
        // Check current page URL
        console.log(`📍 Current URL: ${window.location.href}`);
        console.log(`🔐 Protocol: ${window.location.protocol}`);
    });
    
    // 6. WATCH FOR DYNAMICALLY ADDED CONTENT (AJAX, MODALS, ETC)
    const securityObserver = new MutationObserver(function(mutations) {
        let shouldCheck = false;
        
        mutations.forEach(function(mutation) {
            if (mutation.addedNodes.length > 0) {
                shouldCheck = true;
            }
        });
        
        if (shouldCheck) {
            setTimeout(function() {
                console.log('🔄 Dynamic content detected, re-checking security...');
                secureForms();
                secureLinks();
            }, 50);
        }
    });
    
    // Start security observer
    securityObserver.observe(document.body, {
        childList: true,
        subtree: true
    });
    
    // 7. OVERRIDE BROWSER HISTORY API TO PREVENT HTTP PUSHSTATE
    const originalPushState = history.pushState;
    history.pushState = function(state, title, url) {
        if (url && url.toString().startsWith('http://')) {
            console.warn('🛡️ Blocked HTTP history.pushState');
            url = enforceHttps(url.toString());
        }
        return originalPushState.call(this, state, title, url);
    };
    
    console.log('✅ HTTPS Enforcement System fully activated');
    
})();
// ==================== END HTTPS ENFORCEMENT ====================
</script>

</body>
</html>