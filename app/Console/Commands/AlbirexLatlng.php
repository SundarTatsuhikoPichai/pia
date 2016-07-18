<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Model\Clubs;
use App\Model\ClubMembers;
use App\Model\Latlng;

class AlbirexLatlng extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'script:albirex_latlng';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Search and save albirex supporters latlng.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
        // Start batch
        print("================= START latlng search =====================\n\n");

        $albirex = Clubs::where('club_code', 'AN')->first();
        $albirexMembers = ClubMembers::where('club_id', $albirex['id'])->get();

        $albirexMembers->groupby('postal_code')->each(function ($item) {
            $postal_code = $item->first()['postal_code'];
            $json = json_decode(file_get_contents("http://geoapi.heartrails.com/api/json?method=searchByPostal&postal=".$postal_code));

            if(isset($json->response->location)) {
                $collected = collect($json->response->location);

                $latlng = Latlng::create([
                    'postal_code' => $postal_code,
                    'lat'   => $collected->first()->x,
                    'lng'   => $collected->first()->y
                ]);
                print($collected->first()->x." : ".$collected->first()->y." inserted\n");
                print("sleep 1sec... \n");
                sleep(1);
            } else {
                print("!! skip 1 postal \n");
            }
        });

        // End batch
        print("================= END latlng search =====================\n");
    }
}
