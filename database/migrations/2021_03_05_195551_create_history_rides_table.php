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
        Schema::create('history_ride', function (Blueprint $table) {
            $table->id();
            $table->string("idrs",200);
            $table->foreignId("driver_id")->constrained("drivers_profile");
            $table->integer("cost");
            $table->string("payment_method",200);
            $table->string("ori_address", 255);
            $table->string("ori_lat",200)->nullable();
            $table->string("ori_long",200)->nullable();
            $table->string("des_address", 255);
            $table->string("des_lat",200)->nullable();
            $table->string("des_long",200)->nullable();            
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
