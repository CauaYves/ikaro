<?php

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
        // $this->call(UsersTableSeeder::class);
        $this->call(CorTableSeeder::class);
        $this->call(EspecialTableSeeder::class);
        $this->call(MirimTableSeeder::class);
        $this->call(InfantilTableSeeder::class);
        $this->call(CadeteTableSeeder::class);
        $this->call(JuvenilTableSeeder::class);
        $this->call(AdultoTableSeeder::class);
        $this->call(Master1TableSeeder::class);
        $this->call(Master2TableSeeder::class);
        $this->call(Master3TableSeeder::class);
    }
}
