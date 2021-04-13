<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
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
            $table->string('mcid', 255);
            $table->string('idrs', 255);
            $table->string('name', 255);
            $table->string('description', 255);
            $table->string('category_id', 255);
            $table->string('category_desc', 255);
            $table->integer('price');
            $table->enum('delivery_id', [1, 2, 3])->default(1);
            $table->string('delivery_desc', 255);
            $table->integer('delivery_cost');
            $table->float('weight');
            $table->string('image_path', 255);
            $table->boolean('active')->default(false);
            $table->timestamps();
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
}
