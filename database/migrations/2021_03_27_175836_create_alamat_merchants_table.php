<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlamatMerchantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alamat_merchant', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mc_id')->constrained('merchant_layanans');
            $table->string('idrs');
            $table->string('judul');
            $table->string('phone');
            $table->string('provinsi');
            $table->string('kota_kab');
            $table->string('kecamatan');
            $table->integer('kodepos');
            $table->string('alamat_lengkap');
            $table->string('rincian')->nullable();
            $table->string('lat');
            $table->string('lon');
            $table->boolean('is_utama')->default(false);
            $table->boolean('is_layanan')->default(false);
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
        Schema::dropIfExists('alamat_merchant');
    }
}
