<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;


class Course_studentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear una instancia de Faker
        $faker = Faker::create();

        // Obtener todos los IDs de estudiantes y cursos existentes
        $studentIds = \App\Models\Student::pluck('id')->toArray();
        $courseIds = \App\Models\Course::pluck('id')->toArray();

        // Generar 100 registros aleatorios en la tabla course_student
        for ($i = 0; $i < 100; $i++) {
            DB::table('course_student')->insert([
                'student_id' => $faker->randomElement($studentIds),
                'course_id' => $faker->randomElement($courseIds),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
