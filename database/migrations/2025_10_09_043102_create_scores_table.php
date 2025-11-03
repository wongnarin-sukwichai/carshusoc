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
        Schema::create('scores', function (Blueprint $table) {
            $table->id();
            $table->integer('setscore')->comment('กำหนดชุดคะแนน');
            $table->string('title');
            $table->integer('ept_start');
            $table->integer('ept_end');
            $table->string('cefr');
            $table->integer('toeic_start');
            $table->integer('toeic_end');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scores');
    }
};
