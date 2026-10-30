<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $table = 'laporan';
    
    // Tambahkan seluruh kolom baru di sini
    protected $fillable = [
        'nama_pelapor', 
        'no_hp', 
        'lokasi', 
        'kecamatan', 
        'tinggi_air', 
        'tanggal_kejadian', 
        'keterangan', 
        'foto', 
        'status'
    ];
}
