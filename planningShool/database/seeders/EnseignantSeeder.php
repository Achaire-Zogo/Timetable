<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class EnseignantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("enseignants")->insert([
            ["matricule"=>'18N2367',"titre"=>"Dr","nom_enseignant"=>"Tapamo","prenom_enseignant"=>"hypolite","telephone"=>"1231456784","email"=>"tapamo@gmail.com","adresse"=>"Nkodengui"],
            ["matricule"=>'18N2368',"titre"=>"Mr","nom_enseignant"=>"Djiky","prenom_enseignant"=>"Eric","telephone"=>"6541278451","email"=>"djiky@gmail.com","adresse"=>"Ekounou"],
            ["matricule"=>'18N2369',"titre"=>"Dr","nom_enseignant"=>"Amidou","prenom_enseignant"=>"Hilidou","telephone"=>"41785962541","email"=>"amidou@gmail.com","adresse"=>"Ekounou"],
            ["matricule"=>'18N2370',"titre"=>"mme","nom_enseignant"=>"Tamo","prenom_enseignant"=>"Mantio","telephone"=>"4178595421","email"=>"","adresse"=>"Ekounou"],
        ]);
    }
}
