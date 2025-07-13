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
        Schema::create('examscores', function (Blueprint $table) {
            $table->id();
            $table->integer('course_id');
            $table->integer('exam_id')->comment('ประเภทคะแนนการสอบ');
            $table->integer('start')->comment('ช่วงคะแนนเริ่มต้น');
            $table->integer('end')->comment('สิ้นสุดคะแนน');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('examscores');
    }
};
