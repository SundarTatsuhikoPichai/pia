<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClubMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('club_members', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('club_id')->references('id')->on('clubs')->unsigned();
            $table->tinyInteger('year');
            $table->string('sex', 1);
            $table->date('birth_day', 10);
            $table->string('postal_code', 8);
            $table->string('address1', 50);
            $table->string('address2', 50);
            $table->string('address3', 50);
            $table->string('address4', 50);
            $table->string('first_name_kana', 50);
            $table->string('last_name_kana', 50);
            $table->integer('club_membership_id')->references('id')->on('club_membership')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('club_members');
    }
}
