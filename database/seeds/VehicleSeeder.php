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

        for ($i = 1; $i <= 500; $i++) {
            $vehicle[] = [
                'color' => $faker->safeColorName(),
                'power' => $faker->randomNumber(),
                'capacity' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 20),
                'speed' => $faker->randomFloat($nbMaxDecimals = 2, $min = 50, $max = 200),
                'maker_id' => $faker->numberBetween(1, 5)
            ];
        }

        DB::table('vehicles')->insert($vehicle);

    }
}
