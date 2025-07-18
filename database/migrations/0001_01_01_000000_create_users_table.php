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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('pic')->nullable();
            $table->string('name');
            $table->string('surname');
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->date('born')->nullable();
            $table->integer('gender')->nullable()->comment('1=ชาย,2=ญ,3=lgbt');
            $table->integer('type')->nullable()->comment('1=นิสิต,2=บุคลากร,3=บุคคลทั่วไป');
            $table->integer('degree')->nullable()->comment('ระดับการศึกษา');         
            $table->integer('nation')->nullable()->comment('สัญชาติ');
            $table->integer('ident')->nullable()->comment('1=เลขบัตรประชาชน,2=เลขหนังสือเดินทาง');
            $table->integer('idcard')->nullable();
            $table->string('tel')->nullable();
            $table->string('password');
            $table->integer('status')->nullable()->comment('1=กรอกข้อมูลแล้ว');
            $table->string('level')->nullable('1=admin');
            $table->string('edited')->nullable()->comment('admin แก้ไข level ล่าสุด');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
