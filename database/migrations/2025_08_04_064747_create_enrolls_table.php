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
            $table->string('cert')->nullable()->comment('path Certificate');
            $table->date('submit')->nullable()->comment('กำหนดวันรับงานคืน');
            $table->integer('pay')->nullable()->comment('ราคาที่ต้องจ่าย-งานแปลภาษา-เจ้าหน้าที่ประเมิน');
            $table->integer('tag')->nullable()->comment('ค่าไปรษณีย์');
            $table->integer('tag')->nullable()->comment('จำนวนสลิปการโอนที่ส่งเข้ามา');
            $table->string('work')->nullable()->comment('path ผู้ใช้ส่งงาน');
            $table->string('complete')->nullable()->comment('path จนท.คืนงาน');
            $table->longText('other')->nullable()->comment('ข้อความจากเจ้าหน้าที่');
            $table->longText('comment')->nullable()->comment('ข้อความจากผู้ใช้');
            $table->integer('status')->nullable()->comment('null=pending,,0=cancel,1=active,2=complete,4=finished(จบงานแล้วไม่ต้องแสดงข้อมูลห้อง,ตรวจสิทธิ์รับใบ cert)');
            $table->integer('alert')->nullable()->comment('1=แสดง Alert');
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
