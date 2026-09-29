<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi.
     * Tambahkan kolom 'user_id' yang hilang ke tabel 'kelompok_tani'.
     */
    public function up(): void
    {
        Schema::table('kelompok_tani', function (Blueprint $table) {
            // Cek apakah kolom sudah ada sebelum menambahkan, untuk keamanan.
            if (!Schema::hasColumn('kelompok_tani', 'user_id')) {
                // Tambahkan foreignId untuk user_id, dihubungkan ke tabel 'users' 
                // $table->after('id') menempatkannya tepat setelah kolom primary key.
                $table->foreignId('user_id')->after('id')->constrained('users')->cascadeOnDelete();
            }
        });
    }

    /**
     * Balikkan migrasi (rollback).
     * Hapus kolom 'user_id' jika migrasi dibatalkan.
     */
    public function down(): void
    {
        Schema::table('kelompok_tani', function (Blueprint $table) {
            if (Schema::hasColumn('kelompok_tani', 'user_id')) {
                // 1. Hapus foreign key constraint
                $table->dropForeign(['user_id']);
                // 2. Hapus kolom itu sendiri
                $table->dropColumn('user_id');
            }
        });
    }
};