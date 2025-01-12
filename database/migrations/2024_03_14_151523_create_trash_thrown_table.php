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
        Schema::create('trash_throwns', function (Blueprint $table) {
            $table->id();
            $table->integer('score')->nullable()->default(0);
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('bin_id')->constrained('bins');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trash_throwns');
    }
};
