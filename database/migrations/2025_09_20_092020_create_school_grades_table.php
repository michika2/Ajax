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
        Schema::create('school_grades', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->integer('grade');
            $table->string('term');
            $table->integer('japanese')->nullable();
            $table->integer('math')->nullable();
            $table->integer('science')->nullable();
            $table->integer('social_studies')->nullable();
            $table->integer('music')->nullable();
            $table->integer('home_economics')->nullable();
            $table->integer('english')->nullable();
            $table->integer('art')->nullable();
            $table->integer('health_and_physical_education')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('school_grades');
    }
};
