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
        Schema::create("carousel",function (Blueprint $table){
            $table->id();
            $table->String("image")->nullable(false);
            $table->String("imageWebp")->nullable(false);
            $table->String("title")->nullable(false);
            $table->String("description")->nullable(false);
            $table->String("created_at")->nullable(false);
            $table->String("updated_at")->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("carousel");
    }
};
