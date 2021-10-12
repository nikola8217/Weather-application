<?php

namespace App\Http\Controllers;

use App\Models\Grad;
use Illuminate\Http\Request;

class GradController extends Controller
{
    public function getCity()
    {
        
        
        $city = Grad::all();
    
        return response()->json([
            "gradovi1" => $city,
        ]);        
    }
}
