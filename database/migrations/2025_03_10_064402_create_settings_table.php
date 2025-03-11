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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('stie_name');
            $table->string('email');
            $table->string('favicon');
            $table->string('logo');
            $table->string('phone');
            $table->string('facebook');
            $table->string('linkendin');
            $table->string('twitter');
            $table->string('youtube');
            $table->string('instagram');
            $table->string('country');
            $table->string('city');
            $table->string('street');
           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
