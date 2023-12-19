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
        Schema::table('barang', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('pemasok_id')->nullable();
            $table->foreign('pemasok_id')->references('id')->on('pemasok');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('barang', function (Blueprint $table) {
            //
            $table->dropForeign(['pemasok_id']);
            $table->dropColumn('pemasok_id');
        });
    }
};
