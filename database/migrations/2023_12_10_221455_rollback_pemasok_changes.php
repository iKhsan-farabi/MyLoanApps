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
        Schema::table('pemasok', function (Blueprint $table) {
            //
        //   $table->string('kode_pemasok');
        //   $table->string('nama_pemasok');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pemasok', function (Blueprint $table) {
            //
            $table->dropColumn('nama_pemasok');
        });
    }
};
