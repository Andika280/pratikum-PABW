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

    public function update(Request $request, $id)
    {
        $produk = Produk::findOrFail($id);

        $request->validate([
            'nama_produk' => 'required',
            'kategori_id' => 'required',
            'harga_per_kg' => 'required|numeric',
            'stok_kg' => 'required|numeric',
            'deskripsi' => 'required',
            'foto' => 'nullable|image|max:2048',
            'foto_produk' => 'nullable|image|max:2048',
        ]);

        $produk->nama_produk = $request->nama_produk;
        $produk->kategori_id = $request->kategori_id;
        $produk->harga_per_kg = $request->harga_per_kg; 
        $produk->stok_kg = $request->stok_kg;         
        $produk->deskripsi = $request->deskripsi;
        if ($request->has('deskripsi')) {
            $produk->deskripsi = $request->deskripsi;
        }

        if ($request->hasFile('foto')) {
            if ($produk->foto && Storage::disk('public')->exists($produk->foto)) {
                Storage::disk('public')->delete($produk->foto);
            }
            $produk->foto = $request->file('foto')->store('produk', 'public');
        } elseif ($request->hasFile('foto_produk')) {
            if ($produk->foto && Storage::disk('public')->exists($produk->foto)) {
                Storage::disk('public')->delete($produk->foto);
            }
            $produk->foto = $request->file('foto_produk')->store('produk', 'public');
        }

        $produk->save();

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