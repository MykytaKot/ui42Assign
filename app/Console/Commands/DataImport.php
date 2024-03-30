<?php

namespace App\Console\Commands;

use App\Models\Place;
use App\Models\WebsiteParsing;

use Illuminate\Console\Command;

class DataImport extends Command
{
    private $region_url = 'https://www.e-obce.sk/kraj/NR.html';
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'imports data about districts in Nitra ';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //get districts of a region
        $webParser = new WebsiteParsing();
        $districts = $webParser->getDistricts($this->region_url);
        if($districts == 0){
            echo("error getting districts");
            return Command::FAILURE;
        }
        //loop for each district to load places in a district
        foreach ($districts as $district) {
            $places = $webParser->getPlaces($district);
            if($places == 0){
                echo("error getting places");
                return Command::FAILURE;
            }
            //parse a place and save to database
            foreach ($places as $place) {
                if($place == 0){
                    echo("error getting place");
                    return Command::FAILURE;
                }
                //parse a place
                echo("parsing $place \n");
                $place = $webParser->getInfoAboutPlace($place);
                if($place == 0){
                    echo("error getting info about place");
                    return Command::FAILURE;
                
                }
                //save to database
                $place = new Place($place);
                $place->save_to_database();
            }
        }

        
        
        echo("job done!");
        return Command::SUCCESS;
    }
}   
