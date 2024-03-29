<?php

namespace App\Console\Commands;

use App\Models\Place;
use Illuminate\Console\Command;

class AddGeocode extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data:geocode';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $all_places = Place::all();
        foreach ($all_places as $place) {
            $place = new Place($place->toArray());
            $status = $place->geocode();
            if ($status == 0) {
                echo ("error geocoding place " . $place->getName(). "\n");
                return Command::FAILURE;
            }else{
                echo("geocoded place " . $place->getName() . "\n");
            
            }
        }
        echo("all places geocoded");
        return Command::SUCCESS;
    }
}
