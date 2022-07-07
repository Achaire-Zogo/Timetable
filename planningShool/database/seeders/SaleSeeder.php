<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class SaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("salles")->insert([
            ["nom_salle"=>'R101',"capacite_salle"=>"80"],
            ["nom_salle"=>'R102',"capacite_salle"=>"80"],
            ["nom_salle"=>'R103',"capacite_salle"=>"80"],
            ["nom_salle"=>'R104',"capacite_salle"=>"80"],
            ["nom_salle"=>'R105',"capacite_salle"=>"80"],
            ["nom_salle"=>'R106',"capacite_salle"=>"70"],
            ["nom_salle"=>'R107',"capacite_salle"=>"70"],
            ["nom_salle"=>'R108',"capacite_salle"=>"60"],
            ["nom_salle"=>'R110',"capacite_salle"=>"70"],
            ["nom_salle"=>'A1',"capacite_salle"=>"100"],
            ["nom_salle"=>'A2',"capacite_salle"=>"100"],
            ["nom_salle"=>'A3',"capacite_salle"=>"250"],
            ["nom_salle"=>'A135',"capacite_salle"=>"250"],
            ["nom_salle"=>'A250',"capacite_salle"=>"250"],
            ["nom_salle"=>'A350',"capacite_salle"=>"350"],
            ["nom_salle"=>'A501',"capacite_salle"=>"501"],
            ["nom_salle"=>'A502',"capacite_salle"=>"500"],
            ["nom_salle"=>'A1001',"capacite_salle"=>"1500"],
            ["nom_salle"=>'A1002',"capacite_salle"=>"1500"],
            ["nom_salle"=>'S001',"capacite_salle"=>"65"],
            ["nom_salle"=>'S002',"capacite_salle"=>"65"],
            ["nom_salle"=>'S003',"capacite_salle"=>"65"],
            ["nom_salle"=>'S004',"capacite_salle"=>"65"],
            ["nom_salle"=>'S005',"capacite_salle"=>"60"],
            ["nom_salle"=>'S006',"capacite_salle"=>"60"],
            ["nom_salle"=>'S111',"capacite_salle"=>"60"],
            ["nom_salle"=>'S107',"capacite_salle"=>"60"],
            ["nom_salle"=>'S105',"capacite_salle"=>"60"],
            ["nom_salle"=>'S08A',"capacite_salle"=>"65"],
            ["nom_salle"=>'S08B',"capacite_salle"=>"65"],
            ["nom_salle"=>'E205',"capacite_salle"=>"70"],
            ["nom_salle"=>'E206',"capacite_salle"=>"70"],
            ["nom_salle"=>'E207',"capacite_salle"=>"70"],
            ["nom_salle"=>'E208',"capacite_salle"=>"70"],
        ]);
    }
}
