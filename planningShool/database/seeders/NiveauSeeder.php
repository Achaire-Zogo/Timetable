<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class NiveauSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("niveaux")->insert([
            ["nom_niveau"=>'L1'],
            ["nom_niveau"=>'L2'],
            ["nom_niveau"=>'L3'],
            ["nom_niveau"=>'M1'],
            ["nom_niveau"=>'M2'],
            ["nom_niveau"=>'THESE'],
        ]);
    }
}
