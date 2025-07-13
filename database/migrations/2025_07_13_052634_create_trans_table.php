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
        Schema::create('trans', function (Blueprint $table) {
            $table->id();
            $table->integer('coures_id');
            $table->integer('user_id');
            $table->integer('lang');
            $table->string('file_send');
            $table->integer('kind')->nullable()->comment('เจ้าหน้าที่ประเมิน');
            $table->longText('other')->nullable()->comment('เจ้าหน้าที่อธิบายรายการ');
            $table->integer('price')->nullable()->comment('เจ้าหน้าที่ประเมิน');
            $table->date('file_comp')->nullable()->comment('เจ้าหน้าที่ประเมินวันส่งมอบงาน');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trans');
    }
};
