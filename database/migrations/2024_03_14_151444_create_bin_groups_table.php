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
        Schema::create('bin_groups', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('bins_count')->default(null);
            $table->string('location');
            $table->foreignId('admin_id')->constrained('admins');
            $table->foreignId('lessor_id')->constrained('lessors');
            $table->enum('status',['inService' , 'outService' , 'maintenance'])->default('inService');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bin_groups');
    }
};
