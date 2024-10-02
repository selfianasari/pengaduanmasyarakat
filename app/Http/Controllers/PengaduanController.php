<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengaduanController extends Controller
{
    /**
     * Menampilkan daftar pengaduan pengguna.
     */
        public function index()
         {
        // Memeriksa apakah pengguna terautentikasi
          if (Auth::check()) {
            $username = Auth::user()->username; // Mendapatkan username pengguna yang sedang login

            // Mengambil semua pengaduan berdasarkan username
            $pengaduan = Pengaduan::where('username', $username)->get();

            // Memeriksa apakah pengaduan ditemukan
            if ($pengaduan->isEmpty()) {
                return response()->json(['message' => 'Tidak ada pengaduan ditemukan'], 404);
            }

            // Mengembalikan pengaduan dalam format JSON
            return response()->json($pengaduan);
             } else {
            return response()->json(['message' => 'Pengguna tidak terautentikasi'], 401);
        }


        //return redirect()->route('login')->with('error', 'Silakan login untuk melihat pengaduan.');//
    }

    /**
     * Menampilkan form pembuatan pengaduan.
     */
    public function create()
    {
        return view('pengaduan.create');
    }

    /**
     * Menyimpan pengaduan baru ke dalam database.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'nama' => 'required|string|max:225',
            'nik' => 'required|string|min:16|max:16|unique:pengaduans,nik',
            'tanggal_lahir' => 'required|date',
            'umur' => 'required|integer',
            'username' => 'required|string|max:100',
            'email' => 'required|email|max:100|unique:pengaduans,email',
            'password' => 'required|string|min:8',
        ]);

        // Tambahkan username dari user yang sedang login
        $validatedData['username'] = Auth::user()->username;

        // Simpan data pengaduan
        Pengaduan::create($validatedData);

        return redirect()->route('pengaduan.index')->with('success', 'Pengaduan berhasil dibuat');
    }

    /**
     * Menampilkan pengaduan tertentu.
     */
    public function show($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);

        // Cek apakah pengguna yang login memiliki akses (pengguna atau admin)
        if (Auth::user()->is_admin || Auth::user()->username == $pengaduan->username) {
            return view('pengaduan.show', compact('pengaduan'));
        }

        return redirect()->route('pengaduan.index')->with('error', 'Anda tidak memiliki akses ke pengaduan ini');
    }

    /**
     * Menampilkan form edit pengaduan.
     */
    public function edit(Pengaduan $pengaduan)
    {
        if (Auth::user()->username == $pengaduan->username) {
            return view('pengaduan.edit', compact('pengaduan'));
        }

        return redirect()->route('pengaduan.index')->with('error', 'Anda tidak memiliki akses untuk mengubah pengaduan ini');
    }

    /**
     * Memperbarui pengaduan di database.
     */
    public function update(Request $request, Pengaduan $pengaduan)
    {
        if (Auth::user()->username == $pengaduan->username) {
            // Validasi input
            $validatedData = $request->validate([
                'nama' => 'required|string|max:225',
                'nik' => 'required|string|min:16|max:16|unique:pengaduans,nik,' . $pengaduan->id,
                'tanggal_lahir' => 'required|date',
                'umur' => 'required|integer',
                'email' => 'required|email|max:100|unique:pengaduans,email,' . $pengaduan->id,
            ]);

            $pengaduan->update($validatedData);
            return redirect()->route('pengaduan.index')->with('success', 'Pengaduan berhasil diperbarui');
        }

        return redirect()->route('pengaduan.index')->with('error', 'Anda tidak memiliki akses untuk mengubah pengaduan ini');
    }

    /**
     * Menghapus pengaduan dari database.
     */
    public function destroy(Pengaduan $pengaduan)
    {
        if (Auth::user()->is_admin || Auth::user()->username == $pengaduan->username) {
            $pengaduan->delete();
            return redirect()->route('pengaduan.index')->with('success', 'Pengaduan berhasil dihapus');
        }

        return redirect()->route('pengaduan.index')->with('error', 'Anda tidak memiliki akses untuk menghapus pengaduan ini');
    }
}
