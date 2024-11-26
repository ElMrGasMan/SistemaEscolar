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

        // Obtener todos los IDs de estudiantes y comisiones existentes
        $studentIds = \App\Models\Student::pluck('id')->toArray();
        $commissionIds = \App\Models\Commission::pluck('id')->toArray();

        // Se mantiene un registro de las combinaciones (student_id, commission_id) que ya han sido usadas
        $assignedCommissions = [];

        // Generar 100 registros aleatorios en la tabla course_student.
        // No necesariamente se generarán 100 registros debido a la 
        // restriccion de una sola comision por cada curso por estudiante.
        for ($i = 0; $i < 100; $i++) 
        {
            $commissionId = $faker->randomElement($commissionIds);
            $studentId = $faker->randomElement($studentIds);

            // Se obtiene el curso relacionado con esa comisión
            $courseId = \App\Models\Commission::where('id', $commissionId)->value('course_id');

            // Se asegura de que el estudiante no esté inscrito en la misma comisión 
            // más de una vez.
            if (!isset($assignedCommissions[$studentId])) {
                $assignedCommissions[$studentId] = [];
            }

            if (!in_array($commissionId, $assignedCommissions[$studentId])) {
                DB::table('course_student')->insert([
                    'student_id' => $studentId,
                    'course_id' => $courseId,
                    'commission_id' => $commissionId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                $assignedCommissions[$studentId][] = $commissionId;
            }
        }
    }
}
