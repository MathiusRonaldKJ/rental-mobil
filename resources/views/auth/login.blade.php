@extends('layouts.app')

@section('title', 'Login - MKT Transport')

@section('content')
<style>
    :root {
        --primary: #0d6efd;
        --primary-light: rgba(13, 110, 253, 0.1);
        --primary-dark: #0a58ca;
        --gradient-primary: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
        --gradient-dark: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
        --shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        --shadow-hover: 0 15px 40px rgba(0, 0, 0, 0.2);
    }

    .login-container {
        min-height: calc(100vh - 200px);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 2rem 0;
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        position: relative;
        overflow: hidden;
    }

    .login-container::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -50%;
        width: 100%;
        height: 200%;
        background: var(--gradient-primary);
        opacity: 0.05;
        transform: rotate(15deg);
    }

    .login-card {
        background: white;
        border-radius: 24px;
        box-shadow: var(--shadow);
        overflow: hidden;
        transition: all 0.3s ease;
        border: none;
        position: relative;
        z-index: 2;
        max-width: 450px;
        width: 100%;
    }

    .login-card:hover {
        box-shadow: var(--shadow-hover);
        transform: translateY(-5px);
    }

    .login-header {
        background: var(--gradient-primary);
        padding: 2.5rem 2rem;
        text-align: center;
        color: white;
        position: relative;
        overflow: hidden;
    }

    .login-header::before {
        content: '';
        position: absolute;
        top: -50px;
        right: -50px;
        width: 150px;
        height: 150px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
    }

    .login-header::after {
        content: '';
        position: absolute;
        bottom: -30px;
        left: -30px;
        width: 100px;
        height: 100px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
    }

    .login-icon {
        font-size: 3rem;
        margin-bottom: 1rem;
        display: inline-block;
        background: rgba(255, 255, 255, 0.2);
        width: 80px;
        height: 80px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1rem;
        position: relative;
        z-index: 2;
    }

    .login-title {
        font-size: 1.8rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
        position: relative;
        z-index: 2;
    }

    .login-subtitle {
        font-size: 0.95rem;
        opacity: 0.9;
        position: relative;
        z-index: 2;
    }

    .login-body {
        padding: 2.5rem;
    }

    .form-group-enhanced {
        margin-bottom: 1.5rem;
    }

    .form-label-enhanced {
        font-weight: 600;
        color: #495057;
        margin-bottom: 0.5rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .form-control-enhanced {
        border: 2px solid #e9ecef;
        border-radius: 12px;
        padding: 0.75rem 1rem;
        font-size: 1rem;
        transition: all 0.3s;
        height: 50px;
    }

    .form-control-enhanced:focus {
        border-color: var(--primary);
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
        transform: translateY(-1px);
    }

    .form-control-enhanced.is-invalid {
        border-color: #dc3545;
        background-image: none;
    }

    .input-with-icon {
        position: relative;
    }

    .input-icon {
        position: absolute;
        left: 1rem;
        top: 50%;
        transform: translateY(-50%);
        color: #6c757d;
        font-size: 1.1rem;
    }

    .input-with-icon input {
        padding-left: 3rem;
    }

    .remember-forgot {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.5rem;
    }

    .form-check-custom {
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .form-check-input-custom {
        width: 18px;
        height: 18px;
        border: 2px solid #dee2e6;
        border-radius: 4px;
        cursor: pointer;
    }

    .form-check-input-custom:checked {
        background-color: var(--primary);
        border-color: var(--primary);
    }

    .form-check-label-custom {
        color: #495057;
        font-weight: 500;
        cursor: pointer;
    }

    .forgot-link {
        color: var(--primary);
        text-decoration: none;
        font-weight: 500;
        transition: all 0.3s;
    }

    .forgot-link:hover {
        color: var(--primary-dark);
        text-decoration: underline;
    }

    .btn-login {
        background: var(--gradient-primary);
        border: none;
        border-radius: 12px;
        padding: 0.875rem 1.5rem;
        font-weight: 600;
        color: white;
        width: 100%;
        font-size: 1.1rem;
        transition: all 0.3s;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.75rem;
    }

    .btn-login:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(13, 110, 253, 0.3);
        color: white;
    }

    .login-divider {
        display: flex;
        align-items: center;
        margin: 2rem 0;
        color: #6c757d;
    }

    .login-divider::before,
    .login-divider::after {
        content: '';
        flex: 1;
        height: 1px;
        background: #e9ecef;
    }

    .login-divider span {
        padding: 0 1rem;
        font-size: 0.9rem;
    }

    .register-link-container {
        text-align: center;
        margin-top: 1.5rem;
        padding-top: 1.5rem;
        border-top: 1px solid #e9ecef;
    }

    .register-text {
        color: #6c757d;
        margin-bottom: 0.5rem;
    }

    .btn-register {
        background: transparent;
        border: 2px solid var(--primary);
        color: var(--primary);
        border-radius: 12px;
        padding: 0.75rem 1.5rem;
        font-weight: 600;
        transition: all 0.3s;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        text-decoration: none;
    }

    .btn-register:hover {
        background: var(--primary-light);
        transform: translateY(-2px);
    }

    .login-features {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1rem;
        margin-top: 2rem;
        padding-top: 2rem;
        border-top: 1px solid #e9ecef;
    }

    .feature-item {
        text-align: center;
        padding: 1rem;
        background: var(--primary-light);
        border-radius: 12px;
        transition: all 0.3s;
    }

    .feature-item:hover {
        transform: translateY(-3px);
        background: rgba(13, 110, 253, 0.15);
    }

    .feature-icon {
        font-size: 1.5rem;
        color: var(--primary);
        margin-bottom: 0.5rem;
    }

    .feature-text {
        font-size: 0.85rem;
        color: #495057;
        font-weight: 500;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .login-container {
            padding: 1rem;
        }
        
        .login-body {
            padding: 2rem 1.5rem;
        }
        
        .login-header {
            padding: 2rem 1.5rem;
        }
        
        .login-features {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="login-container">
    <div class="login-card">
        <div class="login-header">
            {{-- ... kode tetap ... --}}
        </div>
        
        <div class="login-body">
            {{-- ✅ FORM ACTION HTTPS --}}
            <form method="POST" action="{{ secure_url('/login') }}">
                                @csrf
                
                {{-- ... field email dan password ... --}}
                
                <div class="remember-forgot">
                    <div class="form-check-custom">
                        {{-- ... checkbox ... --}}
                    </div>

                    {{-- ✅ FORGOT PASSWORD LINK HTTPS --}}
                    <a href="{{ url('/forgot-password') }}" class="forgot-link">
                        Lupa kata sandi?
                    </a>
                </div>
                
                <button type="submit" class="btn-login">
                    <i class="bi bi-box-arrow-in-right"></i>
                    <span>Masuk ke Akun</span>
                </button>
                
                {{-- ... divider dan features ... --}}
            </form>
            
            <div class="register-link-container">
                <p class="register-text">Belum memiliki akun?</p>

                {{-- ✅ REGISTER LINK HTTPS --}}
                <a href="{{ url('/register') }}" class="btn-register">
                    <i class="bi bi-person-plus"></i>
                    <span>Daftar Akun Baru</span>
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Animasi untuk card
        const loginCard = document.querySelector('.login-card');
        loginCard.style.opacity = '0';
        loginCard.style.transform = 'translateY(30px)';
        
        setTimeout(() => {
            loginCard.style.transition = 'all 0.6s ease';
            loginCard.style.opacity = '1';
            loginCard.style.transform = 'translateY(0)';
        }, 100);

        // Animasi untuk form elements
        const formElements = document.querySelectorAll('.form-group-enhanced, .remember-forgot, .btn-login');
        formElements.forEach((element, index) => {
            element.style.opacity = '0';
            element.style.transform = 'translateY(20px)';
            
            setTimeout(() => {
                element.style.transition = 'all 0.5s ease';
                element.style.opacity = '1';
                element.style.transform = 'translateY(0)';
            }, 300 + (index * 100));
        });

        // Toggle password visibility
        const passwordInput = document.getElementById('password');
        const passwordToggle = document.createElement('span');
        passwordToggle.innerHTML = '<i class="bi bi-eye"></i>';
        passwordToggle.style.cssText = `
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #6c757d;
            font-size: 1.1rem;
            z-index: 10;
        `;
        
        passwordInput.parentNode.appendChild(passwordToggle);
        
        passwordToggle.addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            this.innerHTML = type === 'password' ? '<i class="bi bi-eye"></i>' : '<i class="bi bi-eye-slash"></i>';
        });

        // Form validation animation
        const form = document.querySelector('form');
        form.addEventListener('submit', function(e) {
            const inputs = this.querySelectorAll('input[required]');
            let isValid = true;
            
            inputs.forEach(input => {
                if (!input.value.trim()) {
                    isValid = false;
                    input.classList.add('is-invalid');
                    
                    // Shake animation
                    input.style.animation = 'shake 0.5s';
                    setTimeout(() => {
                        input.style.animation = '';
                    }, 500);
                }
            });
            
            if (!isValid) {
                e.preventDefault();
            }
        });

        // Add shake animation
        const style = document.createElement('style');
        style.textContent = `
            @keyframes shake {
                0%, 100% { transform: translateX(0); }
                10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
                20%, 40%, 60%, 80% { transform: translateX(5px); }
            }
        `;
        document.head.appendChild(style);
    });
</script>
@endsection