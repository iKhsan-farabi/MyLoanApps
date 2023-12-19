<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Barang;
use App\Models\Pemasok;


class AddIn extends Model
{
    use HasFactory;
    protected $fillable = ['jumlah', 'barang_id','qr_code'];
    protected $table = 'add_barangin';
    protected $with = ['barang'];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id', 'id');
    }
    public function pemasok(){
        return $this->belongsTo(Pemasok::class, 'id');
    }
    
}
