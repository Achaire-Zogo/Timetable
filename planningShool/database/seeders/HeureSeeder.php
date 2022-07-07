<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class HeureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("heures")->insert([
            ["plage_horaire"=>'07h00-09h55'],
            ["plage_horaire"=>'10h05-12h55'],
            ["plage_horaire"=>'13h05-15h55'],
            ["plage_horaire"=>'16h05-18h55'],
            ["plage_horaire"=>'19h05-21h55'],

        ]);
    }
}
