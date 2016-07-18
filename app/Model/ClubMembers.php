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
            'sex'                => 'min:1|max:1',
            'birth_day'          => 'date',
            'postal_code'        => 'min:8|max:8',
            'address1'           => 'max:50',
            'address2'           => 'max:50',
            'address3'           => 'max:50',
            'address4'           => 'max:50',
            'first_name_kana'    => 'max:50',
            'last_name_kana'     => 'max:50',
            'membership_grade'   => 'required'
        ];

        return Validator::make($input, $rules);
    }

    /**
     * [readFromCSV description]
     * @param  [type] $clubId   [description]
     * @param  [type] $year     [description]
     * @param  [type] $fileName [description]
     * @return [array]           [description]
     */
    public static function readFromCSV($clubId, $year, $fileName) {

        $config = new LexerConfig();
        $config
            ->setDelimiter(',')
            ->setToCharset('UTF-8')
            ->setFromCharset('SJIS-win');

        $interpreter = new Interpreter();
        $interpreter->unstrict();
        $interpreter->addObserver(function(array $rows)
            use($clubId, $year, &$clubMembers, &$lineNumber) {

            $lineNumber += 1;
            if ($lineNumber === 1) { return; }

            $clubMembers[] = array(
                'member_id'          => $rows[1],
                'club_id'            => $clubId,
                'year'               => $year,
                'sex'                => $rows[2],
                'birth_day'          => $rows[3],
                'postal_code'        => $rows[4],
                'address1'           => $rows[5],
                'address2'           => $rows[6],
                'address3'           => $rows[7],
                'address4'           => $rows[8],
                'first_name_kana'    => $rows[16],
                'last_name_kana'     => $rows[15],
                'membership_grade' => implode(DB::table('club_membership')
                    ->where('club_id', '=', $clubId)
                    ->where('membership_name', '=', $rows[13])
                    ->pluck('membership_grade'))
            );
        });

        $lexer = new Lexer($config);
        $lexer->parse(storage_path(). '/csv/'. $fileName, $interpreter);

        return $clubMembers;
    }

    public static function registerClubMembers(array $clubMembers) {
        foreach($clubMembers as $clubMember) {
            DB::table('club_members')->insert($clubMember);
        }
    }

    public static function makePopulationPyramid($clubName, $year, $grade) {
        $id = Clubs::where('club_name', $clubName)->pluck('id');
        $members = ClubMembers::where('club_id', $id)
                                    ->where('year', $year)
                                    ->where('membership_grade', $grade)
                                    ->get();

        return PopulationPyramid::ageMaping($members);
    }
}
