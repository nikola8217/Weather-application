<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class DailyUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'minute:update';

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
        $message = 'Vremenska prognoza za vase gradove: ';
        foreach ($users as $user) {
            $cities = DB::table('user_grads')->where('user_id', $user->id)->get();
            foreach ($cities as $city) {
                $api_key = '283ffcd4756f546f71f2e37f52c59bd9';
                $api_url = 'https://api.openweathermap.org/data/2.5/weather?q='.$city->grad.'&units=metric&appid='.$api_key;
                $temp_data = json_decode(file_get_contents($api_url), true);
                $temperatura = $temp_data['main']['temp'];
                $city->temperatura = $temperatura;
                if($city->temperatura > 15){
                    $city->savet = 'Obucite se lagodno';
                }
                else{
                    $city->savet = 'Obucite se slojevito';
                }
                
                
                $message .= ' Grad: ' . $city->grad . ' Temperatura: ' . $city->temperatura . ' Savet: ' .$city->savet .',';
               
                
            }
            Mail::raw($message, function ($mail) use ($user) {
                $mail->from('nztest321@gmail.com');
                $mail->to('nztest321@gmail.com')
                    ->subject('Vremenska prognoza');
            });
        }

        $this->info('Successfully sent weather forecast to everyone.');
        return 0;
    }
}
