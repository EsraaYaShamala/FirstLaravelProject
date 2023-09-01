<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->String('name');
            $table->integer('price');
            $table->integer('views')->default(0);
            $table->jsonb('size');
            $table->String('isFeatured');
            $table->unsignedBigInteger('cat_id');
            $table->String('description');
            $table->String('image')->nullable();
            $table->timestamps();
            $table->foreign('cat_id')->references('id')->on('categories')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
