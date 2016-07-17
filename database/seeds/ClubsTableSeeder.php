<?php

use Illuminate\Database\Seeder;
use App\Model\Clubs;

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

        /**
        *   2014 ~ 2016までJ1に所属していたチーム
        *
        */

        DB::table('clubs')->delete();

        Clubs::create([
            'club_code'     =>  'VS',
            'club_name'     =>  'ベガルタ仙台',
            'stadium_name'  =>  'ユアテックスタジアム仙台',
            'postal_code'   =>  '981-3131'
        ]);

        Clubs::create([
            'club_code'     =>  'KA',
            'club_name'     =>  '鹿島アントラーズ',
            'stadium_name'  =>  '茨城県立カシマサッカースタジアム',
            'postal_code'   =>  '314-0007'
        ]);

        Clubs::create([
            'club_code'     =>  'UR',
            'club_name'     =>  '浦和レッズ',
            'stadium_name'  =>  '埼玉スタジアム2002',
            'postal_code'   =>  '336-0972'
        ]);

        Clubs::create([
            'club_code'     =>  'OA',
            'club_name'     =>  '大宮アルディージャ',
            'stadium_name'  =>  'NACK5スタジアム',
            'postal_code'   =>  '330-0803'
        ]);

        Clubs::create([
            'club_code'     =>  'KR',
            'club_name'     =>  '柏レイソル',
            'stadium_name'  =>  '日立柏サッカー場',
            'postal_code'   =>  '277-0083'
        ]);

        Clubs::create([
            'club_code'     =>  'TO',
            'club_name'     =>  'FC東京',
            'stadium_name'  =>  '味の素スタジアム',
            'postal_code'   =>  '182-0032'
        ]);

        Clubs::create([
            'club_code'     =>  'KF',
            'club_name'     =>  '川崎フロンターレ',
            'stadium_name'  =>  '等々力陸上競技場',
            'postal_code'   =>  '211-0052'
        ]);

        Clubs::create([
            'club_code'     =>  'YM',
            'club_name'     =>  '横浜F・マリノス',
            'stadium_name'  =>  '日産スタジアム',
            'postal_code'   =>  '222-0036'
        ]);

        Clubs::create([
            'club_code'     =>  'BM',
            'club_name'     =>  '湘南ベルマーレ',
            'stadium_name'  =>  'Shonan BMW スタジアム平塚',
            'postal_code'   =>  '254-0074'
        ]);

        Clubs::create([
            'club_code'     =>  'VE',
            'club_name'     =>  'ヴァンフォーレ甲府',
            'stadium_name'  =>  '山梨中銀スタジアム',
            'postal_code'   =>  '400-0836'
        ]);

        Clubs::create([
            'club_code'     =>  'AN',
            'club_name'     =>  'アルビレックス新潟',
            'stadium_name'  =>  'デンカビッグスワンスタジアム',
            'postal_code'   =>  '950-0933'
        ]);

        Clubs::create([
            'club_code'     =>  'JU',
            'club_name'     =>  'ジュビロ磐田',
            'stadium_name'  =>  '静岡県小笠山総合運動公園スタジアム',
            'postal_code'   =>  '437-0031'
        ]);

        Clubs::create([
            'club_code'     =>  'NG',
            'club_name'     =>  '名古屋グランパスエイト',
            'stadium_name'  =>  '豊田スタジアム',
            'postal_code'   =>  '471-0016'
        ]);

        Clubs::create([
            'club_code'     =>  'GO',
            'club_name'     =>  'ガンバ大阪',
            'stadium_name'  =>  '市立吹田サッカースタジアム',
            'postal_code'   =>  '565-0826'
        ]);

        Clubs::create([
            'club_code'     =>  'VI',
            'club_name'     =>  'ヴィッセル神戸',
            'stadium_name'  =>  '神戸総合運動公園ユニバー記念競技場',
            'postal_code'   =>  '654-0163'
        ]);

        Clubs::create([
            'club_code'     =>  'SH',
            'club_name'     =>  'サンフレッチェ広島F.C',
            'stadium_name'  =>  '広島ビッグアーチ',
            'postal_code'   =>  '731-3167'
        ]);

        Clubs::create([
            'club_code'     =>  'AF',
            'club_name'     =>  'アビスパ福岡',
            'stadium_name'  =>  'レベルファイブスタジアム',
            'postal_code'   =>  '816-0052'
        ]);

        Clubs::create([
            'club_code'     =>  'ST',
            'club_name'     =>  'サガン鳥栖',
            'stadium_name'  =>  '鳥栖スタジアム',
            'postal_code'   =>  '841-0034'
        ]);

        Clubs::create([
            'club_code'     =>  'VO',
            'club_name'     =>  '徳島ヴォルティス',
            'stadium_name'  =>  'ポカリスエットスタジアム',
            'postal_code'   =>  '772-0017'
        ]);

        Clubs::create([
            'club_code'     =>  'SS',
            'club_name'     =>  '清水エスパルス',
            'stadium_name'  =>  'IAIスタジアム日本平',
            'postal_code'   =>  '323-0926'
        ]);

        Clubs::create([
            'club_code'     =>  'MY',
            'club_name'     =>  'モンテディオ山形',
            'stadium_name'  =>  'NDソフトスタジアム山形',
            'postal_code'   =>  '994-0000'
        ]);

        Clubs::create([
            'club_code'     =>  'YG',
            'club_name'     =>  '松本山雅FC',
            'stadium_name'  =>  'アルウィン',
            'postal_code'   =>  '390-1243'
        ]);

    }
}
