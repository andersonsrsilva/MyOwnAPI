<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();

        User::create([
            'name' => 'Anderson Santa Rosa da Silva',
            'email' => 'andersonsrsilva@gmail.com',
            'password' => bcrypt('123'),
        ]);
    }
}
