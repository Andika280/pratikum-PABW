<div class="card">
    <h3>Lokasi: {{ $laporan['lokasi'] }}</h3>
    <p><strong>Nama Pelapor:</strong> {{ $laporan['nama'] }}</p>
    <p><strong>Tinggi Genangan Air:</strong> {{ $laporan['tinggi_air'] }} cm</p>

    {{-- Logika Penentuan Status --}}
    @if($laporan['tinggi_air'] < 30)
        <p>Status: <span style="color: #d4a017; font-weight: bold;">Waspada</span></p>
    @elseif($laporan['tinggi_air'] >= 30 && $laporan['tinggi_air'] <= 70)
        <p>Status: <span style="color: orange; font-weight: bold;">Siaga</span></p>
    @else
        <p>Status: <span style="color: red; font-weight: bold;">Awas</span></p>
    @endif
</div>