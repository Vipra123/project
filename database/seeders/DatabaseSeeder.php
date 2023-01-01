<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $gender = $faker->randomElement(['male', 'female']);
    	foreach (range(1,200) as $index) {
            DB::table('users')->insert([
                'name' => $faker->name($gender),
                'email' => $faker->email,
                'password' => $faker->password,
                'gender' => $faker->randomElement(["Default","Male","Female","Others"]),
                'dob' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'address' => $faker->address,
                'status' => $faker->randomElement([0, 1]),
            ]);
        }
    }
}