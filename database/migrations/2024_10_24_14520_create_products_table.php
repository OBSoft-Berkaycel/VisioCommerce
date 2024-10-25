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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Ürün adı
            $table->string('brand'); // Marka
            $table->decimal('price', 10, 2); // Fiyat (örn. 99999999.99)
            $table->string('image')->nullable(); // Resim
            $table->text('description')->nullable(); // Açıklama
            $table->timestamps(); // Oluşturulma ve güncellenme zamanları
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
