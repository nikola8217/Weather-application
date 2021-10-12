<?php

namespace App\Http\Controllers;

use App\Models\Grad;
use App\Models\UserCity;
use App\Models\UserGrad;
use Illuminate\Models\User;
use Illuminate\Http\Request;
use App\Models\User as ModelsUser;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class GradoviController extends Controller
{
    public function __construct()
    {
         $this->middleware('auth');
    }

    public function index()
    {
        return view('gradovi');
    }

    public function getGradovi()
    {
        $id = Auth::user()->id;
        
        $gradovi = UserGrad::Where('user_id','=', $id)->get();

        $count = UserGrad::Where('user_id', $id)->count();
        
    
        return response()->json([
            "gradovi" => $gradovi,
            "count" => $count
            
        ]);        
    }

    public function store(Request $request)
    {
        $id = Auth::user()->id;
        $gid='';
        
        $gradovi = $request->gradFront;
        // $role = DB::table('grads')->where('grad','=', $gradovi)->select('id');
        
        
        $brojac = UserGrad::Where('user_id', $id)->count();

        if($brojac < 10)
        {
            
            foreach($gradovi as $grad){
                $role = Grad::where('grad','=', $grad)->get();

                foreach ($role as $r) {
                    $rr = $r->id;
                }

                $api_key = '283ffcd4756f546f71f2e37f52c59bd9';
                $api_url = 'https://api.openweathermap.org/data/2.5/weather?q='.$grad.'&units=metric&appid='.$api_key;
                $temp_data = json_decode(file_get_contents($api_url), true);
                $temperatura = $temp_data['main']['temp'];
                
                if($temperatura > 15){
                    $savet = 'Obucite se lagodno';
                }
                else{
                    $savet = 'Obucite se slojevito';
                }
                
                $gradAdd = UserGrad::updateOrInsert([
                    "user_id" => $id,
                    "grad_id" => $rr,
                    "grad" => $grad,
                    "temperatura"=>$temperatura,
                    "savet"=>$savet
                ]);
            }
            
            return response()->json([
                'message'=>'Grad je dodat!!',
                'grad'=>$gradAdd,
                "count" => $brojac
            ]);
        }
    }

    public function destroy(int $id)
    {
        UserGrad::destroy($id);

        return response()->json([
            'message'=>'Grad je obrisan'
        ]);
    }

}
