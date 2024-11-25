<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class SubjectsTableSeeder extends Seeder
{
public function run()
{
DB::table('subjects')->insert([
['name' => 'Mathematics'],
['name' => 'Physics'],
['name' => 'Chemistry'],
['name' => 'Biology']
]);
}
}
