<?php

namespace Modules\Petani\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdukRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        // Minimal 5 item + 1 file
        return [
            'nama' => 'required|string|max:255',
            'kategori' => 'required|string',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'deskripsi' => 'required|string',
            // Jika tambah data wajib ada foto, jika edit boleh kosong (menyimpan foto lama)
            'foto_produk' => ($this->isMethod('POST') ? 'required' : 'nullable') . '|image|mimes:jpg,jpeg,png|max:2048',
        ];
    }
}
