<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan; 

class LaporBanjirController extends Controller
{

    public function index()
    {
    
        $laporans = Laporan::all(); 

        return view('lapor-banjir.index', compact('laporans'));
    }

    public function create()
    {
        return view('lapor-banjir.create');
    }

    public function store(Request $request)
    {

        Laporan::create([
            'nama_pelapor' => $request->nama, 
            'lokasi' => $request->lokasi,
            'tinggi_genangan' => $request->tinggi_air, 
            'tanggal_kejadian' => $request->tanggal_kejadian,
        ]);

        return back()->with('success', 'Laporan berhasil disimpan ke database!');
    }
}