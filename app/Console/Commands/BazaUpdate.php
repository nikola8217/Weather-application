<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class BazaUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'baza:update';

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
        $users = User::all();
        foreach ($users as $user) {
            $cities = DB::table('user_grads')->where('user_id', $user->id)->get();
            foreach ($cities as $city) {
                $api_key = '283ffcd4756f546f71f2e37f52c59bd9';
                $api_url = 'https://api.openweathermap.org/data/2.5/weather?q='.$city->grad.'&units=metric&appid='.$api_key;
                $temp_data = json_decode(file_get_contents($api_url), true);
                $temperatura = $temp_data['main']['temp'];
                
                if($temperatura > 15){
                    $savet = 'Obucite se lagodno';
                }
                else{
                    $savet = 'Obucite se slojevito';
                }
                
                
                DB::table("user_grads")->where("grad_id", $city->grad_id)->update([
                    "temperatura" => $temperatura,
                    "savet" => $savet
                ]);
               
                
            }
        }

        $this->info('Successfully sent weather forecast to everyone.');
        return 0;
    }
}
