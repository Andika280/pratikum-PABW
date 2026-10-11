<div class="card product-card">
    <div class="card-img-wrapper">
        {{-- Karena dari database belum ada gambar asli, kita pakai gambar default (placeholder) atau kosongkan src-nya sementara --}}
        <img src="https://ui-avatars.com/api/?name={{ urlencode($product->nama_produk) }}&background=random&color=fff&size=200" alt="{{ $product->nama_produk }}" class="card-img" />
        
        {{-- Syarat B: Directive Percabangan --}}
        @if($product->stok_kg > 0)
            <span class="status-badge available">Tersedia</span>
        @else
            <span class="status-badge unavailable">Tidak Tersedia</span>
        @endif
    </div>

    <div class="card-body">
        <h3 class="card-title">{{ $product->nama_produk }}</h3>
        
        <div class="card-price">
            Rp {{ number_format($product->harga_per_kg, 0, ',', '.') }}
            <span class="price-unit">/kg</span>
        </div>
        
        <div class="card-footer-info">
            <div style="display: flex; justify-content: space-between; margin-bottom: 0.2rem;">
                <span><i class="bi bi-person"></i> Petani Lokal</span>
                <span style="color: green; font-weight: 600;">{{ $product->stok_kg }} kg ready</span>
            </div>
        </div>
    </div>
</div>