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
        Schema::create('employees', function (Blueprint $table) {
            $table->id(); 
            $table->string('name', 50);  
            $table->unsignedBigInteger('user_id');  
            $table->unsignedBigInteger('department_id');  
            $table->unsignedBigInteger('designation_id');  
            $table->string('employeeUniqueId', 10)->unique();  
            $table->boolean('status')->default(1);  
            $table->timestamps(); 
            $table->foreign('user_id')->references('id')->on('users')->onDelete('casecade');
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('casecade');
            $table->foreign('designation_id')->references('id')->on('designations')->onDelete('casecade');
            $table->index('name');  
            $table->index('user_id');
            $table->index('department_id');
            $table->index('designation_id');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
