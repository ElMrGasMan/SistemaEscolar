<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 50) as $index) { // Genera 50 estudiantes
            DB::table('students')->insert([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'created_at' => $faker->dateTimeBetween('-1 year', 'now'), // Fecha de creación entre el año pasado y ahora
                'updated_at' => now(),
            ]);
        }
    }
}
