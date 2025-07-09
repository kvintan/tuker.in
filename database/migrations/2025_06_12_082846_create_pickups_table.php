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
        Schema::create('pickups', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();

            // Data tambahan
            $table->string('name');         
            $table->string('phone_number');   
            $table->string('address');        
            $table->date('pickup_date')->nullable();

            // Data sampah
            $table->string('type');          
            $table->float('weight');          
            $table->decimal('price', 10, 2); 

            // Status proses
            $table->string('alasan_penolakan')->nullable();
            $table->enum('status', ['pending', 'diterima', 'ditolak'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pickups');
    }
};
