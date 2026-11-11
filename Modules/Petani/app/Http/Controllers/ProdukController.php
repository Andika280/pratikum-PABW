<?php

namespace Modules\Petani\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Petani\Models\Produk;
use Modules\Petani\Http\Requests\ProdukRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index(Request $request)
{
    // Jika request datang dari AJAX jQuery, kembalikan data JSON
    if ($request->ajax()) {
        $produk = Produk::all(); // Sesuaikan dengan model/relasi Anda
        return response()->json(['data' => $produk]);
    }
    
    // Jika request dari browser biasa, kembalikan View
    return view('petani::index');
}

    public function getData()
    {
        
        return response()->json(Produk::latest()->get());
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_produk' => 'required',
            'nama' => 'nullable', 
            'kategori_id' => 'required',
            'kategori' => 'nullable',
            'harga_per_kg' => 'required|numeric',
            'harga' => 'nullable',
            'stok_kg' => 'required|numeric',
            'stok' => 'nullable',
            'deskripsi' => 'required',
            'foto' => 'required|image|max:2048',
            'foto_produk' => 'nullable', 
        ]);

        $produk = new Produk();
        $produk->nama_produk = $request->nama_produk ?? $request->nama;
        $produk->kategori_id = $request->kategori_id ?? $request->kategori;
        $produk->harga_per_kg = $request->harga_per_kg ?? $request->harga;
        $produk->stok_kg = $request->stok_kg ?? $request->stok;
        $produk->deskripsi = $request->deskripsi;

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('produk', 'public');
            $produk->foto = $path;
        } elseif ($request->hasFile('foto_produk')) {
            $path = $request->file('foto_produk')->store('produk', 'public');
            $produk->foto = $path;
        }

        $produk->save();

        return response()->json(['success' => 'Produk berhasil ditambahkan!']);
    }

    public function edit($id)
    {
        return response()->json(Produk::findOrFail($id));
    }

    public function update(ProdukRequest $request, $id)
    {
        $produk = Produk::findOrFail($id);
        $data = $request->validated();

        if ($request->hasFile('foto_produk')) {
            if ($produk->foto_produk) {
                Storage::disk('public')->delete($produk->foto_produk);
            }
            $data['foto_produk'] = $request->file('foto_produk')->store('produk_foto', 'public');
        }

        $produk->update($data);
        return response()->json(['success' => 'Produk berhasil diperbarui!']);
    }

    public function destroy($id)
    {
        try {
            $produk = Produk::findOrFail($id);
            
            if ($produk->foto && Storage::disk('public')->exists($produk->foto)) {
                Storage::disk('public')->delete($produk->foto);
            }
            
            $produk->delete();

            return response()->json(['success' => 'Produk berhasil dihapus!']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}