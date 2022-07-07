<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class FiliereSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("filieres")->insert([
            ["nom_filiere"=>'INFORMATIQUE'],
            ["nom_filiere"=>'ICT4D'],
            ["nom_filiere"=>'MATHEMATIQUE'],
            ["nom_filiere"=>'CHIMIE'],
            ["nom_filiere"=>'PHYSIQUE'],
            ["nom_filiere"=>'BIOCHIMIE'],

        ]);
    }
}
