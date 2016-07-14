<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyClubMembersTable3 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('club_members', function ($table) {
            $table->string('address1', 50)->nullable()->change();
            $table->date('birth_day', 10)->nullable()->change();
            $table->string('postal_code', 10)->nullable()->change();
            $table->string('first_name_kana', 50)->nullable()->change();
            $table->string('last_name_kana', 50)->nullable()->change();
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
            $table->string('address1', 50)->change();
            $table->date('birth_day', 10)->change();
            $table->string('postal_code', 10)->change();
            $table->string('first_name_kana', 50)->change();
            $table->string('last_name_kana', 50)->change();
        });
    }
}
