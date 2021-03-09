<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoryRidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rides', function (Blueprint $table) {
            $table->id();
            $table->string("idrs",200);
            $table->integer("cost");
            $table->foreignId("driver_id")->constrained("drivers");
            $table->string("payment_method",200);
            $table->string("ori_address", 255);
            $table->string("ori_lat",200)->nullable();
            $table->string("ori_long",200)->nullable();
            $table->string("des_address", 255);
            $table->string("des_lat",200)->nullable();
            $table->string("des_long",200)->nullable();
            $table->string("status",200);            
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
        Schema::dropIfExists('history_rides');
    }
}
