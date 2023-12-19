<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddOut extends Model
{
    use HasFactory;
    protected $fillable = ['jumlah', 'barang_id','qr_code','deskripsi'];
    protected $table = 'add_barangout';
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id', 'id');
    }
    public function pemasok(){
        return $this->belongsTo(Pemasok::class, 'id');
    }
}
