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
    Schema::create('transactions', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->string('trx_id')->unique();
        $table->decimal('total_amount', 15, 2)->default(0);
        $table->decimal('fee_admin', 15, 2)->default(0); // 4%
        $table->decimal('dana_kas', 15, 2)->default(0);  // 6%
        $table->string('status')->default('pending');
        $table->timestamps();
    });
}
};
