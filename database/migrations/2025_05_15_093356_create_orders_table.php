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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->dateTime('datetime', precision: 0);
            $table->enum('status', ['подтверждено', 'отменено', 'завершено'])->default('подтверждено');
            $table->string('reason', 100)->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('plase_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('plase_id')->references('id')->on('places');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
