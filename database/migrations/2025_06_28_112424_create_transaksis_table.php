<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable();
            $table->text('alamat')->nullable();
            $table->unsignedBigInteger('produk_id')->nullable(); // manual FK
            $table->integer('qty')->nullable();
            $table->integer('total')->default(0);
            $table->timestamps();

            // Manual foreign key
            $table->foreign('produk_id')->references('id')->on('produks')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
