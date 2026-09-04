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
        Schema::create('website_settings', function (Blueprint $table) {
           $table->id();
            $table->text('brand_name')->nullable();
            $table->longText('description')->nullable();
            $table->text('location')->nullable();
            $table->text('phone_1')->nullable();
            $table->text('phone_2')->nullable();
            $table->text('email')->nullable();
            $table->string('logo')->nullable();
            $table->string('logo_white')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('website_settings');
    }
};
