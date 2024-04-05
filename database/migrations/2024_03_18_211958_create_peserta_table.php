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
        Schema::create('peserta', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_seleksi')->nullable()->references('id')->on('seleksi')->onDelete('cascade');
            $table->string('nama_lengkap');
            $table->string('nama_panggilan');
            $table->string('jenis_kelamin');
            $table->string('alamat');
            $table->string('tempat_lahir');
            $table->dateTime('tanggal_lahir');
            $table->string('agama');
            $table->string('bahasa');
            $table->double('bb');
            $table->double('tb');
            $table->string('asal_sekolah');
            $table->string('alamat_sekolah');
            $table->string('email_sekolah');
            $table->string('no_hp');
            $table->string('nama_ayah');
            $table->string('pekerjaan_ayah')->default(null);
            $table->string('no_hp_ayah')->default(null);
            $table->string('nama_ibu');
            $table->string('pekerjaan_ibu')->default(null);
            $table->string('no_hp_ibu')->default(null);
            $table->year('tahun_daftar');
            $table->boolean('options')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peserta');
    }
};
