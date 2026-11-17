<?php

namespace App\Controllers;

use App\Models\Profile;
use App\Models\User;
use Sakuci\Controller;
use Sakuci\Http\Request;
use Sakuci\Session;

class ProfileController extends Controller
{
    // Menampilkan halaman form profile peminjam
    public function edit()
    {
        $userId = Session::get('user_id');
        $user = User::find($userId);
        
        // Ambil data profile atau buat instance kosong jika belum ada
        $profile = Profile::firstWhere('id_user', $userId);

        return view('peminjam.profile.edit', [
            'user' => $user,
            'profile' => $profile
        ]);
    }

    // Menyimpan atau memperbarui data profile peminjam
    public function update(Request $request)
    {
        $userId = Session::get('user_id');

        $data = $request->validate([
            'nama_lengkap' => 'required|max:255',
            'nis_nisn'     => 'required',
            'kelas'        => 'required|max:50',
            'no_telepon'   => 'required',
            'alamat'       => 'required',
        ]);

        // Cek apakah profile sudah pernah dibuat sebelumnya
        $profile = Profile::firstWhere('id_user', $userId);

        if ($profile) {
            // Update data lama
            $profile->update([
                'nama_lengkap' => $data['nama_lengkap'],
                'nis_nisn'     => $data['nis_nisn'],
                'kelas'        => $data['kelas'],
                'no_telepon'   => $data['no_telepon'],
                'alamat'       => $data['alamat'],
                'updated_at'   => date('Y-m-d H:i:s'),
            ]);
        } else {
            // Buat data baru jika belum ada
            Profile::create([
                'id_user'      => $userId,
                'nama_lengkap' => $data['nama_lengkap'],
                'nis_nisn'     => $data['nis_nisn'],
                'kelas'        => $data['kelas'],
                'no_telepon'   => $data['no_telepon'],
                'alamat'       => $data['alamat'],
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s'),
            ]);
        }

        return redirect('/peminjam/profile')->with('success', 'Profil berhasil diperbarui!');
    }
}