<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClubMemberWatchingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('club_member_watching', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('club_member_id')->references('id')->on('club_members')->unsigned();
            $table->date('watched_at');
            $table->string('opponent_of_club_code', 10);
            $table->string('home_away', 10);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('club_member_watching');
    }
}
