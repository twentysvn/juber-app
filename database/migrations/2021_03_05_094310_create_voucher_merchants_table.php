<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVoucherMerchantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voucher_merchants', function (Blueprint $table) {
            $table->id();
            $table->foreignId("merchant_id")->constrained("merchant_layanans");
            $table->string("voucher_name",200);
            $table->string("voucher_desc",200);
            $table->date("valid_until");
            $table->integer("nominal");

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
        Schema::dropIfExists('voucher_merchants');
    }
}
