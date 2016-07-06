<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Model\RegisteredCSV;

class ExampleTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testRegisterCSVFile()
    {
        $sample = new RegisteredCSV;
        $sample->file_name = 'sample';
        $this->assertTrue($sample->save());
    }
}
