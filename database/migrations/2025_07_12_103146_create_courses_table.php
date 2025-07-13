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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->integer('project_id');
            $table->string('pic')->nullable();
            $table->integer('event')->comment('ประเภทการให้บริการ');
            $table->integer('exam_id')->nullable()->comment('ประเภทการสอบ');
            $table->string('title');
            $table->longText('detail')->nullable();
            $table->date('start')->nullable()->comment('วันเปิดรับสมัคร');
            $table->date('end')->nullable();
            $table->date('examdate')->nullable()->comment('วันที่สอบ');
            $table->string('examtime')->nullable()->comment('เวลาที่สอบ');
            $table->longText('meet')->nullable()->comment('สถานที่สอบ');
            $table->string('facebook')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->string('tel')->nullable();
            $table->string('owner')->nullable();
            $table->longText('other')->nullable();
            $table->integer('status')->nullable()->comment('null=เปิด,1=จบคลอสไปแล้ว');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
