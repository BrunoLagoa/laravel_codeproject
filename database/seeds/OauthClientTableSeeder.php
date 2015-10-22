<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OauthClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::table('oauth_clients')->truncate();

        DB::table('oauth_clients')->truncate();

        DB::table('oauth_clients')->insert([
            'id' => 'appid1',
            'secret' => 'secret',
            'name' => 'AngularAPP',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
    }
}
