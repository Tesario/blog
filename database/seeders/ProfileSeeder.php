<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1, 3) as $index)
            DB::table('profiles')->insert([
                'user_id' => $index,
                'image' => '',
                'gendar' => rand(0, 1),
                'address' => $faker->address,
                'school' => $faker->word(),
                'birthdate' => date('Y-m-d'),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]);
    }
}
