<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeleteColumnClubsImagename extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clubs', function (Blueprint $table) {
            $table->string('image_name', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clubs', function (Blueprint $table) {
            $table->string('image_name', 100);
        });
    }
}
