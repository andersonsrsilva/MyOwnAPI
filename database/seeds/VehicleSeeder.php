<?php

use App\Vehicle;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('vehicles')->truncate();
        Vehicle::unguard();

        $faker = Faker::create();
        $vehicle = [];

        for ($i = 1; $i <= 3; $i++) {
            $vehicle[] = [
                'color' => $faker->safeColorName(),
                'power' => $faker->randomNumber(),
                'capacity' => $faker->randomFloat(4),
                'speed' => $faker->randomFloat(2),
                'maker_id' => $faker->numberBetween(1, 5)
            ];
        }

        DB::table('vehicles')->insert($vehicle);

    }
}
