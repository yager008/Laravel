<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('SavedTexts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->float('text');
            $table->float('text_name');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('SavedTexts');
    }
};
