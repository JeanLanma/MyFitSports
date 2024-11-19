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

            $table->string('name')->nullable();
            $table->string('type')->nullable();
            $table->decimal('stock', 15, 2)->nullable()->default(0.00);
            $table->decimal('costs', 15, 2)->nullable()->default(0.00);
            $table->decimal('price', 15, 2)->nullable()->default(0.00);
            $table->string('status')->nullable()->default('active');
            $table->string('unit')->nullable()->default('units');
            $table->string('supplier')->nullable()->default('n/d');
            $table->string('physical_inventory')->nullable()->default('n/d');

            $table->timestamps();
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
