<?php

use Illuminate\Database\Seeder;

class ClubsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('clubs')->insert([
            'club_code'     =>  'KA',
            'club_name'     =>  '【テスト】鹿島アントラーズ',
            'stadium_name'  =>  'カシマサッカースタジアム',
            'postal_code'   =>  '3140007'
        ]);

        DB::table('clubs')->insert([
            'club_code'     =>  'UR',
            'club_name'     =>  '【テスト】浦和レッズ',
            'stadium_name'  =>  '埼玉スタジアム',
            'postal_code'   =>  '3360972'
        ]);

        DB::table('clubs')->insert([
            'club_code'     =>  'NI',
            'club_name'     =>  '【テスト】新潟アルビレックス',
            'stadium_name'  =>  '新潟スタジアム',
            'postal_code'   =>  '9500933'
        ]);
    }
}
