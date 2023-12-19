<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $table = 'Barang';
    protected $guarded = ['id'];
    protected $fillable = [
        'kode_barang', 'nama_barang', 'brand', 'kategori_id', 'jumlah',
        'tanggal_beli', 'harga_beli', 'pemasok_id', 'kondisi',
    ];


    public function addIn(){
        return $this->hasMany(AddIn::class);
    }
    public function addOut(){
        return $this->hasMany(AddOut::class);
    }

    public function hitungStok(){
        $stokMasuk = $this->addIn()->sum('jumlah');
        $stokKeluar = $this->addOut()->sum('jumlah');

        return $this->jumlah + $stokMasuk - $stokKeluar;
    }
    public function pemasok(){
        return $this->belongsTo(Pemasok::class, 'pemasok_id');
    }
    public function kategori(){
        return $this->belongsTo(KategoriBarang::class, 'kategori_id');
    }
}
