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
        Schema::create('imageabbles', function (Blueprint $table) {
            $table->id();
            $table->string('file_name');
            $table->text('url')->nullable();
            $table->string('file_orginal_name')->nullable();
            $table->string('file_size')->nullable();
            $table->string('file_extenstion')->nullable();
            $table->morphs('imageabble');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('imageabbles');
    }
};
