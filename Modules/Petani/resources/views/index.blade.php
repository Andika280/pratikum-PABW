@extends('layouts.main')

@section('title', 'Daftar Produk Petani')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Daftar Produk Agrilink (AJAX)</h2>
        <!-- Tombol untuk memicu Modal Tambah Data -->
        <button type="button" class="btn btn-primary" id="btnTambah">Tambah Produk</button>
    </div>
    
    <!-- Tempat Alert Pesan Sukses/Gagal AJAX -->
    <div id="alert-container"></div>

    <table class="table table-bordered align-middle" id="tabel-produk">
        <thead class="table-light">
            <tr>
                <th>No</th>
                <th>Foto</th>
                <th>Nama Produk</th>
                <th>Harga/Kg</th>
                <th>Stok (Kg)</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <!-- Data akan dimuat otomatis menggunakan AJAX oleh jQuery di bawah -->
            <tr>
                <td colspan="6" class="text-center">Memuat data...</td>
            </tr>
        </tbody>
    </table>
</div>

<!-- Modal Form Tambah / Edit Produk -->
<div class="modal fade" id="modalProduk" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="formProduk" enctype="multipart/form-data">
                @csrf
                <input type="hidden" id="produk_id" name="produk_id">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle">Tambah Produk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nama Produk</label>
                        <input type="text" class="form-label form-control" id="nama_produk" name="nama_produk" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Harga per Kg</label>
                        <input type="number" class="form-control" id="harga_per_kg" name="harga_per_kg" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Stok (Kg)</label>
                        <input type="number" class="form-control" id="stok_kg" name="stok_kg" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Foto Produk (Opsional saat edit)</label>
                        <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
                        <div class="form-text">Format: jpg, jpeg, png. Maksimal 2MB.</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" id="btnSimpan">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function () {
    // 1. Set CSRF Token untuk semua request AJAX agar tidak error 419
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    loadData();

    // 2. Fungsi Load Data Produk ke Tabel via AJAX
    function loadData() {
        $.ajax({
            url: "{{ route('petani.produk.data') }}",
            type: "GET",
            dataType: "json",
            success: function (data) {
                let rows = '';
                if (data.length === 0) {
                    rows = `<tr><td colspan="6" class="text-center text-muted">Belum ada data produk.</td></tr>`;
                } else {
                    $.each(data, function (index, item) {
                        let fotoHtml = item.foto 
                            ? `<img src="/storage/${item.foto}" width="60" height="60" class="rounded object-fit-cover">` 
                            : `<span class="text-muted">Tidak ada foto</span>`;

                        rows += `
                            <tr>
                                <td>${index + 1}</td>
                                <td>${fotoHtml}</td>
                                <td>${item.nama_produk}</td>
                                <td>Rp ${Number(item.harga_per_kg).toLocaleString('id-ID')}</td>
                                <td>${item.stok_kg}</td>
                                <td>
                                    <button class="btn btn-warning btn-sm btn-edit" data-id="${item.id}">Edit</button>
                                    <button class="btn btn-danger btn-sm btn-hapus" data-id="${item.id}" data-nama="${item.nama_produk}">Hapus</button>
                                </td>
                            </tr>
                        `;
                    });
                }
                $('#tabel-produk tbody').html(rows);
            },
            error: function () {
                $('#tabel-produk tbody').html(`<tr><td colspan="6" class="text-center text-danger">Gagal memuat data.</td></tr>`);
            }
        });
    }

    // 3. Ketika tombol "Tambah Produk" diklik
    $('#btnTambah').click(function () {
        $('#formProduk')[0].reset();
        $('#produk_id').val('');
        $('#modalTitle').text('Tambah Produk');
        $('#modalProduk').modal('show');
    });

    // 4. Proses Simpan (Tambah atau Update) menggunakan FormData (Wajib untuk Upload File AJAX)
    $('#formProduk').on('submit', function (e) {
        e.preventDefault();
        let id = $('#produk_id').val();
        let formData = new FormData(this);

        let url = id ? "/petani/produk/" + id : "{{ route('petani.produk.store') }}";
        
        if (id) {
            formData.append('_method', 'PUT'); // Spoofing method untuk update di Laravel
        }

        $.ajax({
            url: url,
            type: "POST",
            data: formData,
            processData: false, // Wajib false untuk file upload
            contentType: false, // Wajib false untuk file upload
            success: function (response) {
                $('#modalProduk').modal('hide');
                loadData();
                $('#alert-container').html(`<div class="alert alert-success alert-dismissible fade show">${response.success}<button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>`);
            },
            error: function (xhr) {
                if (xhr.status === 422) {
                    let errors = xhr.responseJSON.errors;
                    let errorMsg = '';
                    $.each(errors, function (key, value) {
                        errorMsg += value + '<br>';
                    });
                    alert("Validasi Gagal:\n" + errorMsg);
                } else {
                    alert("Terjadi kesalahan pada server.");
                }
            }
        });
    });

    // 5. Ketika tombol "Edit" diklik (Ambil data berdasarkan ID ke modal)
    $(document).on('click', '.btn-edit', function () {
        let id = $(this).data('id');
        $.get("/petani/produk/" + id + "/edit", function (data) {
            $('#produk_id').val(data.id);
            $('#nama_produk').val(data.nama_produk);
            $('#harga_per_kg').val(data.harga_per_kg);
            $('#stok_kg').val(data.stok_kg);
            $('#deskripsi').val(data.deskripsi);
            $('#modalTitle').text('Edit Produk');
            $('#modalProduk').modal('show');
        }).fail(function () {
            alert('Gagal mengambil data produk.');
        });
    });

    // 6. Ketika tombol "Hapus" diklik
    $(document).on('click', '.btn-hapus', function () {
        let id = $(this).data('id');
        let nama = $(this).data('nama');

        if (confirm(`Yakin ingin menghapus produk "${nama}"?`)) {
            $.ajax({
                url: "/petani/produk/" + id,
                type: "DELETE",
                success: function (response) {
                    loadData();
                    $('#alert-container').html(`<div class="alert alert-success alert-dismissible fade show">${response.success}<button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>`);
                },
                error: function () {
                    alert("Gagal menghapus produk.");
                }
            });
        }
    });
});
</script>
@endpush