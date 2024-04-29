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
        Schema::create('beacon_transaction', function (Blueprint $table) {
            $table->id('beacon_transaction_id');
            $table->bigInteger('beacon_id');
            $table->bigInteger('truck_transaction_id');
            $table->tinyInteger('direction');
            $table->timestamp('transaction_time');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beacon_transactions');
    }
};
