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
        factory(\CodeProject\Entities\User::class)->create([
            'name' => 'Bruno Castro',
            'email' => 'miroldols@gmail.com',
            'password' => bcrypt(123456),
            'remember_token' => str_random(10),
        ]);
        factory(\CodeProject\Entities\User::class,9)->create();
    }
}