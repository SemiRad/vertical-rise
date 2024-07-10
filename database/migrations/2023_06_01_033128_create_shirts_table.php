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
        Schema::create('shirts', function (Blueprint $table) {
            $table->id();
            $table->string('shirt_name');
            $table->string('shirt_size');
            $table->decimal('unit_price', 8, 2);
            $table->integer('shirt_qty');
            $table->string('shirt_img', 300);
            $table->string('shirt_color');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shirts');
    }
};
