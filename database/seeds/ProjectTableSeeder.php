<?php

use Illuminate\Database\Seeder;

class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projects')->truncate();
        //\CodeProject\Entities\Project::truncate();

        factory(\CodeProject\Entities\Project::class,10)->create();
    }
}