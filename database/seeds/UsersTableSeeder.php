<?php

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
        factory(App\User::class)->create([
            'name' => 'Carlos Florencio',
            'email' => 'carlosmflorencio@gmail.com',
            'password' => bcrypt('eunaosei')
        ]);

        factory(App\User::class)->create([
            'name' => 'Hugo Reis',
            'email' => 'kimagem@gmail.com',
            'password' => bcrypt('tonsdelua')
        ]);
    }
}
