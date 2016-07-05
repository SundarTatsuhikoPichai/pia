<?php

namespace App\Model;

class NameAggregation {

    public static function execute(array $clubMembers) {

        $collection = collect($clubMembers);
        $chunk = $collection->chunk(5000);

        $blankAddressMembers = $chunk->map(function ($item){
            return $item->filter(function ($item, $key) {
                    return $item['address1'] === '';
            });
        });
        $uniqueMembers = $chunk->map(function ($item) {
            return $item->filter(function ($item, $key) {
                return $item['address1'] !== '';
            })->unique(function ($item) {
                return $item['birth_day'].$item['first_name_kana'].
                        $item['last_name_kana'].$item['address1'].$item['address2'];
            });
        });
        return $uniqueMembers->merge($blankAddressMembers)->collapse()->all();
    }
}
