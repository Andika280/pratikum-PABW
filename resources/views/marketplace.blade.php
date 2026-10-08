@extends('layouts.main')

@section('title', 'Marketplace')

@section('content')
<section class="marketplace-page">
    <div class="marketplace-overlay">
        <img src="{{ asset('images/BgMarketplace.jpeg') }}" alt="Marketplace Background" class="marketplace-bg-img" />
    </div>

    <header class="page-header">
        <div class="container">
            <h1>Marketplace Pertanian</h1>
            <p>Beli hasil bumi segar langsung dari para petani terbaik.</p>
        </div>
    </header>

    <div class="container marketplace-content">
        <div class="controls-section">
            <div class="search-box">
                <i class="bi bi-search"></i>
                <input type="text" placeholder="Cari beras, jagung, sayuran..." />
            </div>
            <div class="category-filters">
                <button class="active">Semua</button>
                <button>Grains</button>
                <button>Vegetables</button>
                <button>Fruits</button>
            </div>
        </div>

        <div class="product-grid">
            @forelse($products as $product)
                @include('partials.product-card', ['product' => $product])
            @empty
                <div class="no-products">
                    <i class="bi bi-basket"></i>
                    <p>Produk tidak ditemukan atau stok habis.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>
@endsection