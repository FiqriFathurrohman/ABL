<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Identitas dan Hak Akses
            $table->string('role')->default('petani')->after('password'); // admin atau petani
            $table->string('status')->default('pending')->after('role'); // pending, approved, rejected
            $table->boolean('is_active')->default(false)->after('status'); // Untuk aktif/nonaktif akun

            // Data Lokasi untuk Peta Indonesia
            $table->string('region')->nullable()->after('is_active'); // Nama wilayah/kabupaten
            $table->decimal('latitude', 10, 8)->nullable()->after('region'); // Koordinat Lintang
            $table->decimal('longitude', 11, 8)->nullable()->after('latitude'); // Koordinat Bujur
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['role', 'status', 'is_active', 'region', 'latitude', 'longitude']);
        });
    }
};