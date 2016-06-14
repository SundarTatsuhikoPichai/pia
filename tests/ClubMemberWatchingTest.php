<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Model\ClubMemberWatching;

class ClubMemberWatchingTest extends TestCase
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
     * Model validation
     *
     * @return void
     */
    public function testValidation() {

        $clubMemberWatching = new ClubMemberWatching;
        $successInput = [
            'club_member_id'        => mt_rand(10000, 9999999999999999),
            'watched_at'            => '2000-01-01',
            'opponent_of_club_code' => str_random(10),
            'home_away'             => str_random(10)
        ];
        $validation = $clubMemberWatching->valid($successInput);
        $this->assertTrue($validation->passes());

        $clubMemberWatching = new ClubMemberWatching;
        $failureInput = [
            'club_member_id'        => mt_rand(10000, 9999999999999999),
            // Error expected
            'watched_at'            => '2000-01-0122',
            // Error expected
            'opponent_of_club_code' => str_random(20),
            'home_away'             => str_random(10)
        ];
        $validation = $clubMemberWatching->valid($failureInput);
        $this->assertFalse($validation->passes());
    }
}
