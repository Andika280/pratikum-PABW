<div class="card product-card">
    <div class="card-img-wrapper">
        <img src="{{ asset('images/' . $product['img']) }}" alt="{{ $product['title'] }}" class="card-img" />
        
        {{-- Syarat B: Directive Percabangan --}}
        @if($product['stock'] > 0)
            <span class="status-badge available">Tersedia</span>
        @else
            <span class="status-badge unavailable">Tidak Tersedia</span>
        @endif
    </div>
    
    <div class="card-body">
        <h3 class="card-title">{{ $product['title'] }}</h3>
        <div class="card-price">
            Rp {{ number_format($product['price'], 0, ',', '.') }}
            <span class="price-unit"> /kg</span>
        </div>
        <div class="card-footer-info">
            <div style="display: flex; justify-content: space-between; margin-bottom: 0.2rem;">
                <span><i class="bi bi-person"></i> {{ $product['farmerName'] }}</span>
                <span style="color: green; font-weight: 600;">{{ $product['stock'] }} kg ready</span>
            </div>
        </div>
    </div>
</div>