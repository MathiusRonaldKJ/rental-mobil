@extends('layouts.app')

@section('title', 'Register - MKT Transport')

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

    .register-container {
        min-height: calc(100vh - 200px);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 2rem 0;
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        position: relative;
        overflow: hidden;
    }

    .register-container::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 100%;
        height: 200%;
        background: var(--gradient-primary);
        opacity: 0.05;
        transform: rotate(-15deg);
    }

    .register-card {
        background: white;
        border-radius: 24px;
        box-shadow: var(--shadow);
        overflow: hidden;
        transition: all 0.3s ease;
        border: none;
        position: relative;
        z-index: 2;
        max-width: 500px;
        width: 100%;
    }

    .register-card:hover {
        box-shadow: var(--shadow-hover);
        transform: translateY(-5px);
    }

    .register-header {
        background: var(--gradient-primary);
        padding: 2.5rem 2rem;
        text-align: center;
        color: white;
        position: relative;
        overflow: hidden;
    }

    .register-header::before {
        content: '';
        position: absolute;
        top: -50px;
        left: -50px;
        width: 150px;
        height: 150px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
    }

    .register-header::after {
        content: '';
        position: absolute;
        bottom: -30px;
        right: -30px;
        width: 100px;
        height: 100px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
    }

    .register-icon {
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

    .register-title {
        font-size: 1.8rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
        position: relative;
        z-index: 2;
    }

    .register-subtitle {
        font-size: 0.95rem;
        opacity: 0.9;
        position: relative;
        z-index: 2;
    }

    .register-body {
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

    .password-strength {
        margin-top: 0.5rem;
        display: none;
    }

    .strength-bar {
        height: 5px;
        background: #e9ecef;
        border-radius: 5px;
        margin-bottom: 0.5rem;
        overflow: hidden;
    }

    .strength-fill {
        height: 100%;
        width: 0%;
        border-radius: 5px;
        transition: all 0.3s;
    }

    .strength-text {
        font-size: 0.8rem;
        color: #6c757d;
    }

    .terms-container {
        margin: 1.5rem 0;
        padding: 1rem;
        background: var(--primary-light);
        border-radius: 12px;
        border: 1px solid rgba(13, 110, 253, 0.2);
    }

    .form-check-custom {
        display: flex;
        align-items: flex-start;
        gap: 0.75rem;
    }

    .form-check-input-custom {
        width: 20px;
        height: 20px;
        margin-top: 0.25rem;
        border: 2px solid #dee2e6;
        border-radius: 4px;
        cursor: pointer;
        flex-shrink: 0;
    }

    .form-check-input-custom:checked {
        background-color: var(--primary);
        border-color: var(--primary);
    }

    .form-check-label-custom {
        color: #495057;
        font-size: 0.9rem;
        line-height: 1.4;
        cursor: pointer;
    }

    .terms-link {
        color: var(--primary);
        font-weight: 600;
        text-decoration: none;
    }

    .terms-link:hover {
        text-decoration: underline;
    }

    .btn-register {
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

    .btn-register:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(13, 110, 253, 0.3);
        color: white;
    }

    .register-divider {
        display: flex;
        align-items: center;
        margin: 2rem 0;
        color: #6c757d;
    }

    .register-divider::before,
    .register-divider::after {
        content: '';
        flex: 1;
        height: 1px;
        background: #e9ecef;
    }

    .register-divider span {
        padding: 0 1rem;
        font-size: 0.9rem;
    }

    .login-link-container {
        text-align: center;
        margin-top: 1.5rem;
        padding-top: 1.5rem;
        border-top: 1px solid #e9ecef;
    }

    .login-text {
        color: #6c757d;
        margin-bottom: 0.5rem;
    }

    .btn-login {
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

    .btn-login:hover {
        background: var(--primary-light);
        transform: translateY(-2px);
    }

    .benefits-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 1rem;
        margin-top: 2rem;
        padding-top: 2rem;
        border-top: 1px solid #e9ecef;
    }

    .benefit-item {
        text-align: center;
        padding: 1rem;
        background: var(--primary-light);
        border-radius: 12px;
        transition: all 0.3s;
    }

    .benefit-item:hover {
        transform: translateY(-3px);
        background: rgba(13, 110, 253, 0.15);
    }

    .benefit-icon {
        font-size: 1.5rem;
        color: var(--primary);
        margin-bottom: 0.5rem;
    }

    .benefit-text {
        font-size: 0.85rem;
        color: #495057;
        font-weight: 500;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .register-container {
            padding: 1rem;
        }
        
        .register-body {
            padding: 2rem 1.5rem;
        }
        
        .register-header {
            padding: 2rem 1.5rem;
        }
        
        .benefits-grid {
            grid-template-columns: 1fr;
        }
        
        .form-check-label-custom {
            font-size: 0.85rem;
        }
    }

    @media (max-width: 576px) {
        .register-card {
            margin: 0 1rem;
        }
    }
</style>

<div class="register-container">
    <div class="register-card">
        <div class="register-header">
            <div class="register-icon">
                <i class="bi bi-person-plus"></i>
            </div>
            <h2 class="register-title">Buat Akun Baru</h2>
            <p class="register-subtitle">Bergabunglah dengan komunitas MKT Transport</p>
        </div>
        
        <div class="register-body">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                
                <div class="form-group-enhanced">
                    <label for="name" class="form-label-enhanced">
                        <i class="bi bi-person-circle"></i> Nama Lengkap
                    </label>
                    <div class="input-with-icon">
                        <i class="bi bi-person-circle input-icon"></i>
                        <input type="text" 
                               class="form-control-enhanced @error('name') is-invalid @enderror" 
                               id="name" 
                               name="name" 
                               value="{{ old('name') }}" 
                               required
                               placeholder="Masukkan nama lengkap Anda">
                    </div>
                    @error('name')
                        <div class="invalid-feedback d-block mt-2">
                            <i class="bi bi-exclamation-circle me-1"></i> {{ $message }}
                        </div>
                    @enderror
                </div>
                
                <div class="form-group-enhanced">
                    <label for="email" class="form-label-enhanced">
                        <i class="bi bi-envelope"></i> Alamat Email
                    </label>
                    <div class="input-with-icon">
                        <i class="bi bi-envelope input-icon"></i>
                        <input type="email" 
                               class="form-control-enhanced @error('email') is-invalid @enderror" 
                               id="email" 
                               name="email" 
                               value="{{ old('email') }}" 
                               required
                               placeholder="contoh@email.com">
                    </div>
                    @error('email')
                        <div class="invalid-feedback d-block mt-2">
                            <i class="bi bi-exclamation-circle me-1"></i> {{ $message }}
                        </div>
                    @enderror
                </div>
                
                <div class="form-group-enhanced">
                    <label for="password" class="form-label-enhanced">
                        <i class="bi bi-lock"></i> Kata Sandi
                    </label>
                    <div class="input-with-icon">
                        <i class="bi bi-lock input-icon"></i>
                        <input type="password" 
                               class="form-control-enhanced @error('password') is-invalid @enderror" 
                               id="password" 
                               name="password" 
                               required
                               placeholder="Minimal 8 karakter"
                               oninput="checkPasswordStrength(this.value)">
                    </div>
                    <div class="password-strength" id="passwordStrength">
                        <div class="strength-bar">
                            <div class="strength-fill" id="strengthFill"></div>
                        </div>
                        <div class="strength-text" id="strengthText">Kekuatan kata sandi: lemah</div>
                    </div>
                    @error('password')
                        <div class="invalid-feedback d-block mt-2">
                            <i class="bi bi-exclamation-circle me-1"></i> {{ $message }}
                        </div>
                    @enderror
                </div>
                
                <div class="form-group-enhanced">
                    <label for="password_confirmation" class="form-label-enhanced">
                        <i class="bi bi-lock-fill"></i> Konfirmasi Kata Sandi
                    </label>
                    <div class="input-with-icon">
                        <i class="bi bi-lock-fill input-icon"></i>
                        <input type="password" 
                               class="form-control-enhanced" 
                               id="password_confirmation" 
                               name="password_confirmation" 
                               required
                               placeholder="Ketik ulang kata sandi">
                    </div>
                    <div class="mt-2" id="passwordMatch"></div>
                </div>
                
                <div class="terms-container">
                    <div class="form-check-custom">
                        <input type="checkbox" 
                               class="form-check-input-custom @error('terms') is-invalid @enderror" 
                               id="terms" 
                               name="terms"
                               {{ old('terms') ? 'checked' : '' }}>
                        <label class="form-check-label-custom" for="terms">
                            Saya setuju dengan 
                            <a href="#" class="terms-link">Syarat dan Ketentuan</a> 
                            serta 
                            <a href="#" class="terms-link">Kebijakan Privasi</a>
                            yang berlaku di MKT Transport
                        </label>
                    </div>
                    @error('terms')
                        <div class="invalid-feedback d-block mt-2">
                            <i class="bi bi-exclamation-circle me-1"></i> {{ $message }}
                        </div>
                    @enderror
                </div>
                
                <button type="submit" class="btn-register">
                    <i class="bi bi-person-plus"></i>
                    <span>Buat Akun</span>
                </button>
                
                <div class="register-divider">
                    <span>Manfaat Bergabung</span>
                </div>
                
                <div class="benefits-grid">
                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="bi bi-lightning-charge"></i>
                        </div>
                        <div class="benefit-text">Pemesanan Cepat</div>
                    </div>
                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="bi bi-tag"></i>
                        </div>
                        <div class="benefit-text">Harga Spesial</div>
                    </div>
                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="bi bi-shield-check"></i>
                        </div>
                        <div class="benefit-text">Keamanan Data</div>
                    </div>
                </div>
            </form>
            
            <div class="login-link-container">
                <p class="login-text">Sudah memiliki akun?</p>
                <a href="{{ route('login') }}" class="btn-login">
                    <i class="bi bi-box-arrow-in-right"></i>
                    <span>Masuk ke Akun</span>
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Animasi untuk card
        const registerCard = document.querySelector('.register-card');
        registerCard.style.opacity = '0';
        registerCard.style.transform = 'translateY(30px)';
        
        setTimeout(() => {
            registerCard.style.transition = 'all 0.6s ease';
            registerCard.style.opacity = '1';
            registerCard.style.transform = 'translateY(0)';
        }, 100);

        // Animasi untuk form elements
        const formElements = document.querySelectorAll('.form-group-enhanced, .terms-container, .btn-register');
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
        const confirmPasswordInput = document.getElementById('password_confirmation');
        
        function addPasswordToggle(input) {
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
            
            input.parentNode.appendChild(passwordToggle);
            
            passwordToggle.addEventListener('click', function() {
                const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
                input.setAttribute('type', type);
                this.innerHTML = type === 'password' ? '<i class="bi bi-eye"></i>' : '<i class="bi bi-eye-slash"></i>';
            });
        }

        addPasswordToggle(passwordInput);
        addPasswordToggle(confirmPasswordInput);

        // Password strength checker
        function checkPasswordStrength(password) {
            const strengthFill = document.getElementById('strengthFill');
            const strengthText = document.getElementById('strengthText');
            const passwordStrength = document.getElementById('passwordStrength');
            
            let strength = 0;
            let messages = [];
            
            if (password.length >= 8) strength++;
            else messages.push('Minimal 8 karakter');
            
            if (/[A-Z]/.test(password)) strength++;
            else messages.push('Gunakan huruf kapital');
            
            if (/[a-z]/.test(password)) strength++;
            else messages.push('Gunakan huruf kecil');
            
            if (/[0-9]/.test(password)) strength++;
            else messages.push('Tambahkan angka');
            
            if (/[^A-Za-z0-9]/.test(password)) strength++;
            else messages.push('Tambahkan karakter khusus');
            
            // Show password strength
            passwordStrength.style.display = 'block';
            
            let width = 0;
            let color = '#dc3545';
            let text = 'Sangat Lemah';
            
            if (strength >= 4) {
                width = 100;
                color = '#28a745';
                text = 'Sangat Kuat';
            } else if (strength === 3) {
                width = 75;
                color = '#ffc107';
                text = 'Cukup Kuat';
            } else if (strength === 2) {
                width = 50;
                color = '#fd7e14';
                text = 'Agak Lemah';
            } else if (strength === 1) {
                width = 25;
                color = '#dc3545';
                text = 'Lemah';
            }
            
            strengthFill.style.width = width + '%';
            strengthFill.style.background = color;
            strengthText.textContent = 'Kekuatan kata sandi: ' + text;
            strengthText.style.color = color;
            
            // Show improvement suggestions
            if (messages.length > 0 && password.length > 0) {
                strengthText.innerHTML += '<br><small class="text-muted">Saran: ' + messages.slice(0, 2).join(', ') + '</small>';
            }
        }

        // Password confirmation check
        confirmPasswordInput.addEventListener('input', function() {
            const passwordMatch = document.getElementById('passwordMatch');
            const password = passwordInput.value;
            const confirmPassword = this.value;
            
            if (confirmPassword.length === 0) {
                passwordMatch.innerHTML = '';
                return;
            }
            
            if (password === confirmPassword) {
                passwordMatch.innerHTML = '<span class="text-success"><i class="bi bi-check-circle me-1"></i> Kata sandi cocok</span>';
            } else {
                passwordMatch.innerHTML = '<span class="text-danger"><i class="bi bi-x-circle me-1"></i> Kata sandi tidak cocok</span>';
            }
        });

        // Terms checkbox styling
        const termsCheckbox = document.getElementById('terms');
        const termsLabel = document.querySelector('label[for="terms"]');
        
        termsCheckbox.addEventListener('change', function() {
            if (this.checked) {
                this.parentElement.parentElement.style.background = 'rgba(40, 167, 69, 0.15)';
                this.parentElement.parentElement.style.borderColor = 'rgba(40, 167, 69, 0.3)';
            } else {
                this.parentElement.parentElement.style.background = 'var(--success-light)';
                this.parentElement.parentElement.style.borderColor = 'rgba(40, 167, 69, 0.2)';
            }
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

        // Initialize password strength for existing value
        if (passwordInput.value) {
            checkPasswordStrength(passwordInput.value);
        }
    });
</script>
@endsection