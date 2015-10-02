<?php

use Illuminate\Database\Seeder;

class ProjectNoteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('project_notes')->truncate();
        //\CodeProject\Entities\Project::truncate();

        factory(\CodeProject\Entities\ProjectNote::class,50)->create();
    }
}