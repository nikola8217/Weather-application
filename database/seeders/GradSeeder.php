<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GradSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('grads')->insert([
            [
                'grad'=>'Tirana'
            ],
            [
                'grad'=>'Andorra la Vella'
            ],
            [
                'grad'=>'Vienna'
            ],
            [
                'grad'=>'Minsk'
            ],
            [
                'grad'=>'Brussels'
            ],
            [
                'grad'=>'Sarajevo'
            ],
            [
                'grad'=>'Sofia'
            ],
            [
                'grad'=>'Zagreb'
            ],
            [
                'grad'=>'Prague'
            ],
            [
                'grad'=>'Copenhagen'
            ],
            [
                'grad'=>'Tallinn'
            ],
            [
                'grad'=>'Helsinki'
            ],
            [
                'grad'=>'Paris'
            ],
            [
                'grad'=>'Berlin'
            ],
            [
                'grad'=>'Athens'
            ],
            [
                'grad'=>'Budapest'
            ],
            [
                'grad'=>'Reykjavik'
            ],
            [
                'grad'=>'Dablin'
            ],
            [
                'grad'=>'Rome'
            ],
            [
                'grad'=>'Riga'
            ],

            
        ]);
    }
}
