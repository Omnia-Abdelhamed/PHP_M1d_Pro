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
        Schema::create('students', function (Blueprint $table) {
            $table->unsignedInteger('code')->primary();// primary => big int => id
            $table->string('std_name',30);
            $table->string('email',255)->unique();
            $table->char('phone',11)->unique()->nullable();
            $table->unsignedTinyInteger('dept_id');
            $table->foreign('dept_id')->references('dept_num')->on('departments');
            $table->timestamps(); // created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
