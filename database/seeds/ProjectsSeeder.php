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
        $faker = Faker\Factory::create();

        $projects = [];
        for ($x = 0; $x <= 5; $x++) {
            $projects[] = [
                'name' => $faker->jobTitle,
                'desc' => $faker->text(30),
                'user_id' => rand(1,2),
            ];
        }

        DB::table('projects')->insert($projects);
    }
}
