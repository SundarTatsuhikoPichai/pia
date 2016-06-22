<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyClubMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('club_members', function ($table) {
            $table->string('address2', 50)->nullable()->change();
            $table->string('address3', 50)->nullable()->change();
            $table->string('address4', 50)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('club_members', function ($table) {
            $table->string('address2', 50)->change();
            $table->string('address3', 50)->change();
            $table->string('address4', 50)->change();
        });
    }
}
