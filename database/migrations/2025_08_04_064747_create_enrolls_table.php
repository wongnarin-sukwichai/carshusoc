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
            $table->integer('section_id');
            $table->integer('user_id');
            $table->string('payment')->nullable()->comment('หลักฐานการโอน');
            $table->string('cert')->nullable()->comment('path Certificate');
            $table->date('submit')->nullable()->comment('กำหนดวันรับงานคืน');
            $table->string('work')->nullable()->comment('path ผู้ใช้ส่งงาน');
            $table->string('complete')->nullable()->comment('path จนท.คืนงาน');
            $table->longText('other')->nullable();
            $table->integer('status')->nullable()->comment('null=pending,1=active,2=complete,0=cancel');
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
