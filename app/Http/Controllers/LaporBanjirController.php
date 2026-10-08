<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporBanjirController extends Controller
{
    // Menampilkan daftar laporan
    public function index()
    {
        $laporans = [
            ['nama' => 'Bapak Asep', 'lokasi' => 'Dayeuhkolot', 'tinggi_air' => 25],
            ['nama' => 'Ibu Neneng', 'lokasi' => 'Baleendah', 'tinggi_air' => 50],
            ['nama' => 'Kang Yayan', 'lokasi' => 'Bojongsoang', 'tinggi_air' => 85],
        ];

        return view('lapor-banjir.index', compact('laporans'));
    }

    // Menampilkan form laporan
    public function create()
    {
        return view('lapor-banjir.create');
    }

    // Memproses data dari form dan menampilkan halaman konfirmasi
    public function store(Request $request)
    {
        // Ambil data yang dikirim melalui POST
        $data = $request->only(['nama', 'lokasi', 'tinggi_air']);
        
        return view('lapor-banjir.confirm', compact('data'));
    }
}