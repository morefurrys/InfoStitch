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
        Schema::create('body_metrics', function (Blueprint $table) {
            $table->bigIncrements('body_metrics_id')->primary();
            $table->foreignId('customer_id');
            $table->float('bust');
            $table->float('waist');
            $table->float('hips');
            $table->float('arm');
            $table->float('shoulder');
            $table->float('off_shoulder');
            $table->float('dart');
            $table->float('neck');
            $table->float('mini_dress');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('body_metrics');
    }
};
