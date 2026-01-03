<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use App\Models\Pemesanan;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Constructor - HAPUS SEMUA MIDDLEWARE CHECK DI SINI
     * Gunakan Route Middleware saja
     */
    public function __construct()
    {
        // Kosongkan atau hapus semuanya
        // Semua pengecekan admin akan dilakukan di route middleware
    }

    // Dashboard admin
    public function dashboard()
    {
        $stats = [
            'total_kendaraan' => Kendaraan::count(),
            'total_pemesanan' => Pemesanan::count(),
            'total_users' => User::where('role', 'user')->count(),
            'pemesanan_pending' => Pemesanan::where('status', 'pending')->count(),
        ];

        // AMAN: Gunakan eager loading dengan cara manual jika relasi error
        $recent_pemesanans = Pemesanan::with('kendaraan')
            ->latest()
            ->take(5)
            ->get()
            ->map(function ($pemesanan) {
                // Tambahkan data user secara manual
                $pemesanan->user_data = User::find($pemesanan->user_id);
                return $pemesanan;
            });

        return view('admin.dashboard', compact('stats', 'recent_pemesanans'));
    }

    // CRUD Kendaraan
    public function kendaraanIndex()
    {
        $kendaraans = Kendaraan::latest()->paginate(10);
        return view('admin.kendaraan.index', compact('kendaraans'));
    }

    public function kendaraanCreate()
    {
        return view('admin.kendaraan.create');
    }

    public function kendaraanStore(Request $request)
    {
        $request->validate([
            'jenis_kendaraan' => 'required|in:penumpang,barang',
            'nama_kendaraan' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'kapasitas' => 'required|integer|min:1',  // PERBAIKAN DI SINI: integer, bukan interger
            'satuan_kapasitas' => 'required|in:orang,ton',
            'harga_sewa' => 'required|integer|min:0',  // PERBAIKAN DI SINI: integer, bukan interger
            'status' => 'required|boolean',        ]);

        Kendaraan::create($request->all());

        return redirect()->route('admin.kendaraan.index')
            ->with('success', 'Kendaraan berhasil ditambahkan.');
    }

    public function kendaraanEdit(Kendaraan $kendaraan)
    {
        return view('admin.kendaraan.edit', compact('kendaraan'));
    }

    public function kendaraanUpdate(Request $request, Kendaraan $kendaraan)
    {
        $request->validate([
            'jenis_kendaraan' => 'required|in:penumpang,barang',
            'nama_kendaraan' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'kapasitas' => 'required|integer|min:1',
            'satuan_kapasitas' => 'required|in:orang,ton',
            'harga_sewa' => 'required|integer|min:0',
            'status' => 'required|boolean',
        ]);

        $kendaraan->update($request->all());

        return redirect()->route('admin.kendaraan.index')
            ->with('success', 'Kendaraan berhasil diperbarui.');
    }

    public function kendaraanDestroy(Kendaraan $kendaraan)
    {
        // Check if kendaraan has pemesanan - gunakan query langsung
        $pemesananCount = Pemesanan::where('kendaraan_id', $kendaraan->id)->count();
        
        if ($pemesananCount > 0) {
            return redirect()->route('admin.kendaraan.index')
                ->with('error', 'Tidak dapat menghapus kendaraan yang memiliki pemesanan.');
        }

        $kendaraan->delete();

        return redirect()->route('admin.kendaraan.index')
            ->with('success', 'Kendaraan berhasil dihapus.');
    }

    // Kelola Pemesanan
    public function pemesananIndex()
    {
        // AMAN: Gunakan eager loading hanya untuk kendaraan
        $pemesanans = Pemesanan::with('kendaraan')
            ->latest()
            ->paginate(10)
            ->through(function ($pemesanan) {
                // Tambahkan user data secara manual
                $pemesanan->user_data = User::find($pemesanan->user_id);
                return $pemesanan;
            });
            
        return view('admin.pemesanan.index', compact('pemesanans'));
    }

    public function pemesananUpdateStatus(Request $request, Pemesanan $pemesanan)
    {
        $request->validate([
            'status' => 'required|in:pending,diproses,disetujui,ditolak',
        ]);

        $pemesanan->update(['status' => $request->status]);

        return redirect()->route('admin.pemesanan.index')
            ->with('success', 'Status pemesanan berhasil diperbarui.');
    }
}