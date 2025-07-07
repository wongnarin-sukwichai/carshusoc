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
            $table->string('title');
            $table->string('name');
            $table->string('engname');
            $table->date('born');
            $table->integer('sex')->comment('1=ชาย,2=ญ,3=lgbt');
            $table->string('nation')->comment('สัญชาติ');
            $table->integer('ident')->nullable()->comment('เลขบัตรประชาชน');
            $table->integer('idcard')->nullable()->comment('เลขหนังสือเดินทาง');
            $table->string('email')->unique();
            $table->string('tel');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('level')->nullable();
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
