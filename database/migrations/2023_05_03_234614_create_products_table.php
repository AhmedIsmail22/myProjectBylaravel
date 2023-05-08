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
            $table->string("name",100)->unique();
            $table->text("details");
            $table->decimal("price",8,2);
            $table->integer("quantity");
            $table->string("image_01",255);
            $table->string("image_02",255);
            $table->string("image_03",255);
            $table->foreignId("category_id")->constrained();
            $table->timestamps();
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
