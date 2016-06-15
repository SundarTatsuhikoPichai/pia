<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Model\Clubs;

class ClubsTest extends TestCase
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
    */
    public function testValidation() {
        $clubs = new Clubs;
        $successInput = [
            'club_code'     => '0001',
            'club_name'     => 'クラブ',
            'stadium_name'  => str_random(100),
            'postal_code'   => '000-0000'
        ];
        $validation = $clubs->valid($successInput);
        // var_dump($validation->errors()->all());
        $this->assertTrue($validation->passes());

        $clubs = new Clubs;
        $failureInput = [
            'club_code'     => '0001',
            'club_name'     => 'クラブ',
            'stadium_name'  => str_random(100),
            /* Over digits */
            'postal_code'   => '000-00000'
        ];
        $validation = $clubs->valid($failureInput);
        $this->assertFalse($validation->passes());
    }
}
