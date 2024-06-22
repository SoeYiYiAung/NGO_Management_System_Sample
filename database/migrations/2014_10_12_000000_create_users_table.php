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
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('staff_id');
            $table->foreign('staff_id')
                    ->references('id')
                    ->on('staff')
                    ->onDelete('cascade');
                    
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('created_by')->unique();
            $table->string('updated_by')->unique();
            $table->string('flag')->unique();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
