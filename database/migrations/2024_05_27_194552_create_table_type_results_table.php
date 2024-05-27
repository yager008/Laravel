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
        Schema::create('type_results', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Define the user_id column first
            $table->float('result');
            $table->timestamps();
            $table->text("username");

            // Define the foreign key constraint
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('type_results');
    }
};
