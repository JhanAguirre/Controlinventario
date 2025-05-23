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
        Schema::table('productos', function (Blueprint $table) {
            // Añadir category_id como clave foránea
            // Asegúrate de que 'categories' es el nombre de tu tabla de categorías
            $table->foreignId('category_id')->nullable()->constrained('categories')->onDelete('set null');
            // Añadir brand_id como clave foránea
            // Asegúrate de que 'brands' es el nombre de tu tabla de marcas
            $table->foreignId('brand_id')->nullable()->constrained('brands')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('productos', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');
            $table->dropForeign(['brand_id']);
            $table->dropColumn('brand_id');
        });
    }
};
