<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();

        factory('CodeProject\Entities\User')->create([
            'name' => 'Bruno Castro',
            'email' => 'miroldols@gmail.com',
            'password' => Hash::make(123456)
        ]);

        //factory('CodeCommerce\User',10)->create();
    }
}
