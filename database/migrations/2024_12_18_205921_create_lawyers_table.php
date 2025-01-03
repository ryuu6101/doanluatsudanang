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
        Schema::create('lawyers', function (Blueprint $table) {
            $table->id();
            $table->string('fullname')->nullable();
            $table->string('slug')->nullable();
            $table->string('profile_pic')->nullable();
            $table->string('card_number')->nullable();
            $table->string('workplace')->nullable();
            $table->unsignedBigInteger('organization_id')->nullable();
            $table->date('birthday')->nullable();
            $table->date('card_issuance_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lawyers');
    }
};
