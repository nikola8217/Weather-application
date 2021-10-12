<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class VremeController extends Controller
{
    public function getVreme()
    {
        $id = Auth::user()->id;
        
        $user = User::Where('id','=', $id)->get();

        return response()->json([
            "user" => $user
        ]);        
    }

    public function izmeniVreme(Request $request)
    {
        $id = Auth::user()->id;
        $novoVreme = $request->novoVreme;

        $affected = User::where('id', $id)->update([
            'vreme' => $novoVreme]);

        return response()->json([
            'message'=>'Vreme je promenjeno!!',
            'vreme'=> $affected
        ]);
        
    }
}
