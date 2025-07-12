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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->integer('course_id')->nullable()->comment('มีหมวดย่อยหรือไม่');
            $table->string('title');
            $table->longText('detail');
            $table->string('facebook')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->string('tel')->nullable();
            $table->longText('other')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
