<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLatlngTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('latlng', function (Blueprint $table) {
            $table->increments('id');
            $table->string('postal_code', 8)->unique();
            $table->double('lat', 15, 6);
            $table->double('lng', 15, 6);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('latlng');
    }
}
