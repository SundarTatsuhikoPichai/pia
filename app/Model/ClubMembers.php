<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

use Goodby\CSV\Import\Standard\Lexer;
use Goodby\CSV\Import\Standard\Interpreter;
use Goodby\CSV\Import\Standard\LexerConfig;

use Validator;
use DB;

class ClubMembers extends Model
{
    protected $table   = 'club_members';
    protected $guarded = ['id'];

    public function memberWatchings() {

        return $this->hasMany(ClubMemberWatching::class);
    }

    public function valid($input) {
        $rules = [
            'member_id'          => 'required|max:50',
            'club_id'            => 'required|integer',
            'year'               => 'required|integer|digits:4',
            'sex'                => 'required|min:1|max:1',
            'birth_day'          => 'required|date',
            'postal_code'        => 'required|min:8|max:8',
            'address1'           => 'required|max:50',
            'address2'           => 'required|max:50',
            'address3'           => 'required|max:50',
            'address4'           => 'required|max:50',
            'first_name_kana'    => 'required|max:50',
            'last_name_kana'     => 'required|max:50',
            'club_membership_id' => 'required'
        ];

        return Validator::make($input, $rules);
    }

    /**
     * [readFromCSV description]
     * @param  array  $cols [description]
     * @return [type]       [description]
     */
    public static function readFromCSV($clubId, $year, $fileName) {

        $config = new LexerConfig();
        $config
            ->setDelimiter(',')
            ->setToCharset('UTF-8')
            ->setFromCharset('SJIS-win');

        // convert encoding to SJIS-win
        // $clubId           = mb_convert_encoding($clubId, 'SJIS-win');
        // $year             = mb_convert_encoding($year, 'SJIS-win', 'auto');
        // $clubMembershipId = mb_convert_encoding('A', 'SJIS-win', 'auto');

        $interpreter = new Interpreter();
        $interpreter->unstrict();
        $interpreter->addObserver(function(array $cols) use($clubId, $year, $clubMembershipId, &$clubMembers) {

            $clubMembers[] = array(
                'member_id'          => $cols[1],
                'club_id'            => $clubId,
                'year'               => $year,
                'sex'                => $cols[2],
                'birth_day'          => $cols[3],
                'postal_code'        => $cols[4],
                'address1'           => $cols[5],
                'address2'           => $cols[6],
                'address3'           => $cols[7],
                'address4'           => $cols[8],
                'first_name_kana'    => $cols[16],
                'last_name_kana'     => $cols[15],
                'club_membership_id' => $clubMembershipId
            );
        });

        $lexer = new Lexer($config);
        $lexer->parse(storage_path(). '/csv/'. $fileName, $interpreter);
        // var_dump($clubMembers);

        return $clubMembers;
    }
}
