<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{
public function run()
{
$this->call([
SubjectsTableSeeder::class,
CoursesTableSeeder::class,

StudentsTableSeeder::class,
Course_studentSeeder::class,
ProfessorsTableSeeder::class,

CommissionsTableSeeder::class,
]);
}
}
