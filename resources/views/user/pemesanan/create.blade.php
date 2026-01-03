@extends('layouts.app')

@section('title', 'Pesan Kendaraan')

@section('content')
@php
    use Carbon\Carbon;
    $today = Carbon::now();
    $tomorrow = $today->copy()->addDay();
    $dayAfterTomorrow = $today->copy()->addDays(2);
    
    // Get raw harga_sewa value for JavaScript
    $harga_sewa_raw = $kendaraan->harga_sewa;
@endphp

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">
                        <i class="bi bi-calendar-plus"></i> Pesan: {{ $kendaraan->nama_kendaraan }}
                    </h4>
                </div>
                <div class="card-body">
                    <!-- Kendaraan Info -->
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h5>Detail Kendaraan</h5>
                                    <ul class="list-unstyled">
                                        <li class="mb-2">
                                            <i class="bi bi-tag"></i> 
                                            <strong>Nama:</strong> {{ $kendaraan->nama_kendaraan }}
                                        </li>
                                        <li class="mb-2">
                                            <i class="bi bi-people"></i> 
                                            <strong>Kapasitas:</strong> {{ $kendaraan->kapasitas }} {{ $kendaraan->satuan_kapasitas }}
                                        </li>
                                        <li>
                                            <i class="bi bi-cash"></i> 
                                            <strong>Harga Sewa:</strong> {{ $kendaraan->harga_sewa_formatted }}/hari
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <h5>Informasi Sewa</h5>
                                    <ul class="list-unstyled">
                                        <li class="mb-2">
                                            <i class="bi bi-clock"></i> 
                                            <strong>Minimal Sewa:</strong> 1 hari
                                        </li>
                                        <li class="mb-2">
                                            <i class="bi bi-credit-card"></i> 
                                            <strong>Pembayaran:</strong> Transfer Bank / Tunai
                                        </li>
                                        <li>
                                            <i class="bi bi-check-circle"></i> 
                                            <strong>Status:</strong> 
                                            <span class="badge bg-success">Tersedia</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Hidden input untuk menyimpan harga sewa untuk JavaScript -->
                    <input type="hidden" id="harga-sewa-raw" value="{{ $harga_sewa_raw }}">

                    <!-- Pemesanan Form -->
                    <form method="POST" action="{{ route('pemesanan.store', $kendaraan) }}" id="pemesananForm">
                        @csrf
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="tanggal_mulai" class="form-label">Tanggal Mulai *</label>
                                <input type="date" class="form-control @error('tanggal_mulai') is-invalid @enderror" 
                                       id="tanggal_mulai" name="tanggal_mulai" 
                                       min="{{ $tomorrow->format('Y-m-d') }}" 
                                       value="{{ old('tanggal_mulai', $tomorrow->format('Y-m-d')) }}" required>
                                @error('tanggal_mulai')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="text-muted">Pilih tanggal mulai sewa (minimal besok)</small>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="tanggal_selesai" class="form-label">Tanggal Selesai *</label>
                                <input type="date" class="form-control @error('tanggal_selesai') is-invalid @enderror" 
                                       id="tanggal_selesai" name="tanggal_selesai" 
                                       min="{{ $dayAfterTomorrow->format('Y-m-d') }}" 
                                       value="{{ old('tanggal_selesai', $dayAfterTomorrow->format('Y-m-d')) }}" required>
                                @error('tanggal_selesai')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="text-muted">Pilih tanggal selesai sewa</small>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="catatan" class="form-label">Catatan Tambahan (Opsional)</label>
                            <textarea class="form-control @error('catatan') is-invalid @enderror" 
                                      id="catatan" name="catatan" rows="3" 
                                      placeholder="Contoh: Butuh antar jemput ke bandara">{{ old('catatan') }}</textarea>
                            @error('catatan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <!-- Summary -->
                        <div class="card bg-light mb-4">
                            <div class="card-body">
                                <h5 class="card-title">Ringkasan Pemesanan</h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <p class="mb-1">Kendaraan: <strong>{{ $kendaraan->nama_kendaraan }}</strong></p>
                                        <p class="mb-1">Harga per hari: <strong>{{ $kendaraan->harga_sewa_formatted }}</strong></p>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="mb-1">Durasi: <span id="durasi-text">1 hari</span></p>
                                        <p class="mb-1">Total: <span id="total-text" class="text-primary fw-bold">{{ $kendaraan->harga_sewa_formatted }}</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="alert alert-info">
                            <i class="bi bi-info-circle"></i> 
                            <strong>Perhatian:</strong> Pemesanan akan diproses setelah admin melakukan konfirmasi.
                            Anda akan menerima notifikasi melalui email ketika status pemesanan berubah.
                        </div>
                        
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('kendaraan.show', $kendaraan) }}" class="btn btn-secondary">
                                <i class="bi bi-arrow-left"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-check-circle"></i> Buat Pemesanan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Initialize with default values
    document.addEventListener('DOMContentLoaded', function() {
        // Get harga sewa from hidden input
        const hargaInput = document.getElementById('harga-sewa-raw');
        const hargaPerHari = hargaInput ? parseFloat(hargaInput.value) : 0;
        
        console.log('Harga per hari:', hargaPerHari); // Debug log
        
        // Function to format number as Rupiah
        function formatRupiah(number) {
            return new Intl.NumberFormat('id-ID').format(number);
        }
        
        // Function to calculate total
        function calculateTotal() {
            const startDateInput = document.getElementById('tanggal_mulai');
            const endDateInput = document.getElementById('tanggal_selesai');
            
            if (startDateInput && startDateInput.value && endDateInput && endDateInput.value) {
                const startDate = new Date(startDateInput.value);
                const endDate = new Date(endDateInput.value);
                
                if (startDate < endDate) {
                    const diffTime = Math.abs(endDate - startDate);
                    const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
                    
                    // Update duration text
                    const durasiText = document.getElementById('durasi-text');
                    if (durasiText) {
                        durasiText.textContent = diffDays + ' hari';
                    }
                    
                    // Calculate and update total price
                    const totalPrice = diffDays * hargaPerHari;
                    const totalText = document.getElementById('total-text');
                    if (totalText) {
                        totalText.textContent = 'Rp ' + formatRupiah(totalPrice);
                    }
                    return;
                }
            }
            
            // Default calculation (1 day)
            const durasiText = document.getElementById('durasi-text');
            const totalText = document.getElementById('total-text');
            
            if (durasiText) {
                durasiText.textContent = '1 hari';
            }
            if (totalText && hargaPerHari > 0) {
                totalText.textContent = 'Rp ' + formatRupiah(hargaPerHari);
            }
        }
        
        // Set min date for end date based on start date
        const startDateInput = document.getElementById('tanggal_mulai');
        const endDateInput = document.getElementById('tanggal_selesai');
        
        if (startDateInput) {
            startDateInput.addEventListener('change', function() {
                if (this.value) {
                    const startDate = new Date(this.value);
                    const minEndDate = new Date(startDate);
                    minEndDate.setDate(minEndDate.getDate() + 1);
                    
                    if (endDateInput) {
                        endDateInput.min = minEndDate.toISOString().split('T')[0];
                        
                        // Update end date if it's before the new minimum
                        if (endDateInput.value) {
                            const currentEndDate = new Date(endDateInput.value);
                            if (currentEndDate < minEndDate) {
                                endDateInput.value = minEndDate.toISOString().split('T')[0];
                            }
                        } else {
                            // Set default to min date
                            endDateInput.value = minEndDate.toISOString().split('T')[0];
                        }
                    }
                    
                    calculateTotal();
                }
            });
        }
        
        if (endDateInput) {
            endDateInput.addEventListener('change', calculateTotal);
        }
        
        // Initial calculation
        calculateTotal();
    });
</script>
@endpush