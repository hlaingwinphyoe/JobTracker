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
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('name');
            $table->string('mm_name')->nullable();
            $table->text('desc')->nullable();
            $table->boolean('disabled')->default(0);
        });

        Schema::create('regions', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('name');
            $table->string('mm_name')->nullable();
            $table->foreignId('country_id')->constrained()->cascadeOnDelete();
            $table->text('desc')->nullable();
            $table->boolean('disabled')->default(0);
        });


        Schema::create('townships', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('name');
            $table->foreignId('region_id');

            $table->foreign('region_id')->references('id')->on('regions')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('name');
            $table->foreignId('township_id');

            $table->foreign('township_id')->references('id')->on('townships')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->foreignId('country_id')->nullable();
            $table->foreignId('region_id')->nullable();
            $table->timestamps();

            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('region_id')->references('id')->on('regions')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
        Schema::dropIfExists('cities');
        Schema::dropIfExists('townships');
        Schema::dropIfExists('regions');
        Schema::dropIfExists('countries');
    }
};
