<?php

namespace App\Console\Commands;


use App\Models\WebsiteParsing;

use Illuminate\Console\Command;

class DataImport extends Command
{
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
        $webParser = new WebsiteParsing();
        $districts = $webParser->getDistricts('https://www.e-obce.sk/kraj/NR.html');
        $vilages = $webParser->getPlaces($districts['Komárno']);
        $place = $webParser->getInfoAboutPlace($vilages['Čalovec']);
        var_dump($place);
        echo("job done!");
        return Command::SUCCESS;
    }
}
