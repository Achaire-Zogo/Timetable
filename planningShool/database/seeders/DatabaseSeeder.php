<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
      /* $this->call(UserSeeder::class);
        $this->call(NiveauSeeder::class);
        $this->call(SpecialiteSeeder::class);*/
        $this->call(SaleSeeder::class);
        /* $this->call(FiliereSeeder::class);
        $this->call(JourSeeder::class);
        $this->call(HeureSeeder::class);*/

    }
}
