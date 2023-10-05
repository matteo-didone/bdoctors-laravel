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
        Schema::create('sponsorship_user', function (Blueprint $table) {
            $table->id(); // Transaction ID
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('sponsorship_id');
            $table->dateTime('sponsorship_start_date');
            $table->dateTime('sponsorship_end_date');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('sponsorship_id')->references('id')->on('sponsorships')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sponsorship_user');
    }
};
