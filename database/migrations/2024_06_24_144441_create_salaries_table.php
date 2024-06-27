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
        Schema::create('salaries', function (Blueprint $table) {
            
                $table->id();
                $table->decimal('amount', 8, 2); // Assuming 'amount' is a monetary value
                $table->unsignedBigInteger('employee_id');
                $table->unsignedBigInteger('designation_id');
                $table->unsignedBigInteger('department_id');
                $table->boolean('status')->default(1);
                $table->timestamps();

                $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
                $table->foreign('designation_id')->references('id')->on('designations')->onDelete('cascade');
                $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');

                $table->index('employee_id'); 
                $table->index('designation_id'); 
                $table->index('department_id');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salaries');
    }
};
