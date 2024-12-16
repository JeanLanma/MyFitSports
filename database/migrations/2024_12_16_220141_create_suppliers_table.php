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
            $table->string('company_reason');
            $table->string('company_name');
            $table->string('contact_person')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->string('payment_method')->nullable();//credito, transferencia, efectivo
            $table->string('credit_days')->nullable()->default('N/A');
            $table->string('request_type')->nullable()->default('N/A');// Pagina, Corre, Llamada
            $table->string('stamp_type')->nullable()->default('N/A');// pendiente de pago, recibido pagado

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
