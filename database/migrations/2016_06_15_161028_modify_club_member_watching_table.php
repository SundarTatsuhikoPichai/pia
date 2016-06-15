<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyClubMemberWatchingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('club_member_watching', function ($table) {
            $table->string('member_id', 50)->after('club_member_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('club_member_watching', function ($table) {
            $table->dropColumn('member_id');
        });
    }
}
