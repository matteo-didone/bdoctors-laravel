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
        Schema::create('user_details', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->primary();
            $table->string('doctor_tag', 10);
            $table->date('birth_date');
            $table->string('phone_number', 20);
            $table->string('work_address', 120);
            $table->string('personal_address', 120)->nullable();
            $table->string('performance', 80);
            $table->string('profile_picture')->default('images/default-profile-picture.jpg');
            $table->string('cv_file')->nullable();
            $table->timestamps();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_details');
    }
};
