<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserGrad extends Model
{
    use HasFactory;

    protected $table = "user_grads";

    protected $fillable = [
        'grad'
        
    ];
}
