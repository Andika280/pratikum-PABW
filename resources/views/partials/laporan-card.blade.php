<div class="card">
    <h3>Lokasi: {{ $laporan->lokasi }}</h3>
    <p>Nama: {{ $laporan->nama_pelapor }}</p>
    <p>Tinggi Genangan: {{ $laporan->tinggi_genangan }} cm</p>
    <p>Tanggal: {{ $laporan->tanggal_kejadian }}</p>

    {{-- Logika Penentuan Status --}}
    @if($laporan->tinggi_genangan < 30)
        <p>Status: <span style="color: #d4a017; font-weight: bold;">Waspada</span></p>
    @elseif($laporan->tinggi_genangan >= 30 && $laporan->tinggi_genangan <= 70)
        <p>Status: <span style="color: orange; font-weight: bold;">Siaga</span></p>
    @else
        <p>Status: <span style="color: red; font-weight: bold;">Awas</span></p>
    @endif
</div>