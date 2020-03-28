<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $projects = [];

        for ($x = 0; $x <= 5; $x++) {
            $projects[] = [
                'name' => 'Project '.$x,
                'desc' => Str::random('50'),
            ];
        }

        DB::table('projects')->insert($projects);
    }
}
