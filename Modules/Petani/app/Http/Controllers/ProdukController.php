<?php

namespace Modules\Petani\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Petani\Models\Produk;
use Modules\Petani\Http\Requests\ProdukRequest;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    public function index()
    {
        return view('petani::index'); 
    }

    public function getData()
    {
        
        return response()->json(Produk::latest()->get());
    }

    public function store(ProdukRequest $request)
    {
        $data = $request->validated();
        
        if ($request->hasFile('foto_produk')) {
            $data['foto_produk'] = $request->file('foto_produk')->store('produk_foto', 'public');
        }

        Produk::create($data);
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
        $produk = Produk::findOrFail($id);
        if ($produk->foto_produk) {
            Storage::disk('public')->delete($produk->foto_produk);
        }
        $produk->delete();

        return response()->json(['success' => 'Produk berhasil dihapus!']);
    }
}