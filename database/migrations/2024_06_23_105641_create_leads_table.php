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
        Schema::create('leads', function (Blueprint $table) {
            $table->id(); 
            $table->string('first_name'); 
            $table->string('last_name'); 
            $table->string('email');  
            $table->string('business_name');  
            $table->decimal('looking_amount', 8,2); 
            $table->string('credit_score'); 
            $table->string('phone', 11); 
            $table->integer('is_dnc');  
            $table->string('status')->default(1);  
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};
