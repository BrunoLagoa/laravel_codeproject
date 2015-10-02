<?php

use Illuminate\Database\Seeder;

class ProjectTaskTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('project_tasks')->truncate();
        //\CodeProject\Entities\Project::truncate();

        factory(\CodeProject\Entities\ProjectTask::class,30)->create();
    }
}