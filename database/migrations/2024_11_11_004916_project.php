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
        Schema::create("project",function (Blueprint $table){
            $table->id();
            $table->string("image")->nullable(false);
            $table->string("imageWebp")->nullable(false);
            $table->string("title")->nullable(false);
            $table->text("description")->nullable(false);
            $table->string("isPopular")->default(0)->nullable(false);
            $table->dateTime("created_at")->nullable(false);
            $table->dateTime("updated_at")->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("project");
    }
};