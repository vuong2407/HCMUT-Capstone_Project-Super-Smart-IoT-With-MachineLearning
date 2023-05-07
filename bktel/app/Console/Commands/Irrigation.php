<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Kreait\Firebase\Factory;
use GuzzleHttp\Client;

class Irrigation extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'irrigation:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cronjob for calling api to python-app to get the result of irrigation intelligent module';

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
        $factory = (new Factory)
                    ->withServiceAccount(__DIR__.'/doan2-4397c-firebase-adminsdk-x32sr-0196d132ff.json')
                    ->withDatabaseUri('https://doan2-4397c-default-rtdb.firebaseio.com/');
        $database = $factory->createDatabase();
        $client = new Client();
        $url = 'http://bktel-python-1:5000/api/predict-watering';
        // temp is got from firebase
        $temp = $database->getReference('dataDHT11')->getValue()['datasets'][0]['data'];
        // moisture is got from firebase
        $moisture = $database->getReference('dataMoisture')->getValue()['datasets'][0]['data'];
        $response = $client->request('GET', $url, [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [
                "moisture" => $moisture,
                "temperature" => $temp
            ],
        ]);
        $responseBody = $response->getBody()->getContents();
        $database->getReference('iggrigation')->set((int)$responseBody);
        return 0;
    }
}
