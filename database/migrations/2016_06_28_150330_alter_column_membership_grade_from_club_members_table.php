<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterColumnMembershipGradeFromClubMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('club_members', function ($table) {
            $table->string('membership_grade', 5)->change();
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
            $table->integer('membership_grade')->references('id')->on('club_membership')->unsigned()->change();
        });
    }
}
