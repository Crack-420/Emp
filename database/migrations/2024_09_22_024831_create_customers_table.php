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
        Schema::create('customers', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('name');
            $table->string('email')->unique(); // Unique constraint
            $table->string('phone');
            $table->text('address')->nullable();
            $table->timestamps(); // Timestamps for created_at and updated_at
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
