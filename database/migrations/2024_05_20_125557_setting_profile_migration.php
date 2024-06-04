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
        Schema::table('peserta', function (Blueprint $table) {
            $table->string('nama_ayah')->nullable()->change();
            $table->string('pekerjaan_ayah')->nullable()->change();
            $table->string('no_hp_ayah')->nullable()->change();
            $table->string('nama_ibu')->nullable()->change();
            $table->string('pekerjaan_ibu')->nullable()->change();
            $table->string('no_hp_ibu')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
