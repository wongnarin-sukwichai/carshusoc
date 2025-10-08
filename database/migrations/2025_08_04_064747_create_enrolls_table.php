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
        Schema::create('enrolls', function (Blueprint $table) {
            $table->id();
            $table->integer('content_id');
            $table->integer('section_id');
            $table->integer('user_id');
            $table->integer('course_id');
            $table->string('title')->nullable();
            $table->date('start')->nullable();
            $table->date('end')->nullable();
            $table->date('give')->nullable()->comment('ให้ไว้ ณ วันที่');
            $table->integer('cert')->nullable()->comment('Certificate null=ไม่ผ่าน, มีเลข id canva=ผ่าน');
            $table->date('submit')->nullable()->comment('กำหนดวันรับงานคืน');
            $table->integer('pay')->nullable()->comment('ราคาที่ต้องจ่าย-งานแปลภาษา-เจ้าหน้าที่ประเมิน');
            $table->integer('tag')->nullable()->comment('ค่าไปรษณีย์');
            $table->integer('payment')->nullable()->comment('จำนวนสลิปการโอนที่ส่งเข้ามา');
            $table->integer('work')->nullable()->comment('null=ไม่มี, 1+=มีผู้ใช้ส่งงาน');
            $table->integer('complete')->nullable()->comment('null=ไม่มี, 1+=มีผู้ใช้ส่งงาน');
            $table->longText('other')->nullable()->comment('ข้อความจากเจ้าหน้าที่');
            $table->longText('comment')->nullable()->comment('ข้อความจากผู้ใช้');
            $table->integer('status')->nullable()->comment('null=pending,,0=cancel,1=active,2=complete');
            $table->integer('alert')->nullable()->comment('1=แสดง Alert');
            $table->integer('slip')->nullable()->comment('1=ผู้ใช้ต้องการใบเสร็จ');
            $table->integer('receipt')->nullable()->comment('ใบเสร็จ');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrolls');
    }
};
