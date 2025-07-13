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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('pic');
            $table->integer('course_id');
            $table->integer('user_id');
            $table->string('dep')->nullable();
            $table->string('bank');
            $table->date('date');
            $table->string('time');
            $table->string('vat')->nullable();
            $table->longText('address')->nullable();
            $table->string('other')->nullable();
            $table->integer('send')->nullable()->comment('null=ไม่ระบุ,1=รับที่เคาร์เตอร์,2=ส่งไปรษณี');
            $table->integer('shipping')->nullable();
            $table->integer('total')->comment('ที่ต้องจ่าย');
            $table->integer('price')->comment('จ่ายจริง');
            $table->string('edited')->nullable()->comment('admin แก้ไข level ล่าสุด');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
