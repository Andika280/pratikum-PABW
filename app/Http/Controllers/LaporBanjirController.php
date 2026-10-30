<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LaporBanjirController extends Controller
{
    public function index()
    {
        // Menampilkan 5 laporan per halaman, urut dari yang terbaru
        $laporans = Laporan::latest()->paginate(5);
        return view('lapor-banjir.index', compact('laporans'));
    }

    public function create()
    {
        return view('lapor-banjir.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_pelapor' => 'required|string|max:255',
            'no_hp' => 'required|string|max:15',
            'lokasi' => 'required|string',
            'kecamatan' => 'required|string',
            'tinggi_air' => 'required|numeric',
            'tanggal_kejadian' => 'required|date',
            'keterangan' => 'nullable|string',
            'foto' => 'required|image|mimes:jpg,jpeg,png|max:2048', // Wajib gambar, maks 2MB
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('foto_laporan', 'public');
        }

        Laporan::create($validated);

        return redirect()->route('lapor-banjir.index')->with('success', 'Laporan berhasil disimpan ke database!');
    }

    public function show($id)
    {
        $laporan = Laporan::findOrFail($id);
        return view('lapor-banjir.show', compact('laporan'));
    }

    public function edit($id)
    {
        $laporan = Laporan::findOrFail($id);
        return view('lapor-banjir.edit', compact('laporan'));
    }

    public function update(Request $request, $id)
    {
        $laporan = Laporan::findOrFail($id);
        
        $validated = $request->validate([
            'nama_pelapor' => 'required|string|max:255',
            'no_hp' => 'required|string|max:15',
            'lokasi' => 'required|string',
            'kecamatan' => 'required|string',
            'tinggi_air' => 'required|numeric',
            'tanggal_kejadian' => 'required|date',
            'keterangan' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // Opsional saat edit
            'status' => 'required|string|in:Menunggu,Diproses,Selesai',
        ]);

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($laporan->foto) {
                Storage::disk('public')->delete($laporan->foto);
            }
            $validated['foto'] = $request->file('foto')->store('foto_laporan', 'public');
        }

        $laporan->update($validated);

        return redirect()->route('lapor-banjir.index')->with('success', 'Laporan dan status berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $laporan = Laporan::findOrFail($id);
        
        // Hapus file fisik foto
        if ($laporan->foto) {
            Storage::disk('public')->delete($laporan->foto);
        }
        
        $laporan->delete();

        return redirect()->route('lapor-banjir.index')->with('success', 'Laporan berhasil dihapus!');
    }
}