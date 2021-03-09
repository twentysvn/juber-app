<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();
            $table->string('idrs', 7)->unique();
            $table->string('name', 250);
            $table->string('phone', 50);
            $table->string("vhc_type",50);
            $table->string('vhc_brand', 50);
            $table->string('vhc_model', 50);
            $table->string('vhc_plat', 50)->unique();
            $table->string('picture', 250);
            $table->string('lat', 250)->nullable();
            $table->string('long', 250)->nullable();
            $table->integer('status')->default(1);
            $table->string("token",250);
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
        Schema::dropIfExists('drivers');
    }
}
