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
        Schema::create('infos', function (Blueprint $table) {
            $table->id();
            $table->string('ad_id')->index();
            $table->string('impressions')->nullable();
            $table->string('clicks')->nullable();
            $table->string('unique_clicks')->nullable();
            $table->string('leads')->nullable();
            $table->string('conversion')->nullable();
            $table->string('roi')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('infos');
    }
};
