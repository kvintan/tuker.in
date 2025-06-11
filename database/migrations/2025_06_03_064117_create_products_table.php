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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->integer('price')->nullable();
            $table->boolean('is_auction')->default(false);
            $table->integer('starting_bid')->nullable();
            $table->timestamp('auction_end_time')->nullable();
            $table->string('image_path')->nullable();
            $table->timestamps();
            $table->string('slug')->unique()->nullable();
            $table->boolean('in_stock')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
