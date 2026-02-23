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
        Schema::create('sections', function (Blueprint $table) {
            $table->id();
            $table->integer('content_id');
            $table->integer('event_id')->comment('ประเภท');
            $table->integer('course')->nullable()->comment('null=ไม่มี,1=มี course ย่อย');
            $table->string('title');
            $table->date('start')->nullable()->comment('วันเปิดรับสมัคร');
            $table->date('end')->nullable()->comment('วันปิดรับสมัคร');
            $table->date('examdate')->nullable()->comment('วันสอบ/วันสุดท้ายของการอบรม');
            $table->string('examtime')->nullable()->comment('เวลาสอบ');
            $table->longText('meet')->nullable()->comment('สถานที่สอบ');
            $table->integer('price')->nullable()->comment('ค่าบริการ');
            $table->integer('postage')->nullable()->comment('ค่าไปรษณีย์');
            $table->longText('other')->nullable();
            $table->integer('alert')->nullable()->comment('1=แสดง Alert');
            $table->integer('status')->nullable()->comment('null=เปิด,1=จบคลอสไปแล้ว');
            $table->string('created')->comment('ใครเป็นคนสร้าง');
            $table->integer('mode')->nullable()->comment('null=เปิด, 1=ปิด');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sections');
    }
};
