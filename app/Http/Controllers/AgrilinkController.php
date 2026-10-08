<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgrilinkController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function marketplace()
    {
        $products = [
            [
                'id' => 1,
                'title' => 'Beras Pandan Wangi',
                'price' => 15000,
                'stock' => 50,
                'farmerName' => 'Pak Budi',
                'img' => 'beras.png'
            ],
            [
                'id' => 2,
                'title' => 'Jagung Manis',
                'price' => 8000,
                'stock' => 0,
                'farmerName' => 'Bu Tejo',
                'img' => 'jagung.png'
            ],
            [
                'id' => 3,
                'title' => 'Sayur Sawi Hijau',
                'price' => 5000,
                'stock' => 20,
                'farmerName' => 'Mang Oleh',
                'img' => 'sawi.png'
            ]
        ];

        return view('marketplace', compact('products'));
    }
}