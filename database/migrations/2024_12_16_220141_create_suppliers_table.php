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
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('category_id')->nullable();
            $table->string('fiscal_name');
            $table->string('trade_name');
            $table->string('responsible_contact')->nullable();
            $table->string('phone')->nullable();
            $table->string('mail')->nullable();
            $table->string('web_url')->nullable();
            $table->string('payment_method')->nullable();//credito, transferencia, efectivo
            $table->string('credit_days')->nullable()->default('N/A');
            $table->string('application_type')->nullable()->default('N/A');// Pagina, Corre, Llamada
            $table->string('seal_type')->nullable()->default('N/A');// Pagina, Corre, Llamada

            $table->foreign('category_id')->references('id')->on('product_categories')->onDelete('set null');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suppliers');
    }
};
