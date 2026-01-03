<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use App\Models\Pemesanan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class UserController extends Controller
{
    // Constructor untuk middleware
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Dashboard user
    public function dashboard()
    {
        $user = Auth::user();
        
        // AMAN: Gunakan query langsung jika relasi error
        $pemesanans = Pemesanan::where('user_id', $user->id)
            ->with('kendaraan')
            ->latest()
            ->take(3)
            ->get();

        // Ambil kendaraan terbaru yang tersedia
        $kendaraan_terbaru = Kendaraan::where('status', true)
            ->latest()
            ->take(4)
            ->get();

        return view('user.dashboard', compact('user', 'pemesanans', 'kendaraan_terbaru'));
    }

    // Lihat semua kendaraan
    public function kendaraanIndex(Request $request)
    {
        $query = Kendaraan::where('status', true);

        // Filter berdasarkan jenis
        if ($request->has('jenis') && in_array($request->jenis, ['penumpang', 'barang'])) {
            $query->where('jenis_kendaraan', $request->jenis);
        }

        // Filter berdasarkan harga
        if ($request->has('harga_max')) {
            $query->where('harga_sewa', '<=', $request->harga_max);
        }

        $kendaraans = $query->latest()->paginate(9);

        return view('user.kendaraan.index', compact('kendaraans'));
    }

    // Detail kendaraan
    public function kendaraanShow(Kendaraan $kendaraan)
    {
        return view('user.kendaraan.show', compact('kendaraan'));
    }

    // Form pemesanan
    public function pemesananCreate(Kendaraan $kendaraan)
    {
        // Pastikan kendaraan tersedia
        if (!$kendaraan->status) {
            return redirect()->route('kendaraan.index')
                ->with('error', 'Kendaraan tidak tersedia untuk disewa.');
        }

        return view('user.pemesanan.create', compact('kendaraan'));
    }

    // Store pemesanan
    public function pemesananStore(Request $request, Kendaraan $kendaraan)
    {
        // Validasi input
        $request->validate([
            'tanggal_mulai' => 'required|date|after:today',
            'tanggal_selesai' => 'required|date|after:tanggal_mulai',
            'catatan' => 'nullable|string|max:500',
        ]);

        // Pastikan kendaraan masih tersedia
        if (!$kendaraan->status) {
            return back()->with('error', 'Maaf, kendaraan ini sudah tidak tersedia.')->withInput();
        }

        // Hitung durasi dalam hari
        $tanggal_mulai = Carbon::parse($request->tanggal_mulai);
        $tanggal_selesai = Carbon::parse($request->tanggal_selesai);
        $durasi = $tanggal_selesai->diffInDays($tanggal_mulai);

        // Hitung total harga
        $total_harga = $durasi * $kendaraan->harga_sewa;

        // Buat pemesanan
        Pemesanan::create([
            'user_id' => Auth::id(),
            'kendaraan_id' => $kendaraan->id,
            'tanggal_mulai' => $tanggal_mulai,
            'tanggal_selesai' => $tanggal_selesai,
            'durasi' => $durasi,
            'total_harga' => $total_harga,
            'status' => 'pending',
            'catatan' => $request->catatan,
        ]);

        return redirect()->route('pemesanan.index')
            ->with('success', 'Pemesanan berhasil dibuat. Menunggu konfirmasi admin.');
    }

    // Lihat pemesanan user
    public function pemesananIndex()
    {
        // AMAN: Gunakan query langsung
        $pemesanans = Pemesanan::where('user_id', Auth::id())
            ->with('kendaraan')
            ->latest()
            ->paginate(10);

        return view('user.pemesanan.index', compact('pemesanans'));
    }
}