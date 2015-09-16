<?php

use Illuminate\Database\Seeder;

class ClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \CodeProject\Models\Client::truncate();
        factory(\CodeProject\Models\Client::class, 10)->create();
    }
}
