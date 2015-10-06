<?php

use Illuminate\Database\Seeder;

class ProjectMemberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('project_members')->truncate();
        //\CodeProject\Entities\Project::truncate();
        factory(\CodeProject\Entities\ProjectMember::class,30)->create();
    }
}