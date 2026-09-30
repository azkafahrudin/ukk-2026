<?php

namespace App\Controllers\Core;

use App\Models\Peminjaman;
use App\Models\Pengembalian;
use App\Models\User;
use App\Models\Alat;
use Sakuci\Http\Request;

class DashboardController
{
    /**
     * Dashboard untuk Siswa / Peminjam
     */
    public function index(Request $request)
    {
        $user = User::current();

        if (!$user) {
            return redirect(route('login'))->with('error', 'Silakan login terlebih dahulu.');
        }

        $userId = $user->id ?? $user->id_user ?? null;

        $peminjamanUser = Peminjaman::where('id_user', $userId)->get();

        $pendingCount   = 0;
        $activeCount    = 0;
        $completedCount = 0;
        $totalDenda     = 0;

        foreach ($peminjamanUser as $p) {
            if ($p->status === 'Pending') {
                $pendingCount++;
            } elseif ($p->status === 'Dipinjam' || $p->status === 'Disetujui') {
                $activeCount++;
            } elseif ($p->status === 'Dikembalikan') {
                $completedCount++;
            }

            if (!empty($p->denda)) {
                $totalDenda += (int) $p->denda;
            }

            if (class_exists(Pengembalian::class)) {
                $pengembalian = Pengembalian::where('id_peminjaman', $p->id_peminjaman)->first();
                if ($pengembalian && !empty($pengembalian->denda)) {
                    $totalDenda += (int) $pengembalian->denda;
                }
            }
        }

        // Ambil 5 aktivitas/riwayat peminjaman terbaru milik user ini beserta relasi alatnya
        $riwayatTerbaru = Peminjaman::where('id_user', $userId)
                            ->orderBy('id_peminjaman', 'desc')
                            ->limit(5)
                            ->get();

        foreach ($riwayatTerbaru as $item) {
            $item->data_alat = Alat::where('id_alat', $item->id_alat)->first();
        }

        $viewName = file_exists(base_path('resources/views/peminjam/dashboard.sakuci.php')) 
                    ? 'peminjam.dashboard' 
                    : 'dashboard';

        return view($viewName, compact(
            'user',
            'pendingCount',
            'activeCount',
            'completedCount',
            'totalDenda',
            'riwayatTerbaru'
        ));
    }
}