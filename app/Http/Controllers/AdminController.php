<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;


class AdminController extends Controller
{
    public function dashboard()
    {
        return view('pegawai.dashboard');
    }

    public function inputdata()
    {
        return view('pegawai.inputdata');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggalMasuk' => 'required|date',
            'namaPelanggan' => 'required|string|max:255',
            'jenisLayanan' => 'required|string',
            'jenisLaundry' => 'required|string',
            'berat' => 'required|numeric',
            'metodePembayaran' => 'required|string',
        ]);

        $totalHarga = Transaction::calculatePrice(
            $request->jenisLayanan,
            $request->jenisLaundry,
            $request->berat
        );

        Transaction::create([
            'tanggal_masuk' => $request->tanggalMasuk,
            'nama_pelanggan' => $request->namaPelanggan,
            'jenis_layanan' => $request->jenisLayanan,
            'jenis_laundry' => $request->jenisLaundry,
            'berat' => $request->berat,
            'metode_pembayaran' => $request->metodePembayaran,
            'total_harga' => $totalHarga,
        ]);

        return redirect()->route('pegawai.dashboard');
    }

    public function viewdata()
    {
        $transactions = Transaction::all();
        return view('pegawai.viewdata', compact('transactions'));
    }

    public function editdata($id)
    {
        $transaction = Transaction::findOrFail($id);
        return view('pegawai.editdata', compact('transaction'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggalMasuk' => 'required|date',
            'namaPelanggan' => 'required|string|max:255',
            'jenisLayanan' => 'required|string',
            'jenisLaundry' => 'required|string',
            'berat' => 'required|numeric',
            'metodePembayaran' => 'required|string',
        ]);

        $transaction = Transaction::findOrFail($id);

        $totalHarga = Transaction::calculatePrice(
            $request->jenisLayanan,
            $request->jenisLaundry,
            $request->berat
        );

        $transaction->update([
            'tanggal_masuk' => $request->tanggalMasuk,
            'nama_pelanggan' => $request->namaPelanggan,
            'jenis_layanan' => $request->jenisLayanan,
            'jenis_laundry' => $request->jenisLaundry,
            'berat' => $request->berat,
            'metode_pembayaran' => $request->metodePembayaran,
            'total_harga' => $totalHarga,
        ]);

        return redirect()->route('pegawai.viewdata')->with('success', 'Transaksi berhasil diperbarui');
    }

    public function delete($id)
    {
        $transaction = Transaction::find($id);
        if ($transaction) {
            $transaction->delete();
            return redirect()->route('pegawai.viewdata');
        }
        return redirect()->route('pegawai.viewdata');
    }
}
