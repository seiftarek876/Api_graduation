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
        Schema::create('bins', function (Blueprint $table) {
            $table->id();
            $table->enum('type',['paper' , 'plastic' , 'metal'])->default('plastic');
            $table->enum('isFull',['yes' , 'no'])->default('no');
            $table->double('trash_weight');
            $table->double('current_trash_weight')->default(0);
            $table->foreignId('bin_group_id')->constrained('bin_groups');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bins');
    }
};
