<?php

use Illuminate\Database\Seeder;

class CorporativoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Corporativo::class, 10)->create();
    }
}
