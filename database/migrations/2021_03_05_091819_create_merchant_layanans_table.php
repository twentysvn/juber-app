<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMerchantLayanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchant_layanans', function (Blueprint $table) {
            $table->id();
            $table->string("nama", 200);
            $table->string("alamat", 255);
            $table->integer("rating");
            $table->string("long", 200);
            $table->string("lat", 200);
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
        Schema::dropIfExists('merchant_layanans');
    }
}
