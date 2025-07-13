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
        Schema::create('standscores', function (Blueprint $table) {
            $table->id();
            $table->integer('course_id');
            $table->integer('degree_id');
            $table->integer('score')->comment('คะแนนะมากกว่าให้ผ่าน');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('standscores');
    }
};
