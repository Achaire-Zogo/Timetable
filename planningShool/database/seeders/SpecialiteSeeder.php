<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class SpecialiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("specialites")->insert([
            ["code_specialite"=>'L21',"nom_specialite"=>'Reseaux'],
            ["code_specialite"=>'L31',"nom_specialite"=>'SIGL'],
            ["code_specialite"=>'L41',"nom_specialite"=>'IA'],
            ["code_specialite"=>'L51',"nom_specialite"=>'SECURITES'],
            ["code_specialite"=>'L61',"nom_specialite"=>'LOGISTIQUES'],
        ]);
    }
}
