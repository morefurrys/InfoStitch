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
            $table->foreignId('customer_id')->constrained('customers')->cascadeOnDelete();
            $table->float('bust');
            $table->float('bust_cir');
            $table->float('waist');
            $table->float('hips');
            $table->float('arm');
            $table->float('arm_cir');
            $table->float('biceps');
            $table->float('biceps_cir');
            $table->float('forearm');
            $table->float('forearm_cir');
            $table->float('shoulder');
            $table->float('off_shoulder')->nullable();
            $table->float('dart')->nullable();
            $table->float('dart_cir')->nullable();
            $table->float('neck')->nullable();
            $table->float('mini_dress')->nullable();
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
