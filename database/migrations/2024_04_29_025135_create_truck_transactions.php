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
        Schema::create('truck_transactions', function (Blueprint $table) {
            $table->id('truck_transaction_id');
            $table->bigInteger('truck_id');
            $table->bigInteger('site_id');
            $table->boolean('in');
            $table->boolean('out');
            $table->float('soil_amount');
            $table->timestamp('in_time')->nullable;
            $table->timestamp('out_time')->nullable;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('truck_transactions');
    }
};
