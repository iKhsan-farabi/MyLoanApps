<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('nama_barang');
            $table->text('brand')->nullable();
            $table->foreign('kategori_id')->references('id')->on('kategori_barang')->onDelete('cascade');
            $table->integer('jumlah');
            $table->date('tanggal_beli');
            $table->decimal('harga_beli', 10, 2);
            $table->string('kondisi');
            $table->timestamps(); // Created_at dan Updated_at columns
            $table->unsignedBigInteger('kategori_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('barang', function (Blueprint $table) {
            $table->dropForeign(['kategori_id']);
            $table->dropColumn('kategori_id');
        });
    }
};
