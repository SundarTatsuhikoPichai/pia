<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Model\ClubMemberShip;

class ClubMemberShipTest extends TestCase
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

    public function testValidation() {
        $clubMemberShip = new ClubMemberShip;
        $successInput = [
            'club_id'          => '0001',
            'membership_name'  => 'サンダーピチャイ',
            'membership_grade' => 'クラブ会員'
        ];
        $validation = $clubMemberShip->valid($successInput);
        $this->assertTrue($validation->passes());

        $clubMemberShip = new ClubMemberShip;
        $failureInput = [
            'club_id'          => '0001',
            'membership_name'  => 'サンダーピチャイ',
            'membership_grade' => 'クラブ会員サンダーピチャイ'
        ];
        $validation = $clubMemberShip->valid($failureInput);
        $this->assertFalse($validation->passes());
    }
}
