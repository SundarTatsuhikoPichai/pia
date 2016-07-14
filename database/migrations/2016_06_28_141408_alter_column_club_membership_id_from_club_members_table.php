<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterColumnClubMembershipIdFromClubMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('club_members', function ($table) {
            $table->renameColumn('club_membership_id', 'membership_grade');
            // $table->string('membership_grade', 5);
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
            $table->renameColumn('membership_grade', 'club_membership_id');
            // $table->integer('club_membership_id')->references('id')->on('club_membership')->unsigned();
        });
    }
}
