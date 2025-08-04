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
        Schema::create('contents', function (Blueprint $table) {
            $table->id();
            $table->string('pic')->nullable();
            $table->string('title');
            $table->string('short_name')->nullable();
            $table->longText('detail')->nullable();
            $table->longText('mission')->nullable();
            $table->longText('scope')->nullable();
            $table->string('facebook')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->string('tel')->nullable();
            $table->string('owner')->nullable();
            $table->longText('other')->nullable();
            $table->integer('created_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contents');
    }
};
