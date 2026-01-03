@extends('layouts.app')

@section('title', 'Kelola Pemesanan')

@section('content')
<div class="container">
    <h1 class="mb-4"><i class="bi bi-calendar-check"></i> Kelola Pemesanan</h1>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>User</th>
                            <th>Kendaraan</th>
                            <th>Tanggal</th>
                            <th>Durasi</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pemesanans as $pemesanan)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $pemesanan->user->name }}</td>
                                <td>{{ $pemesanan->kendaraan->nama_kendaraan }}</td>
                                <td>
                                    {{ $pemesanan->tanggal_mulai->format('d/m/Y') }}<br>
                                    s/d {{ $pemesanan->tanggal_selesai->format('d/m/Y') }}
                                </td>
                                <td>{{ $pemesanan->durasi }} hari</td>
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
                                <td>
                                    <button type="button" class="btn btn-sm btn-info" 
                                            data-bs-toggle="modal" 
                                            data-bs-target="#statusModal{{ $pemesanan->id }}"
                                            title="Ubah Status">
                                        <i class="bi bi-arrow-repeat"></i>
                                    </button>
                                </td>
                            </tr>
                            
                            <!-- Modal for status update -->
                            <div class="modal fade" id="statusModal{{ $pemesanan->id }}" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Ubah Status Pemesanan</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <form action="{{ route('admin.pemesanan.update-status', $pemesanan) }}" method="POST">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="status" class="form-label">Status Baru</label>
                                                    <select class="form-select" id="status" name="status" required>
                                                        <option value="pending" {{ $pemesanan->status == 'pending' ? 'selected' : '' }}>
                                                            Pending
                                                        </option>
                                                        <option value="diproses" {{ $pemesanan->status == 'diproses' ? 'selected' : '' }}>
                                                            Diproses
                                                        </option>
                                                        <option value="disetujui" {{ $pemesanan->status == 'disetujui' ? 'selected' : '' }}>
                                                            Disetujui
                                                        </option>
                                                        <option value="ditolak" {{ $pemesanan->status == 'ditolak' ? 'selected' : '' }}>
                                                            Ditolak
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    Batal
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    Simpan Perubahan
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <!-- Pagination -->
            <div class="d-flex justify-content-center">
                {{ $pemesanans->links() }}
            </div>
        </div>
    </div>
</div>
@endsection