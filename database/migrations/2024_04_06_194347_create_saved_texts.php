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
        Schema::create('saved_texts.blade.php', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->longText('text');
            $table->string('text_name');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('saved_texts.blade.php');
    }
};
