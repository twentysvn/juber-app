<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string("shop_name", 250);
            $table->string("idrs", 7)->unique();
            $table->enum("gender", [0, 1, 2])->default(0);
            $table->string("birthdate", 250)->nullable();
            $table->string("profile_picture", 250);
            $table->string("cover_picture", 250)->nullable();
            $table->string("social_media", 250)->nullable();
            $table->string("pin", 6);
            $table->string("phone", 13);
            $table->string("token", 250)->nullable();
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
        Schema::dropIfExists('profiles');
    }
}
