<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\Countries;
use Illuminate\Support\Facades\Log;

class CountriesCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'countries:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return int
     */
    public function handle()
    {
        $response = Http::get('https://restcountries.com/v3.1/all');

        $res = json_decode($response, true);
        $getCountries=[];
        print_r('Iniciando fireach');

        for ($i=0; $i < 10; $i++) { 

            $countrie = new Countries();
            $country = $res[$i];
            $countrie->name = $country['name']['common'];
            $countrie->officialName = $country['name']['official'];
            $countrie->nativeName = $country['name']['nativeName']['kal']['common']??$country['name']['common'];
            $countrie->nativeOfficialName = $country['name']['nativeName']['kal']['official']??$country['name']['official'];;
    
            $countrie->save();
        
        }
    }
}
