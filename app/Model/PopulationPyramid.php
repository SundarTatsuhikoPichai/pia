<?php

namespace App\Model;

class PopulationPyramid {

    /**
     * get age from birthday
     * @param  [string] $birthday [description]
     * @return [int]           [description]
     */
    private static function getAge($birthday) {
        $now = date("Ymd");
        $birthday = date(str_replace('-', '', $birthday));

        return floor(($now - $birthday) / 10000);
    }


    public static function ageMaping($members) {
        $collection = collect($members);
        $collection = $collection->filter(function($item) {
            return $item['birth_day'] !== '0000-00-00';
        });
        $clubMembers = $collection->toArray();

        $men0 = 0;
        $men10 = 0;
        $men20 = 0;
        $men30 = 0;
        $men40 = 0;
        $men50 = 0;
        $men60 = 0;
        $men70 = 0;
        $men80 = 0;
        $female0 = 0;
        $female10 = 0;
        $female20 = 0;
        $female30 = 0;
        $female40 = 0;
        $female50 = 0;
        $female60 = 0;
        $female70 = 0;
        $female80 = 0;

        foreach ($clubMembers as $clubMember) {
            if ($clubMember['sex'] === '男') {
                if (self::getAge($clubMember['birth_day']) >= 80) {
                    ++$men80;
                } else if (self::getAge($clubMember['birth_day']) >= 70) {
                    ++$men70;
                } else if (self::getAge($clubMember['birth_day']) >= 60) {
                    ++$men60;
                } else if (self::getAge($clubMember['birth_day']) >= 50) {
                    ++$men50;
                } else if (self::getAge($clubMember['birth_day']) >= 40) {
                    ++$men40;
                } else if (self::getAge($clubMember['birth_day']) >= 30) {
                    ++$men30;
                } else if (self::getAge($clubMember['birth_day']) >= 20) {
                    ++$men20;
                } else if (self::getAge($clubMember['birth_day']) >= 10) {
                    ++$men10;
                } else if (self::getAge($clubMember['birth_day']) >= 0) {
                    ++$men0;
                }
            } else {
                if (self::getAge($clubMember['birth_day']) >= 80) {
                    --$female80;
                } else if (self::getAge($clubMember['birth_day']) >= 70) {
                    --$female70;
                } else if (self::getAge($clubMember['birth_day']) >= 60) {
                    --$female60;
                } else if (self::getAge($clubMember['birth_day']) >= 50) {
                    --$female50;
                } else if (self::getAge($clubMember['birth_day']) >= 40) {
                    --$female40;
                } else if (self::getAge($clubMember['birth_day']) >= 30) {
                    --$female30;
                } else if (self::getAge($clubMember['birth_day']) >= 20) {
                    --$female20;
                } else if (self::getAge($clubMember['birth_day']) >= 10) {
                    --$female10;
                } else if (self::getAge($clubMember['birth_day']) >= 0) {
                    --$female0;
                }
            }
        }

        $dataArray = array(
            ['年齢', '男性', '女性'],
            ['10歳未満', $men0, $female0],
            ['10代', $men10, $female10],
            ['20代', $men20, $female20],
            ['30代', $men30, $female30],
            ['40代', $men40, $female40],
            ['50代', $men50, $female50],
            ['60代', $men60, $female60],
            ['70代', $men70, $female70],
            ['80歳以上', $men80, $female80],
        );

        return $dataArray;
    }
}
