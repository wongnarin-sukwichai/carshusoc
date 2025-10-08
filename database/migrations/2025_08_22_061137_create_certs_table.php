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
        Schema::create('certs', function (Blueprint $table) {
            $table->id();
            $table->integer('section_id');
            $table->integer('enroll_id');
            $table->integer('user_id');
            $table->string('name');
            $table->string('surname');
            $table->string('title');
            $table->date('start');
            $table->date('end');
            $table->date('examdate');
            $table->longtext('meet');
            $table->integer('listening')->nullable();
            $table->integer('reading')->nullable();
            $table->integer('grammar')->nullable();
            $table->integer('conversations')->nullable();
            $table->integer('canva_id')->comment('ชื่อไฟล์ template');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certs');
    }
};
