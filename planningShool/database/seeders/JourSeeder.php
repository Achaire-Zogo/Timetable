<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class JourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("jours")->insert([
            ["intitule"=>'Lundi'],
            ["intitule"=>'Mardi'],
            ["intitule"=>'Mercredi'],
            ["intitule"=>'Jeudi'],
            ["intitule"=>'Vendredi'],
            ["intitule"=>'Samedi'],
            ["intitule"=>'Dimanche'],
        ]);
    }
}
