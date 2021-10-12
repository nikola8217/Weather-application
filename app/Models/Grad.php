<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Grad extends Model
{
    protected $fillable = [
        'grad'
        
    ];

    public function korisnici()
    {
        return $this->belongsToMany(User::class, 'user_grads');
    }
}
