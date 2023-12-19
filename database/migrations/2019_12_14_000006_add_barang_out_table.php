<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('add_barangout', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('barang_id');
            $table->foreign('barang_id')->references('id')->on('barang')->onDelete('cascade');
            $table->integer('jumlah');
            $table->timestamps();
        });
    }   

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        
        Schema::dropIfExists('add_barang_out');
        
    }
};
