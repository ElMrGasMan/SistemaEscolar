<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            StudentsTableSeeder::class,
            SubjectsTableSeeder::class,
            CoursesTableSeeder::class,
            ProfessorsTableSeeder::class,
            CommissionsTableSeeder::class,

            Course_studentSeeder::class,
        ]);
    }
}
