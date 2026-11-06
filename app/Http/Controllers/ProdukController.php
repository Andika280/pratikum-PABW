<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    public function index()
    {
        $products = Produk::orderBy('created_at', 'desc')->paginate(5);
        return view('produk.index', compact('products'));
    }

    public function create()
    {
        return view('produk.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga_per_kg' => 'required|numeric',
            'stok_kg' => 'required|numeric',
            'deskripsi' => 'required',
            'foto' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $validated['foto'] = $request->file('foto')->store('produk_foto', 'public');
        $validated['kategori_id'] = $request->kategori_id ?? 1; 

        Produk::create($validated);

        return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function show(Produk $produk)
    {
        return view('produk.show', compact('produk'));
    }

    public function edit(Produk $produk)
    {
        return view('produk.edit', compact('produk'));
    }

    public function update(Request $request, Produk $produk)
    {
        $validated = $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga_per_kg' => 'required|numeric',
            'stok_kg' => 'required|numeric',
            'deskripsi' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            if ($produk->foto) {
                Storage::disk('public')->delete($produk->foto);
            }
            $validated['foto'] = $request->file('foto')->store('produk_foto', 'public');
        }

        $produk->update($validated);

        return redirect()->route('produk.index')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy(Produk $produk)
    {
        if ($produk->foto) {
            Storage::disk('public')->delete($produk->foto);
        }
        $produk->delete();

        return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus.');
    }
}