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
        Schema::create('students_courses', function (Blueprint $table) {
            $table->unsignedInteger('std_id');
            $table->unsignedMediumInteger('crs_id');
            $table->unsignedTinyInteger('degree');
            $table->foreign('std_id')->references('code')->on('students');
            $table->foreign('crs_id')->references('course_id')->on('courses');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students_courses');
    }
};
