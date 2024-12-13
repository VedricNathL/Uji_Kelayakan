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
        Schema::create('reports', function (Blueprint $table) {
            $table->id(); // ID
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Foreign key ke users
            $table->text('description'); // Deskripsi
            $table->enum('type', ['Kejahatan', 'Pembangunan', 'Sosial']); // Enum untuk tipe laporan
            $table->string('province'); // Provinsi
            $table->string('regency'); // Kabupaten/Kota
            $table->string('subdistrict'); // Kecamatan
            $table->string('village'); // Desa/Kelurahan
            $table->integer('voting')->default(0); // Jumlah voting
            $table->integer('viewers')->default(0); // Jumlah viewers
            $table->string('image')->nullable(); // Gambar
            $table->text('statement')->nullable(); // Pernyataan
            $table->timestamps(); // created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
