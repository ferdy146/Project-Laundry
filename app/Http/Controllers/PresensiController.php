<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Presensi;

class PresensiController extends Controller
{
        public function presensi()
    {
        return view('admin.presensi');
    }

    // Menyimpan data presensi ke database
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'kehadiran' => 'required|string',
            'keterangan' => 'nullable|string',
            'upload' => 'nullable|file|mimes:jpg,png,jpeg,pdf|max:2048',
        ]);

        // Jika ada file upload, simpan file dan dapatkan path-nya
        if ($request->hasFile('upload')) {
            $uploadPath = $request->file('upload')->store('uploads', 'public');
        } else {
            $uploadPath = null;
        }

        // Simpan data ke dalam tabel presensis
        Presensi::create([
            'nama_pegawai' => $request->nama,
            'kehadiran' => $request->kehadiran,
            'keterangan' => $request->keterangan,
            'upload' => $uploadPath,
        ]);

        // Redirect atau menampilkan pesan sukses
        return redirect()->route('admin.dashboard')->with('success', 'Presensi berhasil disimpan.');
    }

    // Menampilkan data presensi dalam bentuk tabel
    public function viewpresensi()
    {
        $presensis = Presensi::all(); // Mengambil semua data presensi dari database
        return view('admin.viewpresensi', compact('presensis'));
    }

}
