<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('artisans', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('name');
            $table->string('email')->unique(); // Unique constraint
            $table->string('phone');
            $table->string('skill');
            $table->text('address')->nullable();
            
            // Foreign key to customers table
            $table->foreignId('customer_id')->constrained('customers')->onDelete('cascade');
            // The `constrained('customers')` adds the foreign key constraint linking to the customers table
            // `onDelete('cascade')` ensures that if a customer is deleted, all their associated artisans are also deleted

            $table->timestamps(); // Timestamps for created_at and updated_at
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artisans');
    }
};
