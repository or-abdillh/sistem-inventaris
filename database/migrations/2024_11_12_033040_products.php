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
        //

        // membuat table products dengan kolom name, price, dan description
        Schema::create("products", function (Blueprint $table) {

            // membuat kolom ID
            $table->id();

            // membuat kolom name;
            $table->string("name");

            // membuat kolom price dengan type data varchar
            $table->string("price");

            // create description column with text data type
            $table->text("description");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
