<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCabCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cab_customers', function (Blueprint $table) {
            $table->id();
            $table->string('nama',200);
            $table->string('phone',200);
            $table->string('idrs',7)->unique();
            $table->string('picture',255)->unique(); 
            $table->string('token',255)->unique(); 
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
        Schema::dropIfExists('cab_customers');
    }
}
