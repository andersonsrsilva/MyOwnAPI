<?php

use App\Maker;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class MakerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('makers')->truncate();

        $faker = Faker::create();

        for ($i = 0; $i < 6; $i++) {
            Maker::create([
                'name' => $faker->word(),
                'phone' => $faker->randomNumber(5),
            ]);
        }
    }
}
