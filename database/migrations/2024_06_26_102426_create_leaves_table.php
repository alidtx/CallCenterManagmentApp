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
        Schema::create('leaves', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('designation_id');
            $table->unsignedBigInteger('department_id');
            $table->date('date_of_leave');
            $table->date('until');
            $table->string('leave_category');
            $table->boolean('status')->default(0);
            $table->unsignedInteger('total_working_day')->default(0)->index();
            $table->date('next_join_date');
            $table->longText('reason_of_leave');
            $table->string('phone', 20);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
            $table->foreign('designation_id')->references('id')->on('designations')->onDelete('cascade');
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            $table->index('user_id');
            $table->index('employee_id');
            $table->index('designation_id');
            $table->index('department_id');
            $table->index('leave_category');
            $table->index('leave_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leaves');
    }
};
