<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Model\ClubMembers;

class ClubMembersTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    /**
     *  Model validation
     *
     * @return void
     */
    public function testValidation() {

        $clubMembers = new ClubMembers;
        $successInput = [
            'member_id'          => str_random(50),
            'club_id'            => mt_rand(0, 10000000000),
            'year'               => 2000,
            'sex'                => 'm',
            'birth_day'          => '2000-01-01',
            'postal_code'        => '000-0000',
            'address1'           => str_random(50),
            'address2'           => str_random(50),
            'address3'           => str_random(50),
            'address4'           => str_random(50),
            'first_name_kana'    => str_random(50),
            'last_name_kana'     => str_random(50),
            'club_membership_id' => 3333
        ];
        $validation = $clubMembers->valid($successInput);
        $this->assertTrue($validation->passes());

        $clubMembers = new ClubMembers;
        $failureInput = [
            'member_id'          => str_random(50),
            'club_id'            => mt_rand(0, 10000000000),
            // Error expected
            'year'               => 20000,
            // Error expected
            'sex'                => '',
            // Error expected
            'birth_day'          => '',
            // Error expected
            'postal_code'        => '',
            // Error expected
            'address1'           => str_random(100),
            'address2'           => str_random(50),
            'address3'           => str_random(50),
            'address4'           => str_random(50),
            'first_name_kana'    => str_random(50),
            'last_name_kana'     => str_random(50),
            'club_membership_id' => 3333
        ];
        $validation = $clubMembers->valid($failureInput);
        $this->assertFalse($validation->passes());
    }

    public function testReadFromCSV() {
        $clubMembers =  ClubMembers::readFromCSV(9, 2016, 'AN_2016_member_20160516090134.csv');
        ClubMembers::saveClubMembers($clubMembers);
    }
}
