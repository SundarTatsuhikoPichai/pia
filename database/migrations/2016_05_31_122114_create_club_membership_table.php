<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClubMembershipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('club_membership', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('club_id')->references('id')->on('clubs')->unsigned();
            $table->string('membership_name', 50);
            $table->string('membership_grade', 10);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('club_membership');
    }
}
