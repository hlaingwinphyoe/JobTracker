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
        Schema::create('faq_types', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->text('name');
            $table->timestamps();
        });

        Schema::create('faqs', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->text('desc')->nullable();
            $table->foreignId('faq_type_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faq_types');
        Schema::dropIfExists('faqs');
    }
};
