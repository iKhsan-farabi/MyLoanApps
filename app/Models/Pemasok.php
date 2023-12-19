<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemasok extends Model
{
    use HasFactory;
    protected $table = 'pemasok';
    protected $fillable = [
        'kode_pemasok',
        'nama_pemasok',
    ];
    public function barang(){
        return $this->belongsTo(Barang::class, 'pemasok_id');
    }

}
