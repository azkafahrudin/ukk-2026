<?php

namespace App\Controllers;

use App\Models\Alat;
use App\Models\Kategori; // Sesuaikan dengan nama model kategori kamu jika ada
use App\Models\User;
use App\Models\LogAktifitas;
use Sakuci\Http\Request;

class AlatController
{
    // 1. Menampilkan Daftar Alat (Index)
    public function index(Request $request)
    {
        // Mengambil data alat dengan pagination (atau bisa juga Alat::all())
        $datal = Alat::orderBy('id_alat', 'desc')->paginate(10);
        
        // Ambil data kategori untuk ditampilkan namanya di tabel
        // Jika model kategori kamu berbeda, silakan sesuaikan
        $kategori = \App\Models\Kategori::all(); 

        return view('alat.index', compact('datal', 'kategori'));
    }

    // 2. Menampilkan Form Tambah Alat
    public function create(Request $request)
    {
        $kategori = \App\Models\Kategori::all();
        return view('alat.create', compact('kategori'));
    }

    // 3. Menyimpan Alat Baru ke Database
    public function store(Request $request)
    {
        $data = $request->all();

        Alat::create([
            'nama_alat'   => $data['nama_alat'],
            'kode_alat'   => $data['kode_alat'],
            'id_kategori' => $data['id_kategori'],
            'stok'        => $data['stok'] ?? 0
        ]);

        // Catat log aktivitas
        $currentUser = User::current();
        LogAktifitas::create([
            'id_user'   => $currentUser->id ?? null,
            'aktifitas' => 'Admin menambahkan alat baru: ' . $data['nama_alat']
        ]);

        return redirect(route('alat.index'))->with('success', 'Data alat berhasil ditambahkan!');
    }

    // 4. Menampilkan Form Edit Alat
    public function edit(Request $request, $id)
    {
        // Menyesuaikan parameter $id atau $alat tergantung routing kamu
        $datal = Alat::where('id_alat', $id)->first();
        if (!$datal) {
            return redirect(route('alat.index'))->with('error', 'Data alat tidak ditemukan.');
        }

        $kategori = \App\Models\Kategori::all();
        return view('alat.edit', compact('datal', 'kategori'));
    }

    // 5. Memperbarui Data Alat & Stok
    public function update(Request $request, $id)
    {
        $alat = Alat::where('id_alat', $id)->first();
        if (!$alat) {
            return redirect(route('alat.index'))->with('error', 'Data alat tidak ditemukan.');
        }

        $data = $request->all();

        $alat->update([
            'nama_alat'   => $data['nama_alat'],
            'kode_alat'   => $data['kode_alat'],
            'id_kategori' => $data['id_kategori'],
            'stok'        => $data['stok'] ?? $alat->stok
        ]);

        // Catat log aktivitas
        $currentUser = User::current();
        LogAktifitas::create([
            'id_user'   => $currentUser->id ?? null,
            'aktifitas' => 'Admin memperbarui data alat ID: ' . $id
        ]);

        return redirect(route('alat.index'))->with('success', 'Data alat berhasil diperbarui!');
    }

    // 6. Menghapus Alat
    public function delete(Request $request, $id)
    {
        $alat = Alat::where('id_alat', $id)->first();
        if ($alat) {
            $nama = $alat->nama_alat;
            $alat->delete();

            // Catat log aktivitas
            $currentUser = User::current();
            LogAktifitas::create([
                'id_user'   => $currentUser->id ?? null,
                'aktifitas' => 'Admin menghapus alat: ' . $nama
            ]);
        }

        return redirect(route('alat.index'))->with('success', 'Data alat berhasil dihapus!');
    }

    // Menampilkan daftar alat untuk sisi Peminjam / Siswa
    public function daftarAlatPeminjam(Request $request)
    {
        // Mengambil semua data alat
        $alat = Alat::all();
        
        // Mengambil data kategori untuk pemetaan nama kategori di view
        $kategoriList = \App\Models\Kategori::all();
        $kategoriMap = [];
        foreach ($kategoriList as $k) {
            $kategoriMap[$k->id_kategori] = $k->nama_kategori;
        }

        // Return ke view katalog alat peminjam yang sudah kamu buat sebelumnya
        return view('peminjam.daftar_alat', compact('alat', 'kategoriMap'));
    }
}