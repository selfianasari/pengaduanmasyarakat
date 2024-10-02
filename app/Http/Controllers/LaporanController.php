<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LaporanController extends Controller
{
    // Menampilkan formulir untuk menambah laporan
    public function create()
    {
        return view('laporans.create'); // Pastikan view ini ada
    }

    // Menyimpan laporan baru
    public function store(Request $request)
    {
        // Validasi data yang diterima
        $request->validate([
            'username' => 'required|string|max:100',
            'isi_laporan' => 'required|string',
            'foto_bukti' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Max 2MB
        ]);

        // Menyimpan foto bukti jika diupload
        $foto_bukti = null;
        if ($request->hasFile('foto_bukti')) {
            $foto_bukti = $request->file('foto_bukti')->store('bukti'); // Menyimpan foto di folder storage/app/bukti
        }

        // Membuat laporan baru
        Laporan::create([
            'username' => $request->username,
            'isi_laporan' => $request->isi_laporan,
            'foto_bukti' => $foto_bukti,
        ]);

        // Redirect ke daftar laporan dengan pesan sukses
        return redirect()->route('laporans.index')->with('success', 'Laporan berhasil ditambahkan.');
    }

    // Menampilkan daftar laporan
    public function index()
    {
        $laporans = Laporan::all(); // Mengambil semua laporan
        return view('laporans.index', compact('laporans')); // Pastikan view ini ada
    }

    // Menampilkan detail laporan tertentu
    public function show($id)
    {
        $laporan = Laporan::findOrFail($id);
        return view('laporans.show', compact('laporan')); // Pastikan view ini ada
    }

    // Menampilkan formulir untuk mengedit laporan tertentu
    public function edit($id)
    {
        $laporan = Laporan::findOrFail($id);
        return view('laporans.edit', compact('laporan')); // Pastikan view ini ada
    }

    // Mengupdate laporan tertentu
    public function update(Request $request, $id)
    {
        $laporan = Laporan::findOrFail($id);

        // Validasi data yang diterima
        $request->validate([
            'username' => 'required|string|max:100',
            'isi_laporan' => 'required|string',
            'foto_bukti' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Menyimpan foto bukti jika diupload
        $foto_bukti = $laporan->foto_bukti; // Simpan foto lama
        if ($request->hasFile('foto_bukti')) {
            // Hapus foto lama jika ada
            if ($foto_bukti) {
                Storage::delete($foto_bukti);
            }
            // Simpan foto baru
            $foto_bukti = $request->file('foto_bukti')->store('bukti');
        }

        // Mengupdate laporan
        $laporan->update([
            'username' => $request->username,
            'isi_laporan' => $request->isi_laporan,
            'foto_bukti' => $foto_bukti,
        ]);

        // Redirect ke daftar laporan dengan pesan sukses
        return redirect()->route('laporans.index')->with('success', 'Laporan berhasil diperbarui.');
    }

    // Menghapus laporan tertentu
    public function destroy($id)
    {
        $laporan = Laporan::findOrFail($id);
        
        // Hapus foto jika ada
        if ($laporan->foto_bukti) {
            Storage::delete($laporan->foto_bukti);
        }

        // Hapus laporan
        $laporan->delete();
        
        // Redirect ke daftar laporan dengan pesan sukses
        return redirect()->route('laporans.index')->with('success', 'Laporan berhasil dihapus.');
    }
}
