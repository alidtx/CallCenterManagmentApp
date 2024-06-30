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
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('campaign_id');  
            $table->string('status')->default(1);  
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
            $table->foreign('campaign_id')->references('id')->on('campaigns')->onDelete('cascade');

            $table->index('user_id'); 
            $table->index('employee_id'); 
            $table->index('campaign_id');
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
