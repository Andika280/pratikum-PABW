<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class AgrilinkController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function marketplace()
    {
        $products = Produk::all();

        return view('marketplace', compact('products'));
    }
}